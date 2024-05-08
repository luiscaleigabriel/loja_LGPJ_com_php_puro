<?php

namespace app\controllers;

use app\core\View;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\support\Validate;

class RegisterController 
{
    public function store() 
    {
        if(!Session::has('logged')) {
            View::render('register');
        }else {
            Redirect::to('/');
        }
    }

    public function create() 
    {
        $validate = new Validate;
        $validated = $validate->validate([
            // 'name' => 'required',
            // 'email' => 'email|required',
            // 'phone' => 'required',
            // 'gender' => 'required',
            // 'address' => 'required',
            'password' => 'required|maxlen:6'
        ]);

    }

}