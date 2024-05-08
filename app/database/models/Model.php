<?php

namespace app\database\models;

use app\database\Transaction;
use PDO;
use PDOException;

abstract class Model 
{
    protected static string $table;

    public static function all(string $fields = '*') 
    {
        try {
            Transaction::open();

            $conn = Transaction::getConnection();

            $tableName = static::$table;

            $query = $conn->prepare("select {$fields} from {$tableName}");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();
        } catch (PDOException $th) {
            Transaction::rollback();
        }
    }

    public static function where(string $field, string $value, string $fields = '*') 
    {
        try {
            Transaction::open();

            $conn = Transaction::getConnection();

            $tableName = static::$table;

            $query = $conn->prepare("select {$fields} from {$tableName} where {$field} = :{$field}");
            $query->execute([$field => $value]);

            return $query->fetchObject(static::class);

            Transaction::close();
        } catch (PDOException $th) {
            Transaction::rollback();
        }
    } 

    public static function create(array $data) 
    {
        try {
            Transaction::open();

            $tableName = static::$table;

            $sql = "insert into {$tableName} (";
            $sql .= implode(',', array_keys($data)) .") values (";
            $sql .= ":".implode(',:', array_keys($data)).")";

            $conn = Transaction::getConnection();
            $prepere = $conn->prepare($sql);

            return $prepere->execute($data);

            Transaction::close();
        } catch (PDOException $th) {
            dd($th->getMessage());
            Transaction::rollback();
        }
    }

    public static function update(string $field, string|int $fieldValue, array $data) 
    {
        try {
            Transaction::open();
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

            Transaction::close();
        } catch (PDOException $th) {
            Transaction::rollback();
        }
    }

    public static function delete(string $field, string $value) 
    {
        try {
            Transaction::open();

            $conn = Transaction::getConnection();

            $tableName = static::$table;

            $query = $conn->prepare("delete from {$tableName} where {$field} = :{$field}");

           return $query->execute([$field => $value]);

            Transaction::close();
        } catch (PDOException $th) {
            Transaction::rollback();
        }
    }
}