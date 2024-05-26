<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\database\Transaction;
use app\support\Auth;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;

class LoginController 
{
    public function index() 
    {
        
        if(!Session::has('logged')) {
            try {
                Transaction::open();
                View::render('login');
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            if(Session::has('admin')) {
                Redirect::to('/dash');
            }else {
                Redirect::to('/cartorders');
            }
        }
    }

    public function store() 
    {
        try {
            Transaction::open();
            Csrf::validateToken();
            $data = Request::all();
            array_shift($data);

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
            
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }

    public function logout() 
    {
        Auth::logout();
    }
    
}