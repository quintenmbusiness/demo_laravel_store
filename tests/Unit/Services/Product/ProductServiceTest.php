<?php

namespace Services\Product;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\User\User;
use App\Popo\Product\ProductPopo;
use App\Repositories\Public\ProductRepository;
use App\Services\Public\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ProductRepository $productRepository
     */
    private ProductRepository $productRepository;

    /**
     * @var ProductPopo
     */
    private ProductPopo $productPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var Product
     */
    private Product $product;

    /**
     * @var Category
     */
    private Category $category;

    /**
     * @var ProductService $productService
     */
    private ProductService $productService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepository = new ProductRepository();
        $this->productService = new ProductService($this->productRepository);
        $this->product = Product::factory()->create();
        $this->category = Category::factory()->create();

        $this->user = User::factory()->create();
        $this->productPopo = new ProductPopo(
            'test',
            'test',
            100,
            100,
            $this->category->id
        );
    }

    public function test_index_method()
    {
        $result = $this->productService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->productService->show($this->product);

        $this->assertSame($this->product->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedProduct = $this->productService->update($this->productPopo, $this->product);

        $this->assertEquals($this->product->id, $updatedProduct->id);
        $this->assertEquals($this->product->name, $updatedProduct->name);
        $this->assertEquals($this->product->price, $updatedProduct->price);
        $this->assertEquals($this->product->stock, $updatedProduct->stock);
        $this->assertEquals($this->product->description, $updatedProduct->description);
        $this->assertEquals($this->product->category(), $updatedProduct->category());
    }

    public function test_delete_method()
    {
        $result = $this->productService->delete($this->product);

        $this->assertTrue($result);
        $this->assertNull(Product::find($this->product->id));
    }

    public function test_store_method()
    {
        $product = $this->productService->store($this->productPopo);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->productPopo->name, $product->name);
        $this->assertEquals($this->productPopo->price, $product->price);
        $this->assertEquals($this->productPopo->stock, $product->stock);
        $this->assertEquals($this->productPopo->description, $product->description);
        $this->assertEquals($this->productPopo->category_id, $product->category_id);
    }
}
