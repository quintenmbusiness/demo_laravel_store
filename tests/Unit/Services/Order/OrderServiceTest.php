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
        $this->orderPopo = new OrderPopo($this->user->id, 100, "COMPLETED");
    }
}
