<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
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
        // $validate = new Validate;
        // $validated = $validate->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'gender' => 'required',
        //     'address' => 'required',
        //     'password' => 'required|maxlen:6'
        // ]);

        $data = Request::all();

        Csrf::validateToken();

        if(array_key_exists('__token', $data)) {
            array_shift($data);
        }

        if(array_key_exists('password', $data)) {
            $data['password'] = password_hash(Request::input('password'), PASSWORD_DEFAULT);
        }

        $created = User::create($data);

        if($created) {
            Redirect::to('/login');
        }else {
            Session::flash('error', 'Ocorreu um erro!, verifique a sua conexão a internet ou tente mais tarde');
            Redirect::back();
        }
    }

}