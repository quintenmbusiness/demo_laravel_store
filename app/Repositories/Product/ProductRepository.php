<?php

namespace App\Repositories\Product;

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
     * @return bool
     */
    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function show(Product $product): Product
    {
        return $product;
    }

    /**
     * @param ProductPopo $productPopo
     * @param Product $product
     * @return Product
     */
    public function update(ProductPopo $productPopo, Product $product): Product
    {
        $product->update(
            [
                'name'        => $productPopo->name,
                'price'       => $productPopo->price,
                'stock'       => $productPopo->stock,
                'description' => $productPopo->description,
                'category_id' => $productPopo->category_id,
            ]
        );

        return $product->refresh();
    }

    /**
     * @param ProductPopo $productPopo
     * @return Product
     */
    public function store(ProductPopo $productPopo): Product
    {
        return Product::create(
            [
                'name'        => $productPopo->name,
                'price'       => $productPopo->price,
                'stock'       => $productPopo->stock,
                'description' => $productPopo->description,
                'category_id' => $productPopo->category_id,
            ]
        );
    }
}
