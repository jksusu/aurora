<?php
declare(strict_types=1);

namespace Aurora\Event;

use Aurora\AuroraServer;

class Event
{
    public function onWorkerStart(\Swoole\Server $server)
    {
        $config = config('database');
        if (!array_key_exists('default', $config) || empty($config['default'])) {

        }
        AuroraServer::outputInfo('Aurora\Event\Event::onWorkerStart 初始化连接池');
    }
}