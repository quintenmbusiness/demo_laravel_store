<?php

namespace App\Http\Controllers\Public;

use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\ShowProductRequest;
use App\Models\Product\Product;
use App\Services\Public\ProductService;
use Illuminate\Contracts\View\View;
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
     * @return View
     */
    public function index(IndexProductRequest $request): View
    {
        $products = $this->productService->index();

        return view('products.index', compact('products'));
    }

    /**
     * @param ShowProductRequest $request
     * @param Product $product
     * @return View
     */
    public function show(ShowProductRequest $request, Product $product): View
    {
        return view('products.show', compact('product'));
    }
}
