<?php

namespace Zetgram\Translation;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Yaml\Parser;

/*
 * This Loader does not support namespace overwriting, and jsonPath
 */
class YamlFileLoader implements Loader
{
    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected Filesystem $files;

    /**
     * The default path for the loader.
     *
     * @var string
     */
    protected string $path;

    /**
     * All of the namespace hints.
     *
     * @var array
     */
    protected array $hints = [];

    /**
     * @var array
     */
    protected array $jsonPaths;

    /**
     * @var string
     */
    protected ?string $cacheDir;

    /**
     * @var Parser
     */
    private ?Parser $parser;

    /**
     * Create a new file loader instance.
     *
     * @param Filesystem $files
     * @param string $path
     * @param string|null $cacheDir cache path
     */
    public function __construct(Filesystem $files, $path, string $cacheDir = null)
    {
        $this->path  = $path;
        $this->files = $files;
        $this->cacheDir = $cacheDir;
    }

    /**
     * Load the messages for the given locale.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     * @return array
     */
    public function load($locale, $group, $namespace = null)
    {
        if ($group === '*') {
            $group = 'messages';
        }
        return $this->loadPath($this->path, $locale, $group);
    }


    /**
     * Load a locale from a given path.
     *
     * @param string $path
     * @param string $locale
     * @param string $group
     * @return array
     */
    protected function loadPath($path, $locale, $group)
    {
        try {
            if(isset($this->cacheDir)) {
                return $this->parseCacheYaml($path, $locale, $group);
            }
            return $this->parseYaml($path, $locale, $group);
        } catch (FileNotFoundException $e) {
            return [];
        }
    }

    /**
     * @param string $path
     * @param string $locale
     * @param string $group
     * @return array|mixed
     * @throws FileNotFoundException
     */
    protected function parseCacheYaml(string $path, string $locale, string $group)
    {
        $cache_file_path = "$this->cacheDir/$locale/$group.php";
        $file_path = "$path/$locale/$group.yml";

        if ($this->validCachedFile($file_path, $cache_file_path)) {
            return $this->files->getRequire($cache_file_path);
        }

        $result = $this->parseYaml($path, $locale, $group);
        $this->cacheYaml($cache_file_path, $result);
        return $result;
    }

    /**
     * @param string $path
     * @param string $locale
     * @param string $group
     * @return array
     * @throws FileNotFoundException
     */
    protected function parseYaml(string $path, string $locale, string $group)
    {
        if(!isset($this->parser)) {
            $this->parser = new Parser();
        }

        $file = $this->files->get("$path/$locale/$group.yml");
        return $this->parser->parse($file) ?? [];
    }

    protected function cacheYaml(string $path, array $result)
    {
        $export = var_export($result, true);
        $content = <<<PHP_FILE
<?php

return $export;
PHP_FILE;
        $this->files->put($path, $content);
    }

    protected function validCachedFile(string $path, $cache_file_path) :bool
    {
        if($this->files->missing($cache_file_path))
            return false;

        if($this->files->lastModified($cache_file_path) < $this->files->lastModified($path))
            return false;

        return true;
    }

    /**
     * Add a new namespace to the loader.
     *
     * @param  string $namespace
     * @param  string $hint
     * @return void
     */
    public function addNamespace($namespace, $hint)
    {
        $this->hints[$namespace] = $hint;
    }
    /**
     * Get an array of all the registered namespaces.
     *
     * @return array
     */
    public function namespaces()
    {
        return $this->hints;
    }
    /**
     * Add a new JSON path to the loader.
     *
     * @param  string  $path
     * @return void
     */
    public function addJsonPath($path)
    {
        $this->jsonPaths[] = $path;
    }
}