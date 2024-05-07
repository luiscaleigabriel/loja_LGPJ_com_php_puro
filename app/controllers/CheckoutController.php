<?php

namespace app\controllers;

use app\core\CartInfo;
use app\core\View;
use app\support\Auth;
use app\support\Redirect;
use app\support\Session;
use Exception;
use Stripe\StripeClient;

class CheckoutController 
{
    public function checkout() 
    {
        if(Auth::auth()) {
            try {
                $privateKey = 'sk_test_51P2GG1HGQqI4q1t5jeCM4Zov796DIejWzqMAh0ajyu3xUyCD5CFiAP1oT5CBwuhgyquSkdo9Xsjr6Mjo2haTLLWh00mcUUNZHW';
    
                $stripe = new StripeClient($privateKey);
    
                $items = [
                    'mode' => 'payment',
                    'success_url' => 'http://localhost:8000/success',
                    'cancel_url' => 'http://localhost:8000/cancel',
                ];
    
                foreach (CartInfo::getCart() as $product) {
                    $items['line_items'][] = [
                        'price_data' => [
                            'currency' => 'brl',
                            'product_data' => [
                            'name' => $product->getName(),
                            ],
                            'unit_amount' => $product->getPrice() * 100,
                        ],
                        'quantity' => $product->getQuantity(),
                    ];
                }
    
                $checkout_session = $stripe->checkout->sessions->create($items);
                Redirect::to($checkout_session->url);
            } catch (Exception $e) {
                Session::flash('error', 'Falha ao fazer o pagamento verifique a sua conexão a internet!');
                Redirect::back();
            }
        }else {
            Session::flash('error', 'Faça login para fazer o pagamento!');
            Redirect::to('/login');
        }
        
    }

    public function success() 
    {
        return View::render('success');
    }

    public function cancel() 
    {
        return View::render('cancel');
    }
}