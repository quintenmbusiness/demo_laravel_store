<?php

namespace App\Http\Middleware;

use App\Repositories\Public\CartRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartMiddleware
{
    protected CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $sessionId = Session::getId();

        $cart =  $this->cartRepository->viewCartItems($sessionId);

        view()->share('cartItems', $cart->items);
        view()->share('cartTotal', $cart->total);

        return $next($request);
    }
}
