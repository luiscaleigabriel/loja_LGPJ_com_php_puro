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
            $product = new Product;
            $allProducts = $product->all();

            foreach($allProducts as $product) {
                if($product->id == $id) {
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