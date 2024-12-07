<?php

namespace Services\Admin;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use App\Services\Admin\AdminCategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategoryServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AdminCategoryService $service
     */
    private AdminCategoryservice $service;

    /**
     * @var CategoryPopo $categoryPopo
     */
    private CategoryPopo $categoryPopo;

    /**
     * @var Category $category
     */
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make(AdminCategoryService::class);
        $this->category = Category::factory()->create();

        $this->categoryPopo = new CategoryPopo('New Category');
    }

    public function test_can_list_all_categories(): void
    {
        $currentCount = Category::all()->count();
        Category::factory()->count(3)->create();

        $categories = $this->service->index();

        $this->assertCount($currentCount + 3, $categories);
        $this->assertInstanceOf(Category::class, $categories->first());
    }

    public function test_can_delete_a_category(): void
    {
        $category = Category::factory()->create();

        $result = $this->service->delete($category);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_can_show_a_category(): void
    {
        $category = Category::factory()->create();

        $foundCategory = $this->service->show($category);

        $this->assertInstanceOf(Category::class, $foundCategory);
        $this->assertEquals($category->id, $foundCategory->id);
    }

    public function test_can_update_a_category(): void
    {
        $category = Category::factory()->create(['name' => 'Old Name']);

        $categoryPopo = new CategoryPopo('New Name');

        $updatedCategory = $this->service->update($categoryPopo, $category);

        $this->assertEquals('New Name', $updatedCategory->name);
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'New Name']);
    }

    public function test_can_store_a_new_category(): void
    {
        $categoryPopo = new CategoryPopo('New Category');

        $newCategory = $this->service->store($categoryPopo);

        $this->assertInstanceOf(Category::class, $newCategory);
        $this->assertDatabaseHas('categories', ['id' => $newCategory->id, 'name' => 'New Category']);
    }
}
