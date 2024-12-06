<?php

namespace App\Services\Order;

use App\Models\User\Cart;
use App\Popo\Order\OrderPopo;
use App\Repositories\Public\CartRepository;
use App\Repositories\Public\OrderRepository;
use Illuminate\Http\RedirectResponse;

class AdminOrderService
{
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
}
