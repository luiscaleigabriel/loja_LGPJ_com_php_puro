<?php

namespace app\database\models;


class Category extends Model 
{
    public static string $table = 'category';
    public readonly int $id;
    public readonly string $name;
    public readonly string $slug;
    public readonly string $created_at;
    public readonly string $updated_at;
    public readonly bool $status;
}