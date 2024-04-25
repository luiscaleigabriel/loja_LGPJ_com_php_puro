<?php

namespace app\core;

use app\database\dao\Product;

class Cart 
{
    public function add(Product $product) 
    {
        $inCart = false;
        $this->setTotal($product);
        if (count(CartInfo::getCart()) > 0) {
            foreach (CartInfo::getCart() as $productInCart) {
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
        if (!isset($_SESSION['cart']['total'] )) {
            $_SESSION['cart']['total'] = 0;
        }

        $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
    }

    private function setProductsIncart($product) 
    {
        if (!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }
        
        $_SESSION['cart']['products'][$product->getSlug()] = $product;
    }

    public function remove(int $id) 
    {
        if (isset($_SESSION['cart']['products'])) {
            foreach (CartInfo::getCart() as $index => $product) {
                if ($product->getId() === $id) {
                    $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity();
                    unset($_SESSION['cart']['products'][$index]);
                }
            }
        }
    }

}