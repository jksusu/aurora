<?php
declare(strict_types=1);

namespace Aurora;

use Aurora\Contract\AuroraRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class Request implements AuroraRequestInterface,\ArrayAccess
{

    protected $method;

    protected $baseUrl;

    protected $url;

    protected $ip;

    protected $controller;

    protected $param;

    /**
     * 当前请求对象
     * @var \Swoole\http\Request
     */
    protected $request;

    protected $route;

    protected $headers;

    protected $body;

    protected $content;


    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getBody()
    {

        // TODO: Implement getBody() method.
    }

    public function getHeader($name)
    {
        return $this->headers;
        // TODO: Implement getHeader() method.
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
        $this->headers = $this->request->header;
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
    }

    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    public function getUri()
    {
        // TODO: Implement getUri() method.
    }

    public function hasHeader($name)
    {
        // TODO: Implement hasHeader() method.
    }


    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    public function withBody(StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }


    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
    }


    public function withMethod($method)
    {
        // TODO: Implement withMethod() method.
    }


    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }


    public function withRequestTarget($requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }


    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        // TODO: Implement withUri() method.
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}