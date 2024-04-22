<?php

namespace app\core;

use app\database\dao\Product;

class Cart 
{
    public function add(Product $product) 
    {
        $inCart = false;
        $this->setTotal($product);
        if (count($this->getCart()) > 0) {
            foreach($this->getCart() as $productInCart) {
                if ($productInCart->getId() === $product->getId()) {
                    $quantity = $productInCart->getQuantity() + $product->getQuantity();
                    $productInCart->setQuantity($quantity);
                    $inCart = true;
                    break;
                }
            }
        }

        if (!$inCart) {
            $this->setProductsIncart($product);
        }
    }

    private function setTotal(Product $product) 
    {
        if (!isset($this->getCart()['total'])) {
            $_SESSION['cart']['products']['total'] = 0;
        }
        $this->getCart()['total'] += $product->getPrice() * $product->getQuantity();
    }

    private function setProductsIncart($product) 
    {
        if (!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }

        $_SESSION['cart']['products'][] = $product;
    }

    public function remove() 
    {

    }

    public function getCart() 
    {
        if (!array_key_exists('cart', $_SESSION)) {
            $_SESSION['cart']['products'] = [];
        }

        return $_SESSION['cart']['products'];
    }
}