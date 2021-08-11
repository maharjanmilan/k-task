<?php

namespace App\Classes;

class OrderItem
{
    protected $product;
    protected $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getSubTotal()
    {
        return $this->quantity * $this->product->getPrice();
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

}