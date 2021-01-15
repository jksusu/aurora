<?php
declare(strict_types=1);

return [

    'default' => 'mysql',//如果没有默认，则取链接配置第一个链接

    'connections' => [
        'mysql' => [
            'host' => '127.0.0.1',
            'port' => 3306,
            'database' => 'test',
            'username' => 'test',
            'password' => '123456',
        ]
    ]
];