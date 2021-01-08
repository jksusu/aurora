<?php
declare(strict_types=1);

namespace Aurora;

use Aurora\Config\Config;
use Aurora\Contract\AuroraServerInterface;

class Server implements AuroraServerInterface
{

    public function __construct(Config $con,$id)
    {

    }

    /**
     * @var string
     */
    protected static $version = '0.1';

    public static function show()
    {
        $version = self::$version;

        echo("----------------------- autora:{$version} -----------------------------\r\n");
        echo('SWOOLE version:' . SWOOLE_VERSION . '            PHP version:' . PHP_VERSION . "\r\n");
        echo("------------------------ WORKERS -------------------------------\r\n");
        echo("worker               listen                      processes status\r\n");
    }

    public function server()
    {
        global $argv;
        $command = $argv[count($argv) - 1];
        switch ($command) {
            case 'start':
                $class = '';
                break;
            case 'stop':
                break;
            default:
                exit('暂不支持:' . $command . '命令');
                break;
        }
    }

    public static function outputError($message)
    {
        echo "\033[31m{$message}\033[0m" . date('Y-m-d H:i:s');
        PHP_EOL;
    }

    public static function help()
    {
        echo("----------------------- start:启动服务-----------------------------\r\n");
        echo("----------------------- start -d:后台运行-----------------------------\r\n");
    }
}