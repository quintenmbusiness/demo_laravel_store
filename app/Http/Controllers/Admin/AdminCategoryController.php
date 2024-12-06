<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product\Category\DeleteCategoryRequest;
use App\Http\Requests\Product\Category\IndexCategoryRequest;
use App\Http\Requests\Product\Category\ShowCategoryRequest;
use App\Http\Requests\Product\Category\StoreCategoryRequest;
use App\Http\Requests\Product\Category\UpdateCategoryRequest;
use App\Models\Product\Category;
use App\Services\Product\AdminCategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    /**
     * @var AdminCategoryService $categoryService
     */
    private AdminCategoryService $categoryService;

    /**
     * @param AdminCategoryService $categoryService
     */
    public function __construct(AdminCategoryService $categoryService)
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

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return Category
     */
    public function update(UpdateCategoryRequest $request, Category $category): Category
    {
        return $this->categoryService->update($request->toPopo(), $category);
    }

    /**
     * @param DeleteCategoryRequest $request
     * @param Category $category
     * @return bool
     */
    public function delete(DeleteCategoryRequest $request, Category $category): bool
    {
        return $this->categoryService->delete($category);
    }

    /**
     * @param  StoreCategoryRequest $request
     * @return Category
     */
    public function store(StoreCategoryRequest $request): Category
    {
        return $this->categoryService->store($request->toPopo());
    }
}
