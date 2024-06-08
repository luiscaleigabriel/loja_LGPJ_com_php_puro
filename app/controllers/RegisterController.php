<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\database\Transaction;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\support\Validate;

class RegisterController 
{
    public function create() 
    {
        if(!Session::has('logged')) {
            try {
                Transaction::open();
                View::render('register');
                Transaction::close();
            } catch (\Throwable $th) {
                dd($th->getMessage(), $th->getFile(), $th->getLine());
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        }
    }

    public function store() 
    {
        $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required',
            'email' => 'required|email|unique:'.User::class,
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'password' => 'required|minlen:6'
        ]);

        if($validated) {
            $data = [
                'name' => Request::input('name'),
                'email' => Request::input('email'),
                'phone' => Request::input('phone'),
                'gender' => Request::input('gender'),
                'address' => Request::input('address'),
                'password' => password_hash(Request::input('password'), PASSWORD_DEFAULT)
            ];

            try {
                Transaction::open();
                $created = User::create($data);

                if($created) {
                    Redirect::to('/login');
                    Session::flash('success', 'Conta criada com sucesso!. Faça Login!');
                }else {
                    Session::flash('error', 'Ocorreu um erro!, verifique a sua conexão a internet ou tente mais tarde');
                    Redirect::back();
                }
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Session::old('name', Request::input('name'));
            Session::old('email', Request::input('email'));
            Session::old('phone', Request::input('phone'));
            Session::old('address', Request::input('address'));
            Session::old('gender', Request::input('gender'));
            Session::old('password', Request::input('password'));
            Redirect::back();
        }
    }

}