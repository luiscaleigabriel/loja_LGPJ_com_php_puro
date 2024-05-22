<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Category;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;

class CategoryController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            $categories = Category::all();
            View::render('dash/category/category', ['categories' => $categories]);
        }else {
            Redirect::to('/');
        }
    }

    public function create() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            View::render('dash/category/create');
        }else {
            Redirect::to('/');
        }
    }

    public function store() 
    {
        $data = Request::all();
        Csrf::validateToken();

        $data['slug'] = mb_strtolower(str_replace(' ', '-', Request::input('name')));

        array_shift($data);
        $created = Category::create($data);

        if($created) {
            Session::flash('success', 'Categoria criada com sucesso!');
            Redirect::to('/category');
        }else {
            Session::flash('error', 'Erro ao criar nova categoria tente novamente!');
            Redirect::to('/category');
        }
    }
}