<?php

namespace App\Popo\Product;

class ProductPopo
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public float $stock,
        public float $category_id,
    ) {
    }
}
