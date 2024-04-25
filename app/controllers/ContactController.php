<?php

namespace app\controllers;

use app\core\View;

class ContactController 
{
    public function index() 
    {
        View::render('contact');
    }
}