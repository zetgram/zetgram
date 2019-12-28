<?php

use Illuminate\Contracts\Translation\Translator;

if (!function_exists('trans')) {
    function trans(string $id, array $replace = [], $locale = null)
    {
        return app(Translator::class)->get($id, $replace, $locale);
    }
}

if (!function_exists('app')) {
    function app(string $entryName)
    {
        global $container;
        return $container->get($entryName);
    }
}
