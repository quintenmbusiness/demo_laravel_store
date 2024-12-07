<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order\Order;
use App\Services\Admin\AdminOrderService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    /**
     * @var AdminOrderService $orderService
     */
    private AdminOrderService $orderService;

    /**
     * @param AdminOrderService $orderService
     */
    public function __construct(AdminOrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function show(Order $order): Order
    {
        return $order->load('items.product');
    }
}
