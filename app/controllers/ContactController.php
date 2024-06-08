<?php

namespace app\controllers;

use app\core\View;
use app\database\Transaction;
use app\support\Redirect;
use app\support\Session;
use app\support\Validate;

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

    public function success() 
    {
        $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required',
            'email' => 'required',
            'assunto' => 'required',
            'message' => 'required',
        ]);

        if($validated) {
            Session::delete('__flash');
            Session::flash('success', 'Mensagem enviada com sucesso!');
            Redirect::back();
        }else {
            Redirect::back();
        }
    }
}