<?php
declare(strict_types=1);

namespace Aurora\Di;

use Aurora\Contract\AuroraContainerInterface;

class Container implements AuroraContainerInterface
{
    /**
     * Object instances in containers
     * @var $container
     */
    protected static $container = [];

    /**
     * this class instance
     * @var $instance
     */
    protected static $instance;


    public function get($id)
    {
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function make(string $name, array $params = [])
    {
        // TODO: Implement make() method.
    }

    /**
     * get this container instance
     * @return mixed
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        if (static::$instance instanceof \Closure) {
            return (static::$instance)();
        }

        return static::$instance;
    }

    private static function invokeClass(string $className, array $params = [])
    {

    }
}