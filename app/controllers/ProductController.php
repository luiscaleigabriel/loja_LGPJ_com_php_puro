<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Category;
use app\database\models\Product;
use app\database\models\SubCategory;
use app\database\Pagination;
use app\database\Transaction;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\support\Upload;
use app\support\Validate;

class ProductController 
{
    public function index() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                $pagination = new Pagination;
                $pagination->setItemsPerPages(5);

                $products = Product::all('*', $pagination);
                $total = Product::count();
            
                View::render('dash/product/product', [
                    'products' => $products, 
                    'total' => $total, 
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
                $subCategories = SubCategory::all();
            
                View::render('dash/product/create', ['categories' => $categories, 'subCategories' => $subCategories]);

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
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if($validated) {
            try {
                Transaction::open();
    
                $image = Upload::uploadFile('file', './assets/images/product/');
    
                $data = [
                    'name' => Request::input('name'),
                    'slug' => mb_strtolower(str_replace(' ', '-', Request::input('name'))),
                    'description' => Request::input('description'),
                    'price' => Request::input('price'),
                    'quantity' => Request::input('quantity'),
                    'image' => './assets/images/product/'.$image,
                    'status' => true,
                    'idcategory' => Request::input('category'),
                    'idsubcategory' => Request::input('subcategory'),
                ];
    
                $created = Product::create($data);
                if($created) {
                    Session::delete('__flash');
                    Session::flash('success', 'Produto cadastrado com sucesso!');
                    Redirect::to('/products');
                }else {
                    Session::flash('error', 'Ocorreu um erro ao cadastrar o produto!');
                    Redirect::to('/products');
                }

                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::back();
        }
        
    }

    public function details() 
    {
        $id = strip_tags($_GET['id']);

        try {
            Transaction::open();
            if(!empty($id)) {
                $product = Product::where('id', $id);
                $allProducts = Product::all();
                
                View::render('product', [
                    'product' => $product,
                    'allProducts' => $allProducts
                ]);
            }else{
                Redirect::to('/');
            }
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }

    public function update() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            if(array_key_exists('id', $_GET)) {
                try {
                    Transaction::open();
                    $id = strip_tags($_GET['id']);
                    $product = Product::where('id', $id);
                
                    View::render('dash/product/update', [
                        'product' => $product
                    ]);
    
                    Transaction::close();
                } catch (\Throwable $th) {
                    Transaction::rollback();
                }
            }else {
                Redirect::back();
            }
        }else {
            Redirect::to('/');
        }
    }

    public function updated() 
    {
        $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if($validated) {
            if(array_key_exists('id', $_POST)) {
                try {
                    Transaction::open();
                    $id = strip_tags($_POST['id']);

                    $image = Product::where('id', $id);
                    unlink($image->image);

                    $image = Upload::uploadFile('file', './assets/images/product/');
        
                    $data = [
                        'name' => Request::input('name'),
                        'slug' => mb_strtolower(str_replace(' ', '-', Request::input('name'))),
                        'description' => Request::input('description'),
                        'price' => Request::input('price'),
                        'quantity' => Request::input('quantity'),
                        'image' => './assets/images/product/'.$image,
                        'status' => true,
                        'idcategory' => Request::input('category'),
                        'idsubcategory' => Request::input('subcategory'),
                    ];
        
                    $created = Product::update('id', $id,$data);
                    if($created) {
                        Session::delete('__flash');
                        Session::flash('success', 'Produto atualizado com sucesso!');
                        Redirect::to('/products');
                    }else {
                        Session::delete('__flash');
                        Session::flash('error', 'Ocorreu um erro ao atualizar o produto!');
                        Redirect::to('/products');
                    }
    
                    Transaction::close();
                } catch (\Throwable $th) {
                    Transaction::rollback();
                }
            }
        }else {
            Redirect::back();
        }
    }

    public function delete() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            if(array_key_exists('id', $_GET)) {
                try {
                    Transaction::open();
                    $id = strip_tags($_GET['id']);
                    $image = Product::where('id', $id);
                    unlink($image->image);
    
                    $deleted = Product::delete('id', $id);
                    if($deleted) {
                        Session::flash('success', 'Produto exclido com sucesso!');
                        Redirect::to('/products');
                    }else {
                        Session::flash('error', 'Ocorreu um erro ao exclir o produto!');
                        Redirect::to('/products');
                    }

                    Transaction::close();
                } catch (\Throwable $th) {
                    Transaction::rollback();
                }
            }
        }else {
            Redirect::to('/');
        }
        
    }

}