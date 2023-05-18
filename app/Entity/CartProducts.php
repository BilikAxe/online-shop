<?php

namespace banana\Entity;

class CartProducts
{
    private Product $product;
    private Cart $cart;
    private int $quantity;


    public function __construct(Product $product, Cart $cart, int $quantity)
    {
        $this->product = $product;
        $this->cart = $cart;
        $this->quantity = $quantity;
    }


    public function getProducts(): Product
    {
        return $this->product;
    }


    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}