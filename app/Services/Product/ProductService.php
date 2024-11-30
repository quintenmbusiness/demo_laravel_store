<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use App\Popo\Product\ProductPopo;
use App\Repositories\Product\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->productRepository->index();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function show(Product $product): Product
    {
        return $this->productRepository->show($product);
    }

    /**
     * @param ProductPopo $productPopo
     * @param Product $product
     * @return Product
     */
    public function update(ProductPopo $productPopo, Product $product): Product
    {
        return $this->productRepository->update($productPopo, $product);
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function delete(Product $product): bool
    {
        return $this->productRepository->delete($product);
    }

    /**
     * @param ProductPopo $popo
     * @return Product
     */
    public function store(ProductPopo $popo): Product
    {
        return $this->productRepository->store($popo);
    }
}
