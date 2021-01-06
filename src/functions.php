<?php
declare(strict_types=1);

if (!function_exists('container')) {
    function container($container = '')
    {
        return (new Aurora\Di\Container())->get($container);
    }
}

if (!function_exists('config')) {
    function config(string $keys)
    {
        container(\Aurora\Config\Config::class)->get($keys);
    }
}