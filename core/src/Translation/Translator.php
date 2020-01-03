<?php

namespace Zetgram\Translation;

use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Support\Str;
use Illuminate\Translation\Translator as TranslatorLarevel;

class Translator extends TranslatorLarevel implements TranslatorContract
{
    public const ESCAPE_HTML = 1;
    public const ESCAPE_MARKDOWN = 2;
    public const ESCAPE_NO = 0;

    protected int $escapeMode = self::ESCAPE_HTML;

    protected function makeReplacements($line, array $replace)
    {
        if (empty($replace)) {
            return $line;
        }

        $replace = $this->sortReplacements($replace);

        foreach ($replace as $key => $value) {
            if ($this->escapeMode == self::ESCAPE_HTML)
                $value = $this->escapeHtml($value);
            elseif ($this->escapeMode == self::ESCAPE_MARKDOWN)
                $value = $this->escapeMarkdown($value);
            $line = str_replace(
                [':'.$key, ':'.Str::upper($key), ':'.Str::ucfirst($key)],
                [$value, Str::upper($value), Str::ucfirst($value)],
                $line
            );
        }

        return $line;
    }

    protected function escapeHtml(string $string) :string
    {
        return str_replace(['&', '<', '>'], ['&amp;', '&lt;', '&gt;'], $string);
    }

    protected function escapeMarkdown(string $string) :string
    {
        return str_replace(['*', '`', '_'], ['\*', '\`', '\_'], $string);
    }

    public function setEscapeMod(int $mode)
    {
        $this->escapeMode = $mode;
    }
}
