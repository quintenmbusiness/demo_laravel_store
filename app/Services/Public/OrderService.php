<?php

namespace App\Services\Public;

use App\Models\User\Cart;
use App\Popo\Order\OrderPopo;
use App\Repositories\Public\CartRepository;
use App\Repositories\Public\OrderRepository;
use Illuminate\Http\RedirectResponse;

class OrderService
{
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;

    /**
     * @var CartRepository
     */
    private CartRepository $cartRepository;

    /**
     * @param OrderRepository $orderRepository
     * @param CartRepository $cartRepository
     */
    public function __construct(OrderRepository $orderRepository, CartRepository $cartRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->cartRepository = $cartRepository;
    }

    /**
     * Handle checkout and create an order.
     *
     * @param OrderPopo $popo
     * @param Cart $cart
     * @return RedirectResponse
     */
    public function processCheckout(OrderPopo $popo, Cart $cart): RedirectResponse
    {
        $this->orderRepository->store($popo, $cart);

        return redirect()->route('orders')->with('success', 'Your order has been placed.');
    }
}
