<?php
declare(strict_types=1);

namespace Aurora\Message;

use Aurora\Message\Contract\AuroraRequestInterface;
use Psr\Http\Message\UriInterface;

class Request implements AuroraRequestInterface
{

    use Message;

    /**
     * @var \Swoole\Http\Request
     */
    protected $request;

    /**
     * 请求header参数
     * @var array
     */
    protected $header = [];

    /**
     * 请求server
     * @var $server
     */
    protected $server;

    /**
     * 请求cookie
     * @var array
     */
    protected $cookie = [];

    /**
     * 上传的文件
     * @var array
     */
    protected $files = [];

    /**
     * 请求参数
     * @var array
     */
    protected $params = [];

    /**
     * 请求 uri
     * @var $uri
     */
    protected $uri;

    /**
     * 当前链接FD
     * @var $fd
     */
    protected $fd;


    /**
     * 请求
     * @var $requestTarget
     */
    protected $requestTarget;

    /**
     * Http Method.
     * @var string
     */
    protected $method;

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

    /**
     * @return \Psr\Http\Message\UriInterface
     */
    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function getRequestTarget()
    {
        if ($this->requestTarget !== null) {
            return $this->requestTarget;
        }
    }

    public function withRequestTarget($requestTarget)
    {
        $new = clone $this;
        $new->requestTarget = $requestTarget;
        return $new;
    }

    /**
     * 设置请求方法
     * @param string $method
     * @return Request
     */
    public function withMethod($method)
    {
        if (!in_array(strtoupper($method), ['GET', 'POST', 'PATCH', 'PUT', 'DELETE', 'HEAD'])) {
            throw new \InvalidArgumentException('Request Method Invalid');
        }
        $new = clone $this;
        $new->method = $method;
        return $new;
    }

    public function withUri(UriInterface $uri, $preserveHost = false)
    {

    }
}