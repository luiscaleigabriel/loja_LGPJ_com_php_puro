<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\support\Auth;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use Exception;

class UserController 
{
    private User $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index() 
    {
        if(Auth::auth()) {
            $user = $this->user->where('id', Session::get('user')['id']);
            View::render('acount', ['user' => $user]);
        }else {
            Redirect::to('/');
        } 
    }

    public function show() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/user/users');
        }else {
            Redirect::to('/');
        }
    }

    public function create() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/user/create');
        }else {
            Redirect::to('/');
        }
    }

    public function update() 
    {
        if(Auth::auth()) {
            try {
                Csrf::validateToken();
                $data = Request::all();
                array_shift($data);

                $data['updated_at'] = date('Y-m-d H:i:s');
                $id = Session::get('user')['id'];
                $updated = $this->user->update('id', $id, $data);
                
                if($updated) {
                    Session::flash('success', 'Dados atualizados com sucesso!');
                    Redirect::back();
                }else {
                    Session::flash('error', 'Erro ao atualizar tente novamente!');
                    Redirect::back();
                } 
            } catch (Exception $e) {
                Redirect::back();
            }
        }else {
            Redirect::to('/');
        }  
    }

    public function passwordreset() 
    {
        if(Auth::auth()) {
            View::render('resetpass');
        }else {
            Redirect::to('/');
        } 
    }

    public function reset() 
    {
        if(Auth::auth()) {
            try {
                Csrf::validateToken();
                
            } catch (Exception $e) {
                Redirect::back();
            }
        }else {
            Redirect::to('/');
        }  

    }
}