<?php

namespace App\Http\Controllers\Public;

use App\Http\Requests\Product\Category\IndexCategoryRequest;
use App\Http\Requests\Product\Category\ShowCategoryRequest;
use App\Models\Product\Category;
use App\Services\Public\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * @var CategoryService $categoryService
     */
    private CategoryService $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @param IndexCategoryRequest $request
     * @return Collection
     */
    public function index(IndexCategoryRequest $request): Collection
    {
        return $this->categoryService->index();
    }

    /**
     * @param ShowCategoryRequest $request
     * @param Category $category
     * @return Category
     */
    public function show(ShowCategoryRequest $request, Category $category): Category
    {
        return $this->categoryService->show($category);
    }
}
