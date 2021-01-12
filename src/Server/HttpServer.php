<?php
declare(strict_types=1);

namespace Aurora\Server;

use Psr\Http\Message\RequestInterface;
use Swoole\Http\Server;
use Swoole\Http2\Request;

class HttpServer
{
    protected $server;

    protected $config;

    public function __construct()
    {
        $this->config = config('server');
        $this->server = new Server($this->config['http']['host'], (int)$this->config['http']['port'], config('server.mode'));

        foreach ($this->config['http']['callbacks'] as $callbackKey => $callback) {
            $this->server->on($callbackKey, $callback);
        }

        $this->server->set($this->config['http']['setting']);

        $this->server->start();
    }

    public function onWorkerStart(Server $server)
    {

    }

    public function onRequest(Request $server)
    {

    }

    public function check()
    {
        if (!array_key_exists('host', $this->config) || empty($this->config['http']['host'])) {
            throw new \Exception('host null');
        }
        if (!array_key_exists('port', $this->config) || empty($this->config['http']['port'])) {
            throw new \Exception('port null');
        }
    }
}