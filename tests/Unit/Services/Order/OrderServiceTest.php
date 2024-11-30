<?php

namespace Services\Order;

use App\Models\Order\Order;
use App\Models\User\User;
use App\Popo\Order\OrderPopo;
use App\Repositories\Order\OrderRepository;
use App\Services\Order\OrderService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OrderRepository $orderRepository
     */
    private OrderRepository $orderRepository;

    /**
     * @var OrderPopo
     */
    private OrderPopo $orderPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var Order
     */
    private Order $order;

    /**
     * @var OrderService $orderService
     */
    private OrderService $orderService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->orderRepository = new OrderRepository();
        $this->orderService = new OrderService($this->orderRepository);
        $this->order = Order::factory()->create();

        $this->user = User::factory()->create();
        $this->orderPopo = new OrderPopo($this->user->id);
    }

    public function test_index_method()
    {
        $result = $this->orderService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->orderService->show($this->order);

        $this->assertSame($this->order->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedOrder = $this->orderService->update($this->orderPopo, $this->order);

        $this->assertEquals($this->user->id, $updatedOrder->user_id);
        $this->assertEquals($this->orderPopo->total, $updatedOrder->total);
        $this->assertEquals($this->orderPopo->status, $updatedOrder->status);
    }

    public function testDelete()
    {
        $result = $this->orderService->delete($this->order);

        $this->assertTrue($result);
        $this->assertNull(Order::find($this->order->id));
    }

    public function testStore()
    {
        $order = $this->orderService->store($this->orderPopo);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals($this->user->id, $order->user_id);
        $this->assertEquals($this->orderPopo->total, $order->total);
        $this->assertEquals($this->orderPopo->status, $order->status);
    }
}
