<?php

namespace app\core;

readonly class Route 
{
    public string $uri;
    private string $method;
    public string $controller;

    public function __construct(string $uri, string $method, string $controller)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->controller = $controller;
    }

    private function currentUri() 
    {
        return $_SERVER['REQUEST_URI'] !== '/' ? rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '/';
    }

    private function currentRequest() 
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function mach() 
    {
        if ($this->uri === $this->currentUri() && strtolower($this->method) === $this->currentRequest()) {
            return $this;
        }
    }

}