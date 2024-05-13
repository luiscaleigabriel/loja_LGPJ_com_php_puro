<?php

namespace app\controllers;

use app\core\View;
use app\support\Redirect;
use app\support\Session;

class DashboardController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/dash');
        }else {
            Redirect::to('/');
        }
    }
}