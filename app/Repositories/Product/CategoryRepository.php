<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Popo\CategoryPopo;
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
     * @return bool
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function show(Category $category): Category
    {
        return $category;
    }

    /**
     * @param CategoryPopo $categoryPopo
     * @param Category $category
     * @return Category
     */
    public function update(CategoryPopo $categoryPopo, Category $category): Category
    {
        $category->update(
            [
                'name'        => $categoryPopo->name,
                'price'       => $categoryPopo->price,
                'stock'       => $categoryPopo->stock,
                'category_id' => $categoryPopo->category_id,
            ]
        );

        return $category->refresh();
    }

    /**
     * @param CategoryPopo $categoryPopo
     * @return Category
     */
    public function store(CategoryPopo $categoryPopo): Category
    {
        return Category::create(
            [
                'name'        => $categoryPopo->name,
                'price'       => $categoryPopo->price,
                'stock'       => $categoryPopo->stock,
                'category_id' => $categoryPopo->category_id,
            ]
        );
    }
}
