<?php

namespace app\controllers;

use app\core\View;

class HomeController 
{
    public function index() 
    {
        View::render('home');
    }
}