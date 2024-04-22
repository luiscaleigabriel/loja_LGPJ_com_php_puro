<?php

namespace app\core;

use Exception;

class Controller 
{
    public function call(Route $route) 
    {
        $controller = $route->controller;

        if (!\str_contains($controller, ':')) {
            throw new Exception("Estou a espera dos : no controller {$controller} ");
        }

        [$controller, $action] = explode(':', $controller);

        $controllerInstance = 'app\\controllers\\' . $controller;

        if (!class_exists($controllerInstance)) {
            throw new Exception("A class {$controller} não existe ");
        }

        $controller = new $controllerInstance;

        if (!method_exists($controller, $action)) {
            throw new Exception("O método {$action} não existe ");
        }

        call_user_func_array([$controller, $action], []);
    }
}