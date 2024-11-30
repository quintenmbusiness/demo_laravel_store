<?php

namespace App\Popo\User;

class ReviewPopo
{
    public function __construct(
        public int $product_id,
        public int $user_id,
        public int $rating,
        public string $comment,
    ) {
    }
}
