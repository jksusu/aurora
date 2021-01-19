<?php
declare(strict_types=1);

namespace Aurora\Message;

use Aurora\Message\Contract\AuroraRequestAbstract;

class Request extends AuroraRequestAbstract
{

    /**
     * 请求 uri
     * @var string
     */
    protected $uri;

    /**
     * 当前链接FD
     * @var string
     */
    protected $fd;


    /**
     * 请求
     * @var string
     */
    protected $requestTarget;

    /**
     * 请求注入
     * @param \Swoole\Http\Request $request
     */
    public function injectionRequestValues(\Swoole\Http\Request $request)
    {
        $this->header = $request->header;
        $this->server = $request->server;
        $this->cookie = $request->cookie;
        $this->request = $request;
    }


    /**
     * 获取请求方法
     * @return mixed|string
     */
    public function getMethod(): string
    {
        return $this->server['request_method'];
    }

    /**
     * 获取请求IP地址
     * @return mixed
     */
    public function getIp(): string
    {
        return $this->server['remote_addr'];
    }

    /**
     * 注入请求参数
     * @param \Swoole\Http\Request $request
     * @return mixed
     */
    public function injectionRequestParams(\Swoole\Http\Request $request)
    {
        return $this->params = $request->{strtolower($this->getMethod())};
    }

    /**
     * 获取具体值
     * @param string $key
     * @return mixed
     */
    public function getParam(string $key)
    {
        return isset($this->params[$key]) ? $this->params[$key] : '';
    }

    /**
     * 当前链接fd
     * @return mixed
     */
    public function getFd()
    {
        return $this->request->fd;
    }
}