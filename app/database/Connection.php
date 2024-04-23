<?php

namespace app\database;

use PDO;

class Connection 
{
    private static ?PDO $connction = null;

    public static function connect() 
    {
        if (!self::$connction) {
            self::$connction = new PDO('mysql:host=localhost;dbname=lojaljpg', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }

        return self::$connction;
    }
}