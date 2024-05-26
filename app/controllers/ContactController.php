<?php

namespace app\controllers;

use app\core\View;
use app\database\Transaction;

class ContactController 
{
    public function index() 
    {
        try {
            Transaction::open();
            View::render('contact');
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }
}