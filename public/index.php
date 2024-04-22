<?php



use app\core\Cart;
use app\database\dao\Product;

require '../vendor/autoload.php';

session_start();
    

    $products = [
        1 => ['id' => 1, 'name' => 'Geladeira', 'price' => 1000, 'quantity' => 1],
        2 => ['id' => 2, 'name' => 'Mouse', 'price' => 2000, 'quantity' => 1],
        3 => ['id' => 3, 'name' => 'Teclado', 'price' => 100, 'quantity' => 1],
        4 => ['id' => 4, 'name' => 'Monitor', 'price' => 50, 'quantity' => 1],
    ];

    if (array_key_exists('id', $_GET)) {

        $id = strip_tags($_GET['id']);
        $productInfo = $products[$id];

        $product = new Product;
        $product->setId($productInfo['id']);
        $product->setName($productInfo['name']);
        $product->setPrice($productInfo['price']);
        $product->setQuantity($productInfo['quantity']);
        $product->setDescription($productInfo['quantity'].$productInfo['name']);

        $cart = new Cart;
        dd($product);
        $cart->add($product);

    }

    var_dump($_SESSION['cart'] ?? []);

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>
        <li>
            Geladeira <a href="?id=1">add</a> R$ 1000
        </li>
        <li>
            Mouse <a href="?id=2">add</a> R$ 2000
        </li>
        <li>
            Teclado <a href="?id=3">add</a> R$ 100
        </li>
        <li>
            Monitor <a href="?id=4">add</a> R$ 50
        </li>
    </ul>

</body>
</html>