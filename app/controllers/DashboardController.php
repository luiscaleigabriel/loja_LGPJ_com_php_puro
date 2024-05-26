<?php

namespace app\controllers;

use app\core\View;
use app\database\Transaction;
use app\support\Redirect;
use app\support\Session;

class DashboardController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                View::render('dash/dash');
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        }
    }
}