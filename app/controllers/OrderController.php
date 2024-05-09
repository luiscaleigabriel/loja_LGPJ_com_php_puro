<?php

namespace app\controllers;

use app\core\View;
use app\support\Redirect;
use app\support\Session;

class OrderController 
{
    public function index() 
    {
        if(Session::has('logged')) {
            View::render('orders');
        }else {
            Session::flash('error', 'Faça login para ver as suas compras');
            Redirect::to('/login');
        }
    }
}