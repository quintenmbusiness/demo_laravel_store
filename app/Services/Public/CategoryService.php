<?php

namespace App\Services\Public;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use App\Repositories\Public\CategoryRepository;
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
}
