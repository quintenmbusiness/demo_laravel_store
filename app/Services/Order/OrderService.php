<?php

namespace App\Services\Order;

use App\Models\Order\Order;
use App\Popo\Order\OrderPopo;
use App\Repositories\Order\OrderRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
     * Handle checkout and create an order.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function processCheckout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        $cart = $this->cartRepository->viewCartItems(session()->getId());

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->input('address'),
            'payment_method' => $request->input('payment_method'),
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

        // Clear the cart after checkout
        $cart->items()->delete();

        return redirect()->route('orders')->with('success', 'Your order has been placed.');
    }
}
