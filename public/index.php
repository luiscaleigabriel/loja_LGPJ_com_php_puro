<?php

use app\core\Router;

require '../vendor/autoload.php';

session_start();

try {
    $route = new Router;
    $route->add('/', 'GET', 'HomeController:index');
    $route->add('/about', 'GET', 'HomeController:show');

    $route->add('/cart', 'GET', 'CartController:show');
    $route->add('/cartorders', 'GET', 'CartController:index');
    $route->add('/cart/add', 'GET', 'CartController:add');
    $route->add('/cart/remove', 'GET', 'CartController:delete');
    $route->add('/cart/quantity', 'GET', 'CartController:updateQuantity');

    $route->add('/contact', 'GET', 'ContactController:index');
    
    $route->add('/orders', 'GET', 'OrderController:index');

    $route->add('/acount', 'GET', 'UserController:index');
    $route->add('/resetpassword', 'GET', 'UserController:passwordreset');

    $route->add('/login', 'GET', 'LoginController:index');
    $route->add('/login', 'POST', 'LoginController:store');
    $route->add('/logout', 'GET', 'LoginController:logout');
    
    $route->add('/register', 'GET', 'RegisterController:index');
    $route->init();
} catch (Exception $e) {
    dd($e->getMessage().''. $e->getFile() .' na linha '. $e->getLine());
}

?>
