<?php

namespace app\database\dao;

class Product 
{
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;
    private string $description;
    private string $slug;
    private string $image;

    public function setId(int $id) 
    {
        $this->id = $id;
    }   

    public function setName(string $name) 
    {
        $this->name = $name;
    }

    public function setPrice(float $price) 
    {
        $this->price = $price;
    }

    public function setQuantity(int $quantity) 
    {
        $this->quantity = $quantity;
    }

    public function setDescription(string $description) 
    {
        $this->description = $description;
    }

    public function setSlug(string $slug) 
    {
        $this->slug = $slug;
    }

    public function setImage(string $image) 
    {
        $this->image = $image;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function getPrice(): float 
    {
        return $this->price;
    }

    public function getQuantity(): int 
    {
        return $this->quantity;
    }

    public function getDescription(): string 
    {
       return $this->description; 
    }

    public function getSlug(): string 
    {
       return $this->slug; 
    }

    public function getImage(): string 
    {
        return $this->image;
    }

}