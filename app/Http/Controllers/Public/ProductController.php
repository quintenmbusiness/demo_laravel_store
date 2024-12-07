<?php

namespace App\Http\Controllers\Public;

use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\ShowProductRequest;
use App\Models\Product\Product;
use App\Services\Public\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * @var ProductService $productService
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
     *
     * @return Collection
     */
    public function index(IndexProductRequest $request): Collection
    {
        return $this->productService->index();
    }

    /**
     * @param ShowProductRequest $request
     * @param Product $product
     *
     * @return Product
     */
    public function show(ShowProductRequest $request, Product $product): Product
    {
        return $this->productService->show($product);
    }
}
