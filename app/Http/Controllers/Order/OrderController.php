<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\DeleteOrderRequest;
use App\Http\Requests\Order\IndexOrderRequest;
use App\Http\Requests\Order\ShowOrderRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order\Order;
use App\Services\Order\OrderService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private OrderService $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param IndexOrderRequest $request
     * @return Collection
     */
    public function index(IndexOrderRequest $request): Collection
    {
        return $this->orderService->index();
    }

    /**
     * @param ShowOrderRequest $request
     * @param Order $order
     * @return Order
     */
    public function show(ShowOrderRequest $request, Order $order): Order
    {
        return $this->orderService->show($order);
    }

    /**
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return Order
     */
    public function update(UpdateOrderRequest $request, Order $order): Order
    {
        return $this->orderService->update($request->toPopo(), $order);
    }

    /**
     * @param DeleteOrderRequest $request
     * @param Order $order
     * @return bool
     */
    public function delete(DeleteOrderRequest $request, Order $order): bool
    {
        return $this->orderService->delete($order);
    }

    /**
     * @param  StoreOrderRequest $request
     * @return Order
     */
    public function store(StoreOrderRequest $request): Order
    {
        return $this->orderService->store($request->toPopo());
    }
}
