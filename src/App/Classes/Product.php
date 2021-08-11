<?php

namespace App\Classes;

class Product
{
    protected $name;
    protected $price;

    private function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public static function find(int $productId): Product
    {
        return new self("Power Bank", 1.4);
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}