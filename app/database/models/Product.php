<?php

namespace app\database\models;


class Product extends Model 
{
    public static string $table = 'product';
    public readonly int $id;
    public readonly string $name;
    public readonly string $slug;
    public readonly string $description;
    public readonly float $price;
    public readonly int $quantity;
    public readonly string $image;
    public readonly bool $status;
    public readonly int $idsubcategory;
    public readonly int $idcategory;
    public readonly string $created_at;
    public readonly string $updated_at;
}