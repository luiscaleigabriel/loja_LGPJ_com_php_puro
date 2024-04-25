<?php

namespace app\core;

use app\support\Redirect;

class Router 
{
    private array $routes = [];

    public function add(string $uri, string $method, string $controller) 
    {
        $this->routes[] = new Route($uri, $method, $controller); 
    }

    public function init() 
    {
        foreach ($this->routes as $route) {
            if ($route->mach()) {
                Redirect::register($route);
                return (new Controller)->call($route);
            };
        }

        return (new Controller)->call(new Route('/404', 'GET', 'NotFoundController:index'));
    }
}