<?php

namespace app\controllers;

use app\core\View;
use app\support\Redirect;
use app\support\Session;

class SubcategoryController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/subcategory/subcategory');
        }else {
            Redirect::to('/');
        }
    }

    public function create() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/subcategory/create');
        }else {
            Redirect::to('/');
        }
    }
}