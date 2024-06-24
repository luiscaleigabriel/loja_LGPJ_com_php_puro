<?php

namespace app\controllers;

use app\core\Cart;
use app\core\CartInfo;
use app\core\View;
use app\database\models\Order;
use app\database\models\User;
use app\database\Transaction;
use app\support\Auth;
use app\support\Redirect;
use app\support\Request;
use app\support\Session;
use Exception;
use Stripe\StripeClient;

class CheckoutController 
{
    public function checkout() 
    {
        if(!isset($_SESSION['cart']) || $_SESSION['cart']['total'] < 1) {
            Session::flash('error', 'Adicione items no carrinho!');
            Redirect::back();
        }else {
            if(Auth::auth()) {
                try {
                    Transaction::open();
                    $user = User::where('id', Session::get('user')['id']);
    
                    View::render('chekout', ['user' => $user]);
    
                    Transaction::close();
                } catch (Exception $e) {
                    Session::flash('error', 'Falha ao fazer o pagamento verifique a sua conexão a internet!');
                    Redirect::back();
                }
            }else {
                Session::flash('error', 'Faça login para fazer o pagamento!');
                Redirect::to('/login');
            }
        }
        
        
    }

    public function pay() {
        if(Auth::auth()) {
            try {
                Transaction::open();
                
                if(!isset($_SESSION['cart']) || $_SESSION['cart']['total'] < 1) {
                    Session::flash('error', 'Adicione items no carrinho!');
                    Redirect::back();
                }else {
                    if(!empty(Request::input('card'))) {
                        $data = [
                            'iduser' => Session::get('user')['id'],
                            'orderdate' => date('Y-m-d'),
                            'total' => Session::get('cart')['total']
                        ];
        
                        $payment = Order::create($data);
        
                        if($payment) {
                            Session::delete('cart');
                            Session::flash('success', 'Compra efetuada com sucesso!');
                            Redirect::to('/orders');
                        }
                    }else {
                        Session::flash('error', 'Informe o número do cartão de Debito!');
                        Redirect::back();
                    }
                }

                Transaction::close();
            } catch (Exception $e) {
                Session::flash('error', 'Falha ao fazer o pagamento verifique a sua conexão a internet!');
                Redirect::back();
            }
        }else {
            Session::flash('error', 'Faça login para fazer o pagamento!');
            Redirect::to('/login');
        }
    }

}