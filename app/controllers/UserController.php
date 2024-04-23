<?php

namespace app\controllers;

use app\core\View;

class UserController 
{
    public function index() 
    {
        View::render('acount');
    }

    public function passwordreset() 
    {
        View::render('resetpass');
    }
}