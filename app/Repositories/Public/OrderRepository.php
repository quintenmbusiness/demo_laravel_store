<?php

namespace App\Repositories\Public;

use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\User\Cart;
use App\Popo\Order\OrderPopo;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    /**
     * Handle checkout and create an order.
     *
     * @param OrderPopo $popo
     * @param Cart $cart
     * @return Order
     */
    public function store(OrderPopo $popo, Cart $cart): Order
    {
         $order = Order::create([
             'user_id' => Auth::id(),
             'address' => $popo->address,
             'payment_method' => $popo->payment_method,
             'total' => $cart->total,
         ]);

         foreach ($cart->items as $item) {
             OrderItem::create([
                 'order_id' => $order->id,
                 'product_id' => $item->product_id,
                 'quantity' => $item->quantity,
                 'price' => $item->product->price,
             ]);
         }

         $cart->items()->delete();

         return $order->refresh();
    }
}
