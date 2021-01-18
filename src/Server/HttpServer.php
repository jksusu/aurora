<?php
declare(strict_types=1);

namespace Aurora\Server;

use Aurora\AuroraServer;
use Aurora\Context;
use Aurora\Event\EventHandle;

class HttpServer
{
    protected $server;

    protected $config;

    public function __construct()
    {
        $this->config = config('server');

        $this->checkEnv();

        $this->server = new \Swoole\Http\Server($this->config['http']['host'], (int)$this->config['http']['port'], config('server.mode'));

        if ($this->config['mode'] === SWOOLE_BASE) {
            //mode=SWOOLE_BASE并且设置信息存在
            if (!empty($this->config['http']['setting'])) {
                $this->server->on('managerStart', [$this, 'onManagerStart']);
                $this->server->on('managerStop ', [$this, 'onManagerStop']);
            }
        } else {
            $this->server->on('start', [$this, 'onStart']);
        }

        foreach ($this->config['http']['callbacks'] as $callbackKey => $callback) {
            $this->server->on($callbackKey, $callback);
        }

        $this->server->set($this->config['http']['setting']);

        $this->server->start();
    }


    /**
     * SWOOLE_BASE 模式下，如果设置了 setting 则会启动一个manager进程管理工作进程
     * @param \Swoole\Server $server
     */
    public function onManagerStart(\Swoole\Server $server)
    {
        echo 'manager start success';
    }

    /**
     * SWOOLE_BASE 模式下，如果设置了 setting 则会启动一个manager进程管理工作进程
     * 触发此回调
     * @param \Swoole\Server $server
     */
    public function onManagerStop(\Swoole\Server $server)
    {
        echo 'manager stop';
    }

    /**
     *
     * @param \Swoole\Server $server
     */
    public function onStart(\Swoole\Server $server)
    {
        AuroraServer::outputInfo('Swoole Http Server Callback OnStart http://' . $this->config['http']['host'] . ':' . $this->config['http']['port']);
    }

    public function onWorkerStart(\Swoole\Server $server, int $workId)
    {
        AuroraServer::outputInfo('Swoole WorkStart WorkId ' . $workId);
        container(EventHandle::class)->handle($server, 'onWorkerStart');
    }

    public function onWorkerStop(\Swoole\Server $server, int $workId)
    {
        AuroraServer::outputInfo('Swoole WorkerStop WorkId ' . $workId);
    }

    public function onRequest(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        var_dump($request);
        Context::set('auroraRequest', $request);
        Context::set('auroraResponse', $request);
    }

    public function checkEnv()
    {
        if (!\extension_loaded('swoole')) {
            throw new \RuntimeException('No Swoole extension installed or enabled');
        }
        if (!array_key_exists('host', $this->config['http']) || empty($this->config['http']['host'])) {
            throw new \RuntimeException('host null');
        }
        if (!array_key_exists('port', $this->config['http']) || empty($this->config['http']['port'])) {
            throw new \RuntimeException('port null');
        }
    }
}