<?php

use app\core\Router;
use app\support\Session;

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
    $route->add('/cart/update', 'POST', 'CartController:update');

    $route->add('/shop', 'GET', 'ShopController:index');

    $route->add('/details', 'GET', 'ProductController:details');
    $route->add('/products', 'GET', 'ProductController:index');
    $route->add('/updateproduct', 'GET', 'ProductController:update');
    $route->add('/createproduct', 'GET', 'ProductController:create');
    $route->add('/deleteproduct', 'GET', 'ProductController:delete');
    $route->add('/createproduct', 'POST', 'ProductController:store');
    $route->add('/updateproduct', 'POST', 'ProductController:updated');

    $route->add('/category', 'GET', 'CategoryController:index');
    $route->add('/createcategory', 'GET', 'CategoryController:create');
    $route->add('/updatecategory', 'GET', 'CategoryController:update');
    $route->add('/createcategory', 'POST', 'CategoryController:store');
    $route->add('/updatecategory', 'POST', 'CategoryController:updated');
    $route->add('/deletecategory', 'GET', 'CategoryController:delete');

    $route->add('/subcategory', 'GET', 'SubcategoryController:index');
    $route->add('/createsubcategory', 'GET', 'SubcategoryController:create');
    $route->add('/updatesubcategory', 'GET', 'SubcategoryController:update');
    $route->add('/deletesubcategory', 'GET', 'SubcategoryController:delete');
    $route->add('/createsubcategory', 'POST', 'SubcategoryController:store');
    $route->add('/updatesubcategory', 'POST', 'SubcategoryController:updated');

    $route->add('/contact', 'GET', 'ContactController:index');
    $route->add('/contact', 'POST', 'ContactController:success');
    
    $route->add('/dashorders', 'GET', 'OrderController:show');
    $route->add('/orders', 'GET', 'OrderController:index');

    $route->add('/checkout', 'GET', 'CheckoutController:checkout');
    $route->add('/success', 'GET', 'CheckoutController:success');
    $route->add('/cancel', 'GET', 'CheckoutController:cancel');

    $route->add('/dashcrateusers', 'GET', 'UserController:create');
    $route->add('/users', 'GET', 'UserController:show');
    $route->add('/acount', 'GET', 'UserController:index');
    $route->add('/user/update', 'POST', 'UserController:update');

    $route->add('/resetpassword', 'GET', 'UserController:passwordreset');
    $route->add('/userdelete', 'GET', 'UserController:delete');
    $route->add('/useredit', 'GET', 'AdminController:edit');
    $route->add('/resetpass', 'POST', 'UserController:reset');
    $route->add('/user/create', 'POST', 'AdminController:store');
    $route->add('/userupdate', 'POST', 'AdminController:update');

    $route->add('/login', 'GET', 'LoginController:index');
    $route->add('/login', 'POST', 'LoginController:store');
    $route->add('/logout', 'GET', 'LoginController:logout');

    $route->add('/dash', 'GET', 'DashboardController:index');
    
    $route->add('/register', 'GET', 'RegisterController:create');
    $route->add('/register/create', 'POST', 'RegisterController:store');
    $route->init();
} catch (Exception $e) {
    dd($e->getMessage().''. $e->getFile() .' na linha '. $e->getLine());
}


