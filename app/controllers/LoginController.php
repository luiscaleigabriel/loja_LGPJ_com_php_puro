<?php

namespace app\controllers;

use app\core\View;
use app\support\Redirect;

class LoginController 
{
    public function index() 
    {
        View::render('login');
    }
    public function store() 
    {
        Redirect::back();
    }
}