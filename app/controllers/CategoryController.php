<?php

namespace app\controllers;

use app\core\View;
use app\support\Redirect;
use app\support\Session;

class CategoryController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/category');
        }else {
            Redirect::to('/');
        }
    }
}