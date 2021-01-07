<?php
declare(strict_types=1);

use Aurora\Config\Config;

/**
 * get function instance
 */
if (!function_exists('container')) {
    function container($container = '')
    {
        return (new Aurora\Di\Container())->get($container);
    }
}
/**
 * get config  function
 * @params $keys [fileName.arrayKey]
 * @return array|string
 */
if (!function_exists('config')) {
    function config(string $keys)
    {
        return container(Config::class)->get($keys);
    }
}