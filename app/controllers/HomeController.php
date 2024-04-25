<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Product;

class HomeController 
{
    public function index() 
    {
        $products = Product::all('id, name, price, image, slug');

        View::render('home', ['products' => $products]);
    }

    public function show() 
    {
        View::render('about');
    }
}