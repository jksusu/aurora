<?php
declare(strict_types=1);

namespace Aurora\Config;

use Aurora\Contract\AuroraConfigInterface;

class Config implements AuroraConfigInterface
{
    /**
     * config file
     * @var array
     */
    protected static $config = [];

    /**
     * get config
     * @param $keys
     * @param null $default
     * @return mixed|null
     */
    public function get(string $keys, $default = null)
    {
        $keys = explode('.', strtolower($keys));
        if (empty($keys)) {
            return null;
        }
        $file = array_shift($keys);
        if (empty(self::$config[$file])) {
            if (!is_file(BASE_PATH . '/config/' . $file . '.php')) {
                return null;
            }
            self::$config[$file] = include BASE_PATH . '/config/' . $file . '.php';
        }
        $config = self::$config[$file];
        while ($keys) {
            $key = array_shift($keys);
            if (!isset($config[$key])) {
                $config = $default;
                break;
            }
            $config = $config[$key];
        }
        return $config;
    }

    public function set()
    {

    }
}