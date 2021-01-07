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
     * 获取容器中的实例
     * @param string $id
     * @return mixed|object
     * @throws \ReflectionException
     */
    public function get($id)
    {
        //如果已经实例化
        if (array_key_exists($id, self::$container)) {
            return self::$container[$id];
        }
        $dependencies = self::getClassDependencies($id);
        if (empty($dependencies)) {
            $instance = self::getReflectionClass($id)->newInstanceWithoutConstructor();
        } else {
            $instance = self::getReflectionClass($id)->newInstanceArgs([]);
        }
        self::$container[$id] = $instance;

        return $instance;
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function make(string $className, string $methodName, array $params = [])
    {
    }

    /**
     * 获取类的依赖
     * @param $class
     * @param $params
     * @return null
     */
    public static function getClassDependencies($class, $params = '')
    {
        $reflectionClass = self::getReflectionClass($class);

        if (!$reflectionClass->isInstantiable()) {
            dd($class . '不可以实例化');
        }

        if (!$reflectionClass->getConstructor()) {
            return null;
        }
    }

    /**
     * 获取反射类
     * @param $class
     * @return \ReflectionClass
     */
    public static function getReflectionClass($class)
    {
        return new \ReflectionClass($class);
    }
}