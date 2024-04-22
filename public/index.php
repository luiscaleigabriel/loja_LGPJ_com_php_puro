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
    $route->init();
} catch (Exception $e) {
    dd($e->getMessage().''. $e->getFile() .' na linha '. $e->getLine());
}
    

    // $products = [
    //     1 => ['id' => 1, 'name' => 'Geladeira', 'price' => 1000, 'quantity' => 1],
    //     2 => ['id' => 2, 'name' => 'Mouse', 'price' => 2000, 'quantity' => 1],
    //     3 => ['id' => 3, 'name' => 'Teclado', 'price' => 100, 'quantity' => 1],
    //     4 => ['id' => 4, 'name' => 'Monitor', 'price' => 50, 'quantity' => 1],
    // ];

    // $cart = new Cart;

    // if (array_key_exists('id', $_GET)) {

    //     $id = strip_tags($_GET['id']);
    //     $productInfo = $products[$id];

    //     $product = new Product;
    //     $product->setId($productInfo['id']);
    //     $product->setName($productInfo['name']);
    //     $product->setPrice($productInfo['price']);
    //     $product->setQuantity($productInfo['quantity']);
    //     $product->setDescription($productInfo['quantity'].$productInfo['name']);

        
    //     $cart->add($product);

    // }

    // if (array_key_exists('remove', $_GET)) {
    //     $id = strip_tags($_GET['remove']);
    //     $cart->remove($id);
    //     header('Location: /');
    // }

    // var_dump($_SESSION['cart'] ?? []);

?>
