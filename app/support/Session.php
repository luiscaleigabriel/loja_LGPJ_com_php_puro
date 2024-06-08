<?php

namespace app\support;

class Session 
{
    public static function set(string $index, $value) 
    {
        $_SESSION[$index] = $value;
    }

    public static function has(string $index) 
    {
        if(array_key_exists($index, $_SESSION)) {
            return true;
        }
    }

    public static function get(string $index) 
    {
        if(self::has($index)) 
        {
            return $_SESSION[$index];
        }
    }

    public static function delete(string $index) 
    {
        if(self::has($index)) {
            unset($_SESSION[$index]);
        }
    }

    public static function deleteAll() {
        session_unset();
        session_destroy();
    }

    public static function flash(string $index, mixed $value) 
    {
        $_SESSION['__flash'][$index] = $value;
    }

    public static function flashHas(string $index) 
    {
        if(array_key_exists($index, $_SESSION['__flash'])) {
            return true;
        }
    }

    public static function flashGet(string $index) 
    {
        if(self::flashHas($index)) {
            $value = $_SESSION['__flash'][$index];
            unset($_SESSION['__flash'][$index]);
            return $value;
        }
    }

    public static function old(string $index, mixed $value) 
    {
        $_SESSION['__old'][$index] = $value;
    }

    public static function oldHas(string $index) 
    {
        if(isset($_SESSION['__old'][$index])) {
            $value = $_SESSION['__old'][$index];
            unset($_SESSION['__old'][$index]);
            return $value;
        }
    }

}