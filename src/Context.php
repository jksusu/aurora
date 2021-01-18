<?php
declare(strict_types=1);

namespace Aurora;

use Swoole\Coroutine;

/**
 * 协程上下文对象管理
 * Class Context
 * @package Aurora
 */
class Context
{
    /**
     * 储存非协程上下文数据
     * @var array
     */
    protected static $context = [];

    /**
     * 获取上下文对象
     * @param string $key 存入时keys
     * @param null $coroutineId 协程ID
     * @return mixed|string
     */
    public static function get(string $key, $coroutineId = null)
    {
        if (Context::getCid() && !is_null($coroutineId)) {
            return Coroutine::getContext($coroutineId)[$key];
        }
        return isset(Context::$context[$key]) ? Context::$context[$key] : '';
    }

    /**
     * 设置协程上下文对象
     * @param string $key
     * @param $value
     * @return mixed
     */
    public static function set(string $key, $value)
    {
        if (Context::getCid()) {
            Coroutine::getContext()[$key] = $value;
        } else {
            Context::$context[$key] = $value;
        }
        return $value;
    }

    /**
     * 获取当前协程ID
     * @return mixed
     */
    public static function getCid()
    {
        return Coroutine::getCid();
    }
}