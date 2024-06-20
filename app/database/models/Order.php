<?php

namespace app\database\models;

class Order extends Model 
{
    public static string $table = 'orders';
    public readonly int $id;
    public readonly int $iduser;
    public readonly bool $status;
    public readonly float $total;
    public readonly string $orderdate;
    public readonly string $created_at;
    public readonly string $updated_at;
}