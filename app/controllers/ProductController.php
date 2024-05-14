<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Product;
use app\support\Redirect;
use app\support\Session;

class ProductController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/product/product');
        }else {
            Redirect::to('/');
        }
    }

    public function create() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/product/create');
        }else {
            Redirect::to('/');
        }
    }

    public function details() 
    {
        $id = strip_tags($_GET['id']);

        if(!empty($id)) {
            $product = new Product;
            $allProducts = $product->all();

            foreach($allProducts as $product) {
                if($product->id === $id) {
                    $product = $product;
                    break;
                }
            }
            
            View::render('product', [
                'product' => $product,
                'allProducts' => $allProducts
            ]);
        }else{
            Redirect::to('/');
        }
    }

}