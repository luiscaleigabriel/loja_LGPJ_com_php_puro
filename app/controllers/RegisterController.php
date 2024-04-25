<?php

namespace app\controllers;

use app\core\View;

class RegisterController 
{
    public function index() 
    {
        View::render('register');
    }
}