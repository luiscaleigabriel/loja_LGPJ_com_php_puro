<?php

namespace app\core;

use app\database\models\Category;
use app\database\models\Product;
use app\support\Session;
use Exception;
use League\Plates\Engine;

class View 
{
    private static array $instances = [];

    private static function addInstance(string $instanceKey,  $instanceClass) 
    {
        if (!isset(self::$instances[$instanceKey])) {
            self::$instances[$instanceKey] = $instanceClass;
        }
    }

    public static function render(string $view, array $data = []) 
    {
        $path = dirname(__FILE__, 3);
        $filePath = $path . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

        if (!file_exists($filePath . $view . '.php')) {
            throw new Exception("View {$view} não existe ");
        }

        self::addInstance('cart', new CartInfo);
        self::addInstance('session', Session::class);
        self::addInstance('categories', Category::class);

        $templates = new Engine($filePath);
        $templates->addData(['instances' => self::$instances]);

        echo $templates->render($view, $data);
    }
}