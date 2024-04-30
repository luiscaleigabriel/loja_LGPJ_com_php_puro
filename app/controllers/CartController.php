<?php

namespace app\controllers;

use app\core\Cart;
use app\core\CartInfo;
use app\core\View;
use app\database\dao\Product;
use app\database\models\Product as ModelsProduct;
use app\support\Redirect;

class CartController 
{
    public function index() 
    {
        View::render('cart');
    }

    public function show() 
    {
        View::render('cartlist');
    }

    public function add() 
    {
        if (array_key_exists('id', $_GET) && is_numeric($_GET['id'])) {
            $id = strip_tags($_GET['id']);

            $productInfo = ModelsProduct::where('id' , $id, 'id, name, price, slug, image');

            $product = new Product;
            $product->setId($productInfo->id);
            $product->setName($productInfo->name);
            $product->setPrice($productInfo->price);
            $product->setSlug($productInfo->slug);
            $product->setImage($productInfo->image);
            $product->setQuantity(1);

            $cart = new Cart;
            $cart->add($product);

            Redirect::back();

        }
    }

    public function update() 
    {
        if (array_key_exists('product', $_GET)) {
            $slug = strip_tags($_GET['product']);
            $quantity = strip_tags($_GET['value']);

            $cart = new Cart;
            $cart->update($slug, $quantity);

            Redirect::back();
        }
    }

    public function delete() 
    {
        if (array_key_exists('product', $_GET)) {
            $slug = strip_tags($_GET['product']);

            $cart = new Cart;
            $cart->remove($slug);

            Redirect::back();
        }
    }
}