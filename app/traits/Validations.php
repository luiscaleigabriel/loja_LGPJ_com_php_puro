<?php

namespace app\traits;

use app\support\Request;

trait Validations 
{
    public function unique() 
    {
        dd('unique');  
    }

    public function required($field) 
    {
        $data = Request::input($field);
        if(empty($data)) {
            return null;
        }
    }
    public function maxLen( $field, $value = 8) 
    {
        $data = Request::input($field);
        if(mb_strlen($data) >= $value) {
            return null;
        }
    }

    public function email() 
    {
        dd('email');  
    }
}