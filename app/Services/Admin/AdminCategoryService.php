<?php

namespace App\Services\Admin;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use App\Repositories\Admin\AdminCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminCategoryService
{
    /**
     * @var AdminCategoryRepository
     */
    private AdminCategoryRepository $categoryRepository;

    /**
     * @param AdminCategoryRepository $categoryRepository
     */
    public function __construct(AdminCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->categoryRepository->index();
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function show(Category $category): Category
    {
        return $this->categoryRepository->show($category);
    }

    /**
     * @param CategoryPopo $categoryPopo
     * @param Category $category
     * @return Category
     */
    public function update(CategoryPopo $categoryPopo, Category $category): Category
    {
        return $this->categoryRepository->update($categoryPopo, $category);
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category): bool
    {
        return $this->categoryRepository->delete($category);
    }

    /**
     * @param CategoryPopo $popo
     * @return Category
     */
    public function store(CategoryPopo $popo): Category
    {
        return $this->categoryRepository->store($popo);
    }
}
