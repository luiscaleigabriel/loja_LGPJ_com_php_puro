<?php

namespace app\support; 

class Request 
{
    public static function all() 
    {
        return $_POST;
    }

    public static function input(string $index) 
    {
        if(array_key_exists($index, $_POST)) {
            return strip_tags($_POST[$index]);
        }

        if(array_key_exists($index, $_GET)) {
            return strip_tags($_GET[$index]);
        }
    }
}