<?php

namespace App\Services\Order;

use App\Models\Order\Order;
use App\Popo\Order\OrderPopo;
use App\Repositories\Order\OrderRepository;
use Illuminate\Database\Eloquent\Collection;

class OrderService
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

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->orderRepository->index();
    }

    /**
     * @param Order $order
     * @return Order
     */
    public function show(Order $order): Order
    {
        return $this->orderRepository->show($order);
    }

    /**
     * @param OrderPopo $orderPopo
     * @param Order $order
     * @return Order
     */
    public function update(OrderPopo $orderPopo, Order $order): Order
    {
        return $this->orderRepository->update($orderPopo, $order);
    }

    /**
     * @param Order $order
     * @return bool
     */
    public function delete(Order $order): bool
    {
        return $this->orderRepository->delete($order);
    }

    /**
     * @param OrderPopo $popo
     * @return Order
     */
    public function store(OrderPopo $popo): Order
    {
        return $this->orderRepository->store($popo);
    }
}
