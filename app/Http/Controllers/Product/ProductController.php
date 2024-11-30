<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\DeleteTagRequest;
use App\Http\Requests\Product\IndexTagRequest;
use App\Http\Requests\Product\ShowTagRequest;
use App\Http\Requests\Product\StoreTagRequest;
use App\Http\Requests\Product\UpdateTagRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

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
     * @param IndexTagRequest $request
     * @return Collection
     */
    public function index(IndexTagRequest $request): Collection
    {
        return $this->productService->index();
    }

    /**
     * @param ShowTagRequest $request
     * @param Product $product
     * @return Product
     */
    public function show(ShowTagRequest $request, Product $product): Product
    {
        return $this->productService->show($product);
    }

    /**
     * @param UpdateTagRequest $request
     * @param Product $product
     * @return Product
     */
    public function update(UpdateTagRequest $request, Product $product): Product
    {
        return $this->productService->store($request->toPopo());
    }

    /**
     * @param DeleteTagRequest $request
     * @param Product $product
     * @return bool
     */
    public function delete(DeleteTagRequest $request, Product $product): bool
    {
        return $this->productService->delete($product);
    }

    /**
     * @param  StoreTagRequest $request
     * @return Product
     */
    public function store(StoreTagRequest $request): Product
    {
        return $this->productService->store($request->toPopo());
    }
}
