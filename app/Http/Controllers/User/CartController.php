<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Cart\DeleteCartRequest;
use App\Http\Requests\User\Cart\IndexCartRequest;
use App\Http\Requests\User\Cart\ShowCartRequest;
use App\Http\Requests\User\Cart\StoreCartRequest;
use App\Http\Requests\User\Cart\UpdateCartRequest;
use App\Models\User\Cart;
use App\Services\User\CartService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    /**
     * @var CartService
     */
    private CartService $cartService;

    /**
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @param IndexCartRequest $request
     * @return Collection
     */
    public function index(IndexCartRequest $request): Collection
    {
        return $this->cartService->index();
    }

    /**
     * @param ShowCartRequest $request
     * @param Cart $cart
     * @return Cart
     */
    public function show(ShowCartRequest $request, Cart $cart): Cart
    {
        return $this->cartService->show($cart);
    }

    /**
     * @param UpdateCartRequest $request
     * @param Cart $cart
     * @return Cart
     */
    public function update(UpdateCartRequest $request, Cart $cart): Cart
    {
        return $this->cartService->update($request->toPopo(), $cart);
    }

    /**
     * @param DeleteCartRequest $request
     * @param Cart $cart
     * @return bool
     */
    public function delete(DeleteCartRequest $request, Cart $cart): bool
    {
        return $this->cartService->delete($cart);
    }

    /**
     * @param  StoreCartRequest $request
     * @return Cart
     */
    public function store(StoreCartRequest $request): Cart
    {
        return $this->cartService->store($request->toPopo());
    }
}
