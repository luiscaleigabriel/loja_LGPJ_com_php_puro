<?php

namespace app\database\models;


class User extends Model 
{
    public static string $table = 'user';
    public readonly int $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $phone;
    public readonly string $gender;
    public readonly string $address;
    public readonly string $password;
    public readonly null|string $image;
    public readonly bool $is_admin;
    public readonly string $created_at;
    public readonly string $updated_at;
}