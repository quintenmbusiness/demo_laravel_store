<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\ShowProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product\Product;
use App\Services\Product\ProductService;
use Illuminate\Routing\Controller;
use \Illuminate\Contracts\View\View;

class ProductController extends Controller
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

    /**
     * @param IndexProductRequest $request
     * @return View
     */
    public function index(IndexProductRequest $request): View
    {
        $products = Product::all();
        return view('products', compact('products'));
        return $this->productService->index();
    }

    /**
     * @param ShowProductRequest $request
     * @param Product $product
     * @return Product
     */
    public function show(ShowProductRequest $request, Product $product): Product
    {
        return $this->productService->show($product);
    }

    /**
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Product
     */
    public function update(UpdateProductRequest $request, Product $product): Product
    {
        return $this->productService->store($request->toPopo());
    }

    /**
     * @param DeleteProductRequest $request
     * @param Product $product
     * @return bool
     */
    public function delete(DeleteProductRequest $request, Product $product): bool
    {
        return $this->productService->delete($product);
    }

    /**
     * @param  StoreProductRequest $request
     * @return Product
     */
    public function store(StoreProductRequest $request): Product
    {
        return $this->productService->store($request->toPopo());
    }
}
