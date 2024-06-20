<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Order;
use app\database\models\User;
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
                $oders = Order::all();
                $totalUsers = User::count();
                View::render('dash/dash', [
                    'oders' => $oders,
                    'totalUsers' => ($totalUsers - 3)
                ]);
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        }
    }
}