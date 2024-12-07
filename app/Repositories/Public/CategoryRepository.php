<?php

namespace App\Repositories\Public;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Category::all();
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function show(Category $category): Category
    {
        return $category;
    }
}
