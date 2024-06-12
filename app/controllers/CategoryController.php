<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Category;
use app\database\Pagination;
use app\database\Transaction;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\support\Validate;

class CategoryController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                $pagination = new Pagination;
                $pagination->setItemsPerPages(10);
                $categories = Category::all('*', $pagination);

                View::render('dash/category/category', [
                    'categories' => $categories,
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
        try {
            if(Session::has('logged') && Session::has('admin')) {
                View::render('dash/category/create');
            }else {
                Redirect::to('/');
            }
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }

    public function store() 
    {
        $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required'
        ]);

        if($validated) {
            try {
                Transaction::open();

                $data = [
                    'name' => Request::input('name'),
                    'slug' => mb_strtolower(str_replace(' ', '-', Request::input('name')))
                ];
                
                $created = Category::create($data);
    
                if($created) {
                    Session::delete('__flash');
                    Session::flash('success', 'Categoria criada com sucesso!');
                    Redirect::to('/category');
                }else {
                    Session::flash('error', 'Erro ao criar nova categoria tente novamente!');
                    Redirect::to('/category');
                }      
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
            
        }else {
            Redirect::back();
        }
        
    }

    public function update() 
    {
        if(array_key_exists('id', $_GET)) {
            try {
                Transaction::open();
                if(Session::has('logged') && Session::has('admin')) {
                    $id = strip_tags($_GET['id']);

                    $category = Category::where('id', $id);

                    View::render('dash/category/update', ['category' => $category]);
                }else {
                    Redirect::to('/');
                }
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::back();
        }
     }

    public function updated() 
    {
        $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required'
        ]);

        if($validated) {
            try {
                Transaction::open();
                $id = Request::input('id');
                $data = [
                    'name' => Request::input('name'),
                    'slug' => mb_strtolower(str_replace(' ', '-', Request::input('name')))
                ];
                
                $updated = Category::update('id', $id, $data);
    
                if($updated) {
                    Session::delete('__flash');
                    Session::flash('success', 'Dados da atualizados com sucesso!');
                    Redirect::to('/category');
                }else {
                    Session::flash('error', 'Erro ao atualizar dados da categoria. Tente novamente!');
                    Redirect::to('/category');
                }      
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
            
        }else {
            Redirect::back();
        }
    }

    public function delete() 
    {
        if(array_key_exists('id', $_GET)) {
            try {
                Transaction::open();
                if(Session::has('logged') && Session::has('admin')) {
                    $id = strip_tags($_GET['id']);

                    $deleted = Category::delete('id', $id);

                    if($deleted) {
                        Session::flash('success', 'Categoria excluida com sucesso!');
                        Redirect::back();
                    }else {
                        Session::flash('error', 'Ocorreu um erro ao tentar excluir a categoria!');
                        Redirect::back();
                    }
                }else {
                    Redirect::to('/');
                }
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::back();
        }
    }
}