<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\support\Auth;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;

class LoginController 
{
    public function index() 
    {
        View::render('login');
    }

    public function store() 
    {
        $data = Request::all();
        $user = new User;
        $user = $user->where('email', $data['email']);

        if(!$user) {
            Session::flash('error', 'Usuário ou senha incorreta!');
        }

        if(password_verify($data['password'], $user->password)) {
            Auth::logged($user);
        }else {
            Session::flash('error', 'Usuário ou senha incorreta!');
        }

        Redirect::back();
    }

    
}