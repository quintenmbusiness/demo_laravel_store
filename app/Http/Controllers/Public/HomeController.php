<?php

namespace App\Http\Controllers\Public;

use App\Models\Product\Product;
use App\Services\Public\ProductService;
use Illuminate\Routing\Controller;

class HomeController extends Controller
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

    public function index()
    {
        $products = Product::take(6)->get();

        return view('home', compact('products'));
    }
}
