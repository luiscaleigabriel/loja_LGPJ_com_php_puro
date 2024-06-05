<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Category;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\database\models\SubCategory;
use app\database\Pagination;
use app\database\Transaction;

class SubcategoryController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                $pagination = new Pagination;
                $pagination->setItemsPerPages(10);
                $subCategories = SubCategory::all('*', $pagination);
                View::render('dash/subcategory/subcategory', [
                    'subCategories' => $subCategories,
                    'pagination' => $pagination
                ]);
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        }
    }

    public function create() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                $categories = Category::all();
                View::render('dash/subcategory/create', ['categories' => $categories]);
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
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
        array_shift($data);

        $data['idcategory'] = Request::input('category');
        
        try {
            Transaction::open();
            $created = SubCategory::create($data);
            if($created) {
                Session::flash('success', 'Subcategoria criada com sucesso!');
                Redirect::to('/subcategory');
            }else {
                Session::flash('error', 'Erro ao criar nova Subcategoria tente novamente!');
                Redirect::to('/subcategory');
            }
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }
}