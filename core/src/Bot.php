<?php

namespace Zetgram;


use Zetgram\Types\Update;
use Zetgram\Types\UpdateCollection;
use Psr\Container\ContainerInterface;
use Zetgram\Filters\CallbackDataEqualFilter;
use Zetgram\Filters\FilterInterface;
use Zetgram\Filters\RegExpTextFilter;
use Zetgram\Filters\TextEqualFilter;

class Bot
{
    /**
     * @var ApiAbstract
     */
    public ApiAbstract $api;

    /**
     * @var array
     */
    private array $routes = [];

    /**
     * @var array
     */
    private array $callbackRoutes = [];

    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    public function __construct(ApiAbstract $api, ContainerInterface $container)
    {
        $this->api = $api;
        $this->container = $container;
    }

    public function handleUpdate(Update $update)
    {
        if (isset($update->message)) {
            foreach ($this->routes as $route) {
                if ($this->checkFilters($update, $route['filters'])) {
                    $handler = $this->container->get($route['handler']);
                    $handler->handle($update);
                    return;
                }
            }
        } elseif (isset($update->callbackQuery)) {
            foreach ($this->callbackRoutes as $callbackRoute) {
                if ($this->checkFilters($update, $callbackRoute['filters'])) {
                    $handler = $this->container->get($callbackRoute['handler']);
                    $handler->handle($update);
                    return;
                }
            }
        }
    }

    private function checkFilters(Update $update, $filters) :bool
    {
        foreach ($filters as $filter) {
            $params = [];
            if (is_array($filter)) {
                $filter_o = $this->container->get($filter[0]);
                $params = array_slice($filter, 1);
            } else {
                $filter_o = $this->container->get($filter);
            }
            /**
             * @var FilterInterface $filter_o
             */
            if ($filter_o->check($update, ...$params) === false )
                return false;
        }
        return true;
    }

    public function hears(string $regExp, $handler, ...$filters)
    {
        $this->unShift([RegExpTextFilter::class, $regExp], $filters);
        $this->addRoute($handler, ...$filters);
    }

    public function textEqual(string $text, $handler, ...$filters)
    {
        $this->unShift([TextEqualFilter::class, $text], $filters);
        $this->addRoute($handler, ...$filters);
    }

    public function addRoute($handler, ...$filters)
    {
        $this->routes[] = ['handler' => $handler, 'filters' => $filters];
    }


    public function callbackEqual(string $callback_data, $handler, ...$filters)
    {
        $this->unShift([CallbackDataEqualFilter::class, $callback_data], $filtres);
        $this->addCallbackRoute($handler, ...$filters);
    }

    public function addCallbackRoute($handler, ...$filters)
    {
        $this->callbackRoutes[] = ['handler' => $handler, 'filters' => $filters];
    }

    public function run(int $sleep = 1)
    {
        echo 'Starting long polling...' . PHP_EOL;
        $offset = null;
        while (true) {
            $data = $this->api->getUpdates($offset);
            $updates = new UpdateCollection($data);
            foreach ($updates as $update){
                $offset = $update->updateId + 1;
                $this->handleUpdate($update);
            }
            sleep($sleep);
        }
    }

    private function unShift($item, ?array &$array)
    {
        $array = $array ?? [];
        array_unshift($array, $item);
    }
}
