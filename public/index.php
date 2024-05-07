<?php

use app\core\Router;
use app\database\models\User;

require '../vendor/autoload.php';

session_start();


$user = new User;
$user = $user->create([
    'name' => 'Manuel Fonseca',
    'email' => 'luis@gmail.com',
    'phone' => '929939990',
    'gender' => 'M',
    'address' => 'Benfica',
    'password' => password_hash('1234', PASSWORD_DEFAULT),
    'image' => null,
    'is_admin' => false,
    'created_at' => 'default',
    'updated_at' => 'default',
]);


dd($user);
try {
    $route = new Router;
    $route->add('/', 'GET', 'HomeController:index');
    $route->add('/about', 'GET', 'HomeController:show');

    $route->add('/cart', 'GET', 'CartController:show');
    $route->add('/cartorders', 'GET', 'CartController:index');
    $route->add('/cart/add', 'GET', 'CartController:add');
    $route->add('/cart/remove', 'GET', 'CartController:delete');
    $route->add('/cart/update', 'POST', 'CartController:update');

    $route->add('/details', 'GET', 'ProductController:details');

    $route->add('/contact', 'GET', 'ContactController:index');
    
    $route->add('/orders', 'GET', 'OrderController:index');

    $route->add('/checkout', 'GET', 'CheckoutController:checkout');
    $route->add('/success', 'GET', 'CheckoutController:success');
    $route->add('/cancel', 'GET', 'CheckoutController:cancel');

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


