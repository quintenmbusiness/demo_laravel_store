<?php

namespace App\Http\Controllers\Public;

use App\Http\Requests\Order\ProcessOrderRequest;
use App\Models\Order\Order;
use App\Repositories\Public\CartRepository;
use App\Services\Public\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
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
}
