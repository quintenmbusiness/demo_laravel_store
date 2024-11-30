<?php

namespace App\Popo\Order;

class OrderPopo
{
    public function __construct(
        public int $user_id,
        public int $total,
        public string $status,
    ) {
    }
}
