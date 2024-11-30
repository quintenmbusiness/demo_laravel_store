<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Popo\OrderPopo;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Order::all();
    }

    /**
     * @param Order $order
     * @return bool
     */
    public function delete(Order $order): bool
    {
        return $order->delete();
    }

    /**
     * @param Order $order
     * @return Order
     */
    public function show(Order $order): Order
    {
        return $order;
    }

    /**
     * @param OrderPopo $orderPopo
     * @param Order $order
     * @return Order
     */
    public function update(OrderPopo $orderPopo, Order $order): Order
    {
        $order->update(
            [
                'name'        => $orderPopo->name,
                'price'       => $orderPopo->price,
                'stock'       => $orderPopo->stock,
                'category_id' => $orderPopo->category_id,
            ]
        );

        return $order->refresh();
    }

    /**
     * @param OrderPopo $orderPopo
     * @return Order
     */
    public function store(OrderPopo $orderPopo): Order
    {
        return Order::create(
            [
                'name'        => $orderPopo->name,
                'price'       => $orderPopo->price,
                'stock'       => $orderPopo->stock,
                'category_id' => $orderPopo->category_id,
            ]
        );
    }
}
