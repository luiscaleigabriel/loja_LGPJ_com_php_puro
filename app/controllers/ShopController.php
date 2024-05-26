<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Category;
use app\database\models\Product;
use app\database\models\SubCategory;
use app\database\Transaction;

class ShopController 
{
    public function index() 
    {
        if(array_key_exists('category', $_GET)) {
            try {
                Transaction::open();
                $id = strip_tags($_GET['category']);

                $productsBD = Product::all();
                $products = [];
                foreach($productsBD as $product) {
                    if($product->id == $id) {
                        $products[] = $product;
                    }
                }

                View::render('shop', ['products' => $products]);
                Transaction::close(); 
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }

        if(array_key_exists('subcategory', $_GET)) {
            try {
                Transaction::open();
                $id = strip_tags($_GET['subcategory']);
                
                $productsBD = Product::all();
                $products = [];
                foreach($productsBD as $product) {
                    if($product->id == $id) {
                        $products[] = $product;
                    }
                }

                View::render('shop', ['products' => $products]);
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }

        if(!isset($_GET['category']) && !isset($_GET['subcategory'])) {
            try {
                Transaction::open();
                $products = Product::all();

                View::render('shop', ['products' => $products]);
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }
        
    }
}