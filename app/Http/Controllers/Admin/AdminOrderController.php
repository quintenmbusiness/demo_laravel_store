<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order\Order;
use App\Services\Admin\AdminOrderService;
use Illuminate\Routing\Controller;
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

    public function edit(Order $order): View
    {
        $statuses = Order::distinct('status')->pluck('status');

        return view('admin.orders.show', ['order' => $order, 'statuses' => $statuses, 'edit' => true]);
    }

    public function show(Order $order): View
    {
        $order->load('items.product');

        return view('admin.orders.show', ['order' => $order]);
    }
}
