<?php

namespace app\controllers;

use app\core\View;

class CartController 
{
    public function index() 
    {
        View::render('cart');
    }
}