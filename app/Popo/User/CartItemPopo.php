<?php

namespace App\Popo\User;

class CartItemPopo
{
    public function __construct(
        public int|null $cart_id,
        public int|null $product_id,
        public int|null $quantity,
    ) {
    }
}
