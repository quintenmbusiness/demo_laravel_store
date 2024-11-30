<?php

namespace Services\Product;

use App\Models\Product\Category;
use App\Models\User\User;
use App\Popo\Product\CategoryPopo;
use App\Repositories\Product\CategoryRepository;
use App\Services\Product\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CategoryRepository $categoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * @var CategoryPopo
     */
    private CategoryPopo $categoryPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var Category
     */
    private Category $category;

    /**
     * @var CategoryService $categoryService
     */
    private CategoryService $categoryService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = new CategoryRepository();
        $this->categoryService = new CategoryService($this->categoryRepository);
        $this->category = Category::factory()->create();

        $this->user = User::factory()->create();
        $this->categoryPopo = new CategoryPopo($this->user->id);
    }

    public function test_index_method()
    {
        $result = $this->categoryService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->categoryService->show($this->category);

        $this->assertSame($this->category->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedCategory = $this->categoryService->update($this->categoryPopo, $this->category);

        $this->assertEquals($this->category->name, $updatedCategory->name);
    }

    public function testDelete()
    {
        $result = $this->categoryService->delete($this->category);

        $this->assertTrue($result);
        $this->assertNull(Category::find($this->category->id));
    }

    public function testStore()
    {
        $category = $this->categoryService->store($this->categoryPopo);

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($this->categoryPopo->name, $category->name);
    }
}
