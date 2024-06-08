<?php

namespace app\traits;

use app\database\Transaction;
use app\support\Request;
use app\support\Session;

trait Validations 
{
    public function unique($field, $param) 
    {
        $data = strip_tags(Request::input($field));

        try {
            Transaction::open();
            $model = new $param;
            $registerFound = $model::where('email', $data);
            
            if($registerFound) {
                Session::flash($field, 'Já existe um usuário com este email cadastrado!');
                Session::flash('error', 'Já existe uma conta criada com este email. Faça Login!');
                return null;
            }

            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }

        return strip_tags($data);
    }

    public function required($field) 
    {
        $data = Request::input($field);
        if(empty($data)) {
            Session::flash($field, 'Este campo é obrigatório');
            return null;
        }

        return strip_tags($data);
    }

    public function minLen($field, $value = 8) 
    {
        $data = Request::input($field);
        if(mb_strlen($data) < $value) {
            Session::flash($field, "Este campo tem de ter no minimo {$value} caracteres");
            return null;
        }

        return strip_tags($data);
    }

    public function email($field) 
    {
        if(!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
            Session::flash($field, 'Informe um email válido');
            return null;
        }

        return strip_tags(Request::input($field));
    }
}