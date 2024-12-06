<?php

namespace App\Http\Controllers\Public;

use App\Http\Requests\Order\ProcessOrderRequest;
use App\Models\Order\Order;
use App\Repositories\Public\CartRepository;
use App\Services\Public\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @var OrderService $orderService
     */
    private OrderService $orderService;

    /**
     * @var CartRepository $cartRepository
     */
    private CartRepository $cartRepository;

    /**
     * @param OrderService $orderService
     * @param CartRepository $cartRepository
     */
    public function __construct(OrderService $orderService, CartRepository $cartRepository)
    {
        $this->orderService = $orderService;
        $this->cartRepository = $cartRepository;
    }

    /**
     * Show the checkout page.
     *
     * @return View
     */
    public function checkout(): View
    {
        return view('checkout');
    }

    /**
     * Handle checkout and create an order.
     *
     * @param  ProcessOrderRequest  $request
     * @return RedirectResponse
     */
    public function process(ProcessOrderRequest $request): RedirectResponse
    {
        $popo = $request->toPopo();
        $cart = $this->cartRepository->viewCartItems(session()->getId());

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $this->orderService->processCheckout($popo, $cart);

        return redirect()->route('orders')->with('success', 'Your order has been placed.');
    }
}
