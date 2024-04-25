<?php

namespace app\controllers;

use app\core\View;

class OrderController 
{
    public function index() 
    {
        View::render('orders');
    }
}