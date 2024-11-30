<?php

namespace App\Services\Product;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use App\Repositories\Product\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
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
