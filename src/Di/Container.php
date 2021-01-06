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
        //如果已经实例化
        if (array_key_exists($id, self::$container)) {
            return self::$container[$id];
        }
        $params = self::getMethodParams($id);
        return (new \ReflectionClass($id))->newInstanceArgs($params);
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function make(string $className, string $methodName, array $params = [])
    {
        $instance = self::get($className);
        $arr = self::getMethodParams($className, $methodName);
        return $instance->{$methodName}(...array_merge($arr, $params));
    }

    public function getMethodParams($className, $methodsName = '__construct'): array
    {
        $class = new \ReflectionClass($className);
        //获取每个方法的依赖
        $arr = [];
        if ($class->hasMethod($methodsName)) {
            $construct = $class->getMethod($methodsName);
            $params = $construct->getParameters();
            if (count($params) > 0) {
                foreach ($params as $key => $param) {
                    $paramClass = $param->getClass();
                    if ($paramClass) {
                        $paramClassName = $param->getName();
                        //解析依赖的依赖
                        $args = self::getMethodParams($paramClassName);
                        $arr[] = (new \ReflectionClass($paramClassName))->newInstanceArgs($args);
                    }
                }
            }
        }
        return $arr;
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