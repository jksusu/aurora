<?php
declare(strict_types=1);

namespace Aurora\Message;

use Psr\Http\Message\StreamInterface;

trait Message
{
    public function getBody()
    {
    }

    public function getHeaderLine($name)
    {
    }

    public function getHeader($name)
    {
    }

    public function getHeaders()
    {
    }

    public function getProtocolVersion()
    {
    }

    public function hasHeader($name)
    {
    }

    public function withAddedHeader($name, $value)
    {
    }

    public function withBody(StreamInterface $body)
    {
    }

    public function withHeader($name, $value)
    {
    }

    public function withoutHeader($name)
    {
    }

    public function withProtocolVersion($version)
    {
    }
}