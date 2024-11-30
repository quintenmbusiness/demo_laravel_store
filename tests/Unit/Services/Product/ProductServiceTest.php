<?php

namespace Services\Product;

use App\Models\Product\Product;
use App\Models\User\User;
use App\Popo\Product\ProductPopo;
use App\Repositories\Product\ProductRepository;
use App\Services\Product\ProductService;
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
     * @var ProductService $productService
     */
    private ProductService $productService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepository = new ProductRepository();
        $this->productService = new ProductService($this->productRepository);
        $this->product = Product::factory()->create();

        $this->user = User::factory()->create();
        $this->productPopo = new ProductPopo($this->user->id);
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

        $this->assertEquals($this->user->id, $updatedProduct->user_id);
    }

    public function testDelete()
    {
        $result = $this->productService->delete($this->product);

        $this->assertTrue($result);
        $this->assertNull(Product::find($this->product->id));
    }

    public function testStore()
    {
        $product = $this->productService->store($this->productPopo);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->user->id, $product->user_id);
    }
}
