<?php

namespace app\support;

use Exception;

class Csrf 
{
    public static function createToken() 
    {
        if(Session::has('__token')) {
            Session::delete('__token');
        }

        Session::set('__token', md5(uniqid()));

        return "<input type='hidden' name='__token' value='{$_SESSION['__token']}' />";
    }

    public static function validateToken() 
    { 
        if(!Session::has('__token')) {
            throw new Exception('Token inválido! ');
        }

        $token = Request::input('__token');

        if(Session::get('__token') != $token) {
            throw new Exception('Token inválido! ');
        }

        Session::delete('__token');

        return true;
    }
}