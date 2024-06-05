<?php

namespace app\database\models;

use app\database\Pagination;
use app\database\Transaction;
use app\database\Connection;
use PDO;
use PDOException;

abstract class Model 
{
    protected static string $table;

    public static function all(string $fields = '*', Pagination|string $pagination = '') 
    {
        if(!empty($pagination)) {
            $pagination->setTotalItems(self::count());
            $pagination = $pagination->dump();
        }

        $conn = Transaction::getConnection();

        $tableName = static::$table;

        $query = $conn->prepare("select {$fields} from {$tableName} {$pagination}");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, static::class);
           
    }

    public static function count() 
    {
        try {
            $conn = Connection::connect();
            $tableName = static::$table;
            $query = $conn->query("select * from {$tableName}");
            return $query->rowCount();
        } catch (PDOException $th) {
            dd($th->getMessage());
        }  
    }


    public static function where(string $field, string $value, string $fields = '*') 
    {
        $conn = Transaction::getConnection();

        $tableName = static::$table;

        $query = $conn->prepare("select {$fields} from {$tableName} where {$field} = :{$field}");
        $query->execute([$field => $value]);

        return $query->fetchObject(static::class);
    } 

    public static function create(array $data) 
    {
        $tableName = static::$table;

        $sql = "insert into {$tableName} (";
        $sql .= implode(',', array_keys($data)) .") values (";
        $sql .= ":".implode(',:', array_keys($data)).")";

        $conn = Transaction::getConnection();
        $prepere = $conn->prepare($sql);

        return $prepere->execute($data);
    }

    public static function update(string $field, string|int $fieldValue, array $data) 
    {
        $tableName = static::$table;

        $sql = "update {$tableName} set ";
        foreach($data  as $index => $value) {
            $sql .= "{$index} = :{$index},";
        }

        $sql = rtrim($sql, ',');
        $sql .= " where {$field} = :{$field}";

        $conn = Transaction::getConnection();

        $data[$field] = $fieldValue;
        $prepere = $conn->prepare($sql);

        return $prepere->execute($data);
    }

    public static function delete(string $field, string $value) 
    {
        $conn = Transaction::getConnection();

        $tableName = static::$table;

        $query = $conn->prepare("delete from {$tableName} where {$field} = :{$field}");

        return $query->execute([$field => $value]);
    }
}