<?php

use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Filesystem\Filesystem;
use Psr\Container\ContainerInterface;

use Zetgram\Api;
use Zetgram\ApiAbstract;
use Zetgram\Translation\Translator;
use Zetgram\Translation\YamlFileLoader;
use function DI\autowire;
use function DI\create;
use function DI\get;

return [
    ApiAbstract::class => get(Api::class),
    Api::class => autowire()
        ->constructorParameter('token', getenv('BOT_TOKEN')),
    TranslatorContract::class => function(ContainerInterface $container) {
        $loader = new YamlFileLoader(new Filesystem(), APP_DIR . '/translations', 'resources/lang');
        return new Translator($loader, 'uz');
    },
];
