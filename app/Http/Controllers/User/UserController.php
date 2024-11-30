<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Product\StoreTagRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): Collection
    {
        return Product::all();
    }

    public function show(Product $product): Product
    {
        return $product;
    }

    public function update(StoreTagRequest $request, Product $product): Product
    {
        $product->update($request->validated());

        return $product->fresh();
    }

    public function destroy(Product $product): bool
    {
        return $product->delete();
    }

    /**
     * @param  StoreTagRequest $request
     * @return Product
     */
    public function store(StoreTagRequest $request): Product
    {
        return Product::create($request->validated());
    }
}
