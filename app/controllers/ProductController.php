<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Product;
use app\support\Redirect;

class ProductController 
{
    public function details() 
    {
        $id = strip_tags($_GET['id']);

        if(!empty($id)) {
            $allProducts = $this->allProducts();
            $product = new Product;
            $product = $product->where('id', $id);

            
            View::render('product', [
                'product' => $product,
                'allProducts' => $this->allProducts()
        ]);
        }else{
            Redirect::to('/');
        }
    }

    private function allProducts() 
    {
        $product = new Product;
        $allProducts = $product->all();

        return $allProducts;
    }
}