<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\DeleteOrderRequest;
use App\Http\Requests\Order\IndexOrderRequest;
use App\Http\Requests\Order\ShowOrderRequest;
use App\Http\Requests\Order\ProcessOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Repositories\User\CartRepository;
use App\Services\Order\OrderService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private OrderService $orderService;

    /**
     * @var CartRepository
     */
    private CartRepository $cartRepository;

    /**
     * @param OrderService $orderService
     * @param CartRepository $cartRepository
     */
    public function __construct(OrderService $orderService, CartRepository $cartRepository)
    {
        $this->orderService = $orderService;
        $this->cartRepository = new CartRepository();
    }

    /**
     * Show the checkout page.
     *
     * @return View
     */
    public function checkout()
    {
        return view('checkout');
    }

    /**
     * Handle checkout and create an order.
     *
     * @param  ProcessOrderRequest  $request
     * @return RedirectResponse
     */
    public function process(ProcessOrderRequest $request)
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
