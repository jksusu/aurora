<?php
declare(strict_types=1);

namespace Aurora;

use FastRoute\Dispatcher;

class Route
{
    protected $config = [];

    protected $dispatcher;

    protected function __construct()
    {
        $this->config = config('route');
    }


    public function route($request, $response)
    {
        $method = $request->server['request_method'];
        $uri = $request->server['request_uri'] ?? '/';;

        $routeInfo = $this->dispatcher->dispatch($method, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                // ... call $handler with $vars
                break;
        }
    }


    /**
     * 进程启动预先加载定义路由
     * @param $request
     * @param $response
     */
    public function handler()
    {
        $this->dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
            foreach ($this->config as $route) {
                $r->addRoute($route[0], $route[1], $route[2]);
            }
        });
    }
}