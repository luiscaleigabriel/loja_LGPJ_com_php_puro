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
use app\support\Validate;

class SubcategoryController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                $pagination = new Pagination;
                $pagination->setItemsPerPages(7);
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
        $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        if($validated) {
            $data = Request::all();
    
            $data['slug'] = mb_strtolower(str_replace(' ', '-', Request::input('name')));
            array_shift($data);
            array_shift($data);
    
            $data['idcategory'] = Request::input('category');
            
            try {
                Transaction::open();
                $created = SubCategory::create($data);
                if($created) {
                    Session::delete('__flash');
                    Session::flash('success', 'Dados da Sub-categoria atualizada com sucesso!');
                    Redirect::to('/subcategory');
                }else {
                    Session::delete('__flash');
                    Session::flash('error', 'Erro ao atualizar dados da Sub-categotia. Tente novamente!');
                    Redirect::to('/subcategory');
                }
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }  else {
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

                    $subcategory = SubCategory::where('id', $id);
                    $categories = Category::all();

                    View::render('dash/subcategory/update', [
                        'subcategory' => $subcategory,
                        'categories' => $categories
                    ]);
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
            'name' => 'required',
            'category' => 'required',
        ]);

        if($validated) {
    
            $data = [
                'name' => Request::input('name'),
                'slug' => mb_strtolower(str_replace(' ', '-', Request::input('name'))),
                'idcategory' => Request::input('category'),
            ];

            $id = Request::input('id');
            
            try {
                Transaction::open();
                $created = SubCategory::update('id', $id, $data);
                if($created) {
                    Session::delete('__flash');
                    Session::flash('success', 'Dados da Sub-categoria atualizada com sucesso!');
                    Redirect::to('/subcategory');
                }else {
                    Session::delete('__flash');
                    Session::flash('error', 'Erro ao atualizar dados da Sub-categotia. Tente novamente!');
                    Redirect::to('/subcategory');
                }
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }  else {
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

                    $deleted = SubCategory::delete('id', $id);

                    if($deleted) {
                        Session::flash('success', 'Sub-categoria excluida com sucesso!');
                        Redirect::back();
                    }else {
                        Session::flash('error', 'Ocorreu um erro ao tentar excluir a Sub-categoria!');
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