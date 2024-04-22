<?php

use app\core\Router;

require '../vendor/autoload.php';

session_start();

try {
    $route = new Router;
    $route->add('/', 'GET', 'HomeController:index');
    $route->add('/cart', 'GET', 'CartController:index');
    $route->add('/cart/add', 'GET', 'CartController:store');
    $route->add('/contact', 'GET', 'ContactController:index');
    $route->add('/about', 'GET', 'AboutController:index');
    $route->add('/orders', 'GET', 'OrdersController:index');
    $route->add('/login', 'GET', 'LoginController:index');
    $route->add('/register', 'GET', 'RegisterController:index');
    $route->init();
} catch (Exception $e) {
    dd($e->getMessage().''. $e->getFile() .' na linha '. $e->getLine());
}

?>
