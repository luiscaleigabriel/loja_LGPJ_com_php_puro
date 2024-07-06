<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Category;
use app\database\models\Product;
use app\database\models\SubCategory;
use app\database\Pagination;
use app\database\Transaction;

class HomeController 
{
    public function index() 
    {
        try {
            Transaction::open();
            $pagination = new Pagination;
            $pagination->setItemsPerPages(8);
            $products = Product::all('id, name, price, image, slug', $pagination);
            View::render('home', ['products' => $products]);
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }

    public function show() 
    {
        try {
            Transaction::open();
            View::render('about');
            Transaction::close();
        } catch (\Throwable $th) {
            Transaction::rollback();
        }
    }
}