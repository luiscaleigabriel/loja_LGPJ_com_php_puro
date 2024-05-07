<?php

namespace app\support;

use app\database\models\User;

class Auth 
{
    public static function logged(User $user) 
    {
        if($user->is_admin) {
            Session::set('logged', true);
            Session::set('admin', true);
            Session::set('user', [
                'id' => $user->id,
                'name' => $user->name,
                'image' => $user->image
            ]);
        }else {
            Session::set('logged', true);
            Session::set('user', [
                'id' => $user->id,
                'name' => $user->name,
                'image' => $user->image
            ]);
            Redirect::to('/cartorders');
        }
    }

    public static function auth() 
    {
        if(Session::has('logged')) {
            return true;
        }
    }

    public static function logout() 
    {
        Session::deleteAll();
        Redirect::to('/');
    }
}