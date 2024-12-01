<?php

namespace App\Popo\User;

class CartPopo
{
    public function __construct(
        public string $session_id,
        public int|null $user_id,
        public int|null $product_id,
        public int|null $quantity,
    ) {
    }
}
