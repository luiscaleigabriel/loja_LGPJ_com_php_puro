<?php

namespace app\controllers;

use app\core\Cart;
use app\core\CartInfo;
use app\core\View;
use app\database\dao\Product;
use app\database\models\Product as ModelsProduct;
use app\database\Transaction;
use app\support\Redirect;

class CartController 
{
    public function index() 
    {
        try {
            Transaction::open();
            View::render('cart');
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }

    public function show() 
    {
        try {
            Transaction::open();
            View::render('cartlist');
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }

    public function add() 
    {
        if (array_key_exists('id', $_GET) && is_numeric($_GET['id'])) {
            $id = strip_tags($_GET['id']);

            try {
                Transaction::open();
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

                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }
    }

    public function update() 
    {
        if (array_key_exists('slug', $_POST)) {
            $slug = strip_tags($_POST['slug']);
            $quantity = strip_tags($_POST['quantity']);

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