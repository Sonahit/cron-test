<?php

namespace App\Http;

use FastRoute\RouteCollector;

class Router
{

    protected $dispatcher = [];

    public function __construct()
    {
        $routes = \App\config('routes.php');
        $this->initDispatcher($routes);
    }

    public function initDispatcher(array $routes)
    {
        $this->dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) use ($routes) {
            foreach ($routes as $url => $route) {
                foreach ($route as $method => $action) {
                    $handler = $this->getAction($action);
                    $r->addRoute($method, $url, $handler);
                }
            }
        });
    }

    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * Parse handler
     *
     * @param [string|Closure] $handler
     * @return [Closure] handler
     */
    public function getAction($action)
    {
        if (! is_string($action)) {
            return $action;
        }
        preg_match('/^(\w+)({)(\w+)(})$/', $action, $matches);
        [$_, $controller, $__, $method, $___] = $matches;
        $class = 'App\\Controllers\\' . $controller;
        $controller = new $class();
        return [$controller, $method];
    }
}
