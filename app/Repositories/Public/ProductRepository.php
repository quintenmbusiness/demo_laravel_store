<?php

namespace App\Repositories\Public;

use App\Models\Product\Product;
use App\Popo\Product\ProductPopo;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Product::all();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function show(Product $product): Product
    {
        return $product;
    }
}
