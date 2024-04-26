<?php

namespace app\core;

use app\database\dao\Product as DaoProduct;
use app\database\models\Product;

class CartInfo 
{
    public static function getCart() 
    {
        if (!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }

        return $_SESSION['cart']['products'];
    }

    public static function getTotal() 
    {
        if ($_SESSION['cart']['total'] < 0) {

        }

        return $_SESSION['cart']['total'] ?? 0;
    }

    public static function getQuantity(Product $product) 
    {
        if (isset($_SESSION['cart']['products']) && array_key_exists($product->slug, $_SESSION['cart']['products'])) {
            return $_SESSION['cart']['products'][$product->slug]->getQuantity();
        }

        return 0;
    }

    public static function getProducSubTotal(DaoProduct $product) 
    {
        return $product->getQuantity() * $product->getPrice();
    }
}