<?php
!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

require BASE_PATH . '/vendor/autoload.php';

(function () {
    $server = new \Aurora\Server();
    $server->server();
})();
