<?php

namespace Services\Admin;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Popo\Product\ProductPopo;
use App\Services\Admin\AdminProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AdminProductService $service
     */
    private AdminProductService $service;

    /**
     * @var Product $product
     */
    private Product $product;

    /**
     * @var Category $category
     */
    private Category $category;

    /**
     * @var ProductPopo $productPopo
     */
    private ProductPopo $productPopo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make(AdminProductService::class);
        $this->category = Category::factory()->create();
        $this->product = Product::factory()->create();

        $this->productPopo = new ProductPopo(
            name: 'New Product',
            price: 99.99,
            stock: 10,
            description: 'A sample product description.',
            category_id: 1
        );
    }

    public function test_can_list_all_products(): void
    {
        $currentCount = Product::count();
        Product::factory()->count(3)->create();

        $products = $this->service->index();

        $this->assertCount($currentCount + 3, $products);
        $this->assertInstanceOf(Product::class, $products->first());
    }

    public function test_can_delete_a_product(): void
    {
        $product = Product::factory()->create();

        $result = $this->service->delete($product);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_can_show_a_product(): void
    {
        $product = Product::factory()->create();

        $foundProduct = $this->service->show($product);

        $this->assertInstanceOf(Product::class, $foundProduct);
        $this->assertEquals($product->id, $foundProduct->id);
    }

    public function test_can_update_a_product(): void
    {
        $product = Product::factory()->create(['name' => 'Old Product']);

        $productPopo = new ProductPopo(
            name: 'Updated Product',
            price: 49.99,
            stock: 20,
            description: 'Updated description.',
            category_id: 2
        );

        $updatedProduct = $this->service->update($productPopo, $product);

        $this->assertEquals('Updated Product', $updatedProduct->name);
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated Product']);
    }

    public function test_can_store_a_new_product(): void
    {
        $productPopo = new ProductPopo(
            name: 'New Product',
            price: 99.99,
            stock: 10,
            description: 'A sample product description.',
            category_id: 1
        );

        $newProduct = $this->service->store($productPopo);

        $this->assertInstanceOf(Product::class, $newProduct);
        $this->assertDatabaseHas('products', ['id' => $newProduct->id, 'name' => 'New Product']);
    }
}
