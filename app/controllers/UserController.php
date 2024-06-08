<?php

namespace app\controllers;

use app\core\View;
use app\database\models\User;
use app\database\Transaction;
use app\support\Auth;
use app\support\Csrf;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use app\support\Validate;
use Exception;

class UserController 
{
    private User $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index() 
    {
        if(Auth::auth()) {
            try {
                Transaction::open();
                $user = $this->user->where('id', Session::get('user')['id']);
                View::render('acount', ['user' => $user]);
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        } 
    }

    public function show() 
    {
        if(Session::has('logged') && Session::has('admin')) {
            try {
                Transaction::open();
                
                View::render('dash/user/users');
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
                View::render('dash/user/create');
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        }
    }

    public function update() 
    {
        if(Auth::auth()) {
            try {
                Transaction::open();
                Csrf::validateToken();
                $data = Request::all();
                array_shift($data);

                $data['updated_at'] = date('Y-m-d H:i:s');
                $id = Session::get('user')['id'];
                $updated = $this->user->update('id', $id, $data);
                
                if($updated) {
                    Session::flash('success', 'Dados atualizados com sucesso!');
                    Redirect::back();
                }else {
                    Session::flash('error', 'Erro ao atualizar tente novamente!');
                    Redirect::back();
                } 
                Transaction::close();
            } catch (Exception $e) {
                Transaction::rollback();
                Redirect::back();
            }
        }else {
            Redirect::to('/');
        }  
    }

    public function passwordreset() 
    {
        if(Auth::auth()) {
            try {
                Transaction::open();
                View::render('resetpass');
                Transaction::close();
            } catch (\Throwable $th) {
                Transaction::rollback();
            }
        }else {
            Redirect::to('/');
        } 
    }

    public function reset() 
    {
        if(Auth::auth()) {
            try {
                
                $validate = new Validate;
                $validated = $validate->validate([
                    'password1' => 'required',
                    'passwordN' => 'required|minLen:6',
                    'passwordC' => 'required|minLen:6'
                ]);
                
                if($validated) {
                    try {
                        Transaction::open();

                        $data = [
                            'password1' => Request::input('password1'),
                            'passwordN' => password_hash(Request::input('passwordN'), PASSWORD_DEFAULT),
                            'passwordC' => Request::input('passwordC'),
                        ];

                        $user = $this->user::where('id', Session::get('user')['id']);

                        if(password_verify($data['password1'], $user->password)) {
                            
                            if(password_verify($data['passwordC'], $data['passwordN'])) {

                                $newPass = [
                                    'password' => $data['passwordN']
                                ];

                                $updated = $this->user::update('id', Session::get('user')['id'], $newPass);

                                if($updated) {
                                    Session::delete('__flash');
                                    Session::flash('success', 'palavra passe alterada com sucesso!');
                                    Redirect::back();
                                }else {
                                    Session::delete('__flash');
                                    Session::flash('error', 'Erro verifique a sua conexão a internet! Ou tente mais tarde!');
                                    Redirect::back();
                                }

                            }else {
                                Session::delete('__flash');
                                Session::flash('error', 'A nova senha é diferente da senha confirmada!');
                                Redirect::back();
                            }

                        }else {
                            Session::flash('error', 'A palavra passe actual está incorreta!');
                            Redirect::back();
                        }

                        // $this->user::update('password', '', $password);
                        Transaction::close();
                    } catch (\Throwable $th) {
                        Transaction::rollback();
                    }
                }else {
                    Redirect::back();
                }
            } catch (Exception $e) {
                Redirect::back();
            }
        }else {
            Redirect::to('/');
        }  

    }
}