<?php
declare(strict_types=1);

namespace Aurora;

use Aurora\Contract\AuroraServerInterface;

class AuroraServer implements AuroraServerInterface
{
    protected static $version = '0.1';

    public function server()
    {
        self::show();

        global $argv;

        $serverName = $argv[count($argv) - 2];
        switch ($serverName) {
            case 'http':
                $class = \Aurora\Server\HttpServer::class;
                break;
            case 'websocket':
                break;
            default:
                exit('暂不支持:' . $serverName . '命令');
                break;
        }


        switch ($argv[count($argv) - 1]) {
            case 'start':
                new $class;
                break;
        }
    }

    public static function show()
    {
        self::outputInfo('|￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣');
        self::outputInfo('| AURORA  version:'.self::$version);
        self::outputInfo('| SWOOLE  version:'.SWOOLE_VERSION);
        self::outputInfo('| PHP     version:'.PHP_VERSION);
        self::outputInfo('|￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣');
        self::outputInfo('|______________________________________');
    }

    public static function outputInfo(string $message, $type = 'INFO')
    {
        self::println('[' . date('Y-m-d H:i:s') . '] [' . $type . "] \033[32m{$message}\033[0m");
    }

    public static function println(string $message)
    {
        echo $message . PHP_EOL;
    }
}