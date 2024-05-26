<?php

namespace app\controllers;

use app\core\View;
use app\database\Transaction;
use app\support\Redirect;
use app\support\Session;

class OrderController 
{
    public function index() 
    {
        if(Session::has('logged')) {
            try {
                Transaction::open();
                View::render('orders');
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Session::flash('error', 'Faça login para ver as suas compras');
            Redirect::to('/login');
        }
    }

    public function show() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                View::render('dash/orders');
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        }
    }
}