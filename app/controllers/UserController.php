<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\support\Auth;
use app\support\Redirect;
use app\support\Session;

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

            View::render('acount', ['user', $user]);
        }else {
            Redirect::to('/');
        } 
    }

    public function passwordreset() 
    {
        View::render('resetpass');
    }
}