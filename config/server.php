<?php
return [
    'mode' => SWOOLE_PROCESS,
    'http' => [
        'host' => '0.0.0.0',
        'port' => 9502,
        'callbacks' => [
            'workerStart' => [\Aurora\Server\HttpServer::class, 'onWorkerStart'],
            'request' => [\Aurora\Server\HttpServer::class, 'onRequest']
        ],
        'setting' => [
            'worker_num' => swoole_cpu_num(),
        ],
    ]
];