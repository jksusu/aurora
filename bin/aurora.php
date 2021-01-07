<?php
!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

require BASE_PATH . '/vendor/autoload.php';

/*use Psr\Container\ContainerInterface;

$c = new EasyDI\Container();

$config = $c->get(\Aurora\Config\Config::class);
$con = $config->get('server.http');
var_dump($con);*/
$container = new \Aurora\Di\Container();
$container->get(\Aurora\Server::class)->server();