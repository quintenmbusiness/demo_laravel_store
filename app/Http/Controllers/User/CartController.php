<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Cart\AddItemToCartRequest;
use App\Http\Requests\User\Cart\ClearCartRequest;
use App\Http\Requests\User\Cart\RemoveItemFromCartRequest;
use App\Http\Requests\User\Cart\ViewCartRequest;
use App\Models\User\Cart;
use App\Services\User\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
     * View the current cart items.
     *
     * @param ViewCartRequest $request
     * @return Cart
     */
    public function viewCartItems(ViewCartRequest $request): Cart
    {
        $sessionId = Session::getId();

        return $this->cartService->viewCartItems($sessionId);
    }

    /**
     * @param ClearCartRequest $request
     * @return Cart
     */
    public function clearCart(ClearCartRequest $request): Cart
    {
        $sessionId = Session::getId();

        return $this->cartService->clearCart($sessionId);
    }

    /**
     * @param RemoveItemFromCartRequest $request
     * @return RedirectResponse
     */
    public function removeCartItem(RemoveItemFromCartRequest $request): RedirectResponse
    {
        $this->cartService->removeCartItem($request->toPopo(), Session::getId());

        return redirect()->back();
    }

    /**
     * @param  AddItemToCartRequest $request
     * @return RedirectResponse
 */
    public function addCartItem(AddItemToCartRequest $request): RedirectResponse
    {
        $this->cartService->addCartItem($request->toPopo(), Session::getId());

        return redirect()->back();
    }
}
