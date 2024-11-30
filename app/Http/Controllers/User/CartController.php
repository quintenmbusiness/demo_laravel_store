<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Product\DeleteTagRequest;
use App\Http\Requests\Product\IndexTagRequest;
use App\Http\Requests\Product\ShowTagRequest;
use App\Http\Requests\Product\StoreTagRequest;
use App\Http\Requests\Product\UpdateTagRequest;
use App\Models\Cart;
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
     * @param IndexTagRequest $request
     * @return Collection
     */
    public function index(IndexTagRequest $request): Collection
    {
        return $this->cartService->index();
    }

    /**
     * @param ShowTagRequest $request
     * @param Cart $cart
     * @return Cart
     */
    public function show(ShowTagRequest $request, Cart $cart): Cart
    {
        return $this->cartService->show($cart);
    }

    /**
     * @param UpdateTagRequest $request
     * @param Cart $cart
     * @return Cart
     */
    public function update(UpdateTagRequest $request, Cart $cart): Cart
    {
        return $this->cartService->store($request->toPopo());
    }

    /**
     * @param DeleteTagRequest $request
     * @param Cart $cart
     * @return bool
     */
    public function delete(DeleteTagRequest $request, Cart $cart): bool
    {
        return $this->cartService->delete($cart);
    }

    /**
     * @param  StoreTagRequest $request
     * @return Cart
     */
    public function store(StoreTagRequest $request): Cart
    {
        return $this->cartService->store($request->toPopo());
    }
}
