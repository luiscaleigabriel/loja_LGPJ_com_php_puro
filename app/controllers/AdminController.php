<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\database\Transaction;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\support\Validate;

class AdminController 
{
  public function store() 
  {
    $validate = new Validate;
        $validated = $validate->validate([
            'name' => 'required',
            'email' => 'required|email|unique:'.User::class,
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ]);

        if($validated) {
          $data = [
              'name' => Request::input('name'),
              'email' => Request::input('email'),
              'phone' => Request::input('phone'),
              'gender' => Request::input('gender'),
              'address' => Request::input('address'),
              'password' => password_hash('123456', PASSWORD_DEFAULT),
              'is_admin' => true
          ];

          try {
              Transaction::open();
              $created = User::create($data);

              if($created) {
                  Session::delete('__flash');
                  Session::flash('success', 'Usuário criado com sucesso!. Faça Login!');
                  Redirect::to('/users');
              }else {
                  Session::delete('__flash');
                  Session::flash('error', 'Ocorreu um erro!, verifique a sua conexão a internet ou tente mais tarde');
                  Redirect::back();
              }
              Transaction::close();
          } catch (\Throwable $th) {
              Transaction::rollback();
          }
      }else {
        Redirect::back();
      }
  }

  public function edit() 
  {
    if(Session::has('logged') && Session::has('admin')) {
      if(array_key_exists('id', $_GET)) {
        try {
            Transaction::open();
            $id = strip_tags($_GET['id']);
            $user = User::where('id', $id);
            View::render('dash/user/create', ['user' => $user]);
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

  public function update() 
  {
    $validate = new Validate;
    $validated = $validate->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'gender' => 'required',
        'address' => 'required'
    ]);

    if($validated) {
      try {
        Transaction::open();
        $data = [
          'name' => Request::input('name'),
          'email' => Request::input('email'),
          'phone' => Request::input('phone'),
          'gender' => Request::input('gender'),
          'address' => Request::input('address'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];

        $id = strip_tags(Request::input('id'));

        $updated = User::update('id', $id, $data);
        
        if($updated) {
          Session::delete('__flash');
          Session::flash('success', 'Dados do usuário atualizados com sucesso!');
          Redirect::to('/users');
        }else {
          Session::delete('__flash');
          Session::flash('error', 'Erro ao atualizar tente novamente!');
          Redirect::to('/users');
        } 
        Transaction::close();
      } catch (\Exception $e) {
          Transaction::rollback();
          Redirect::back();
      }
  }else {
    Redirect::to('/users');
  }
  }
  

}