<?php

namespace app\database\models;


class SubCategory extends Model 
{
    public static string $table = 'subcategory';
    public readonly int $id;
    public readonly string $name;
    public readonly string $slug;
    public readonly int $idcategory;
    public readonly string $created_at;
    public readonly string $updated_at;
    public readonly bool $status;
}