<?php
declare(strict_types=1);

namespace Aurora\Message;

use Psr\Http\Message\ResponseInterface;

class Response implements ResponseInterface
{
    use Message;

    public function getStatusCode()
    {

    }

    public function withStatus($code, $reasonPhrase = '')
    {

    }

    public function getReasonPhrase()
    {

    }
}