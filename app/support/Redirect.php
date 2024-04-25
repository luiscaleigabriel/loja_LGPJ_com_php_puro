<?php

namespace app\support;

use app\core\Route;

class Redirect 
{
    public static function to(string $to) 
    {
        return header("Location: {$to}");
    } 

    public static function back() 
    {
        if ($_SESSION['redirect']) {
            self::to($_SESSION['redirect']['previous']);
        }
    } 

    private static function registerFirstRedirect($route) 
    {
        $_SESSION['redirect'] = [
            'actual' => $route->uri,
            'previous' => $_SESSION['redirect']['actual']
        ];
    }

    private static function registerRedirect($route) 
    {
        $_SESSION['redirect'] = [
            'actual' => $route->uri,
            'previous' => ''
        ];
    }

    public static function register(Route $route) 
    {
        (!$_SESSION['redirect']) ? self::registerRedirect($route) : self::registerFirstRedirect($route);    
    }
}