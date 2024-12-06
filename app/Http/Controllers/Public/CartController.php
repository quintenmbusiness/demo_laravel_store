<?php

namespace App\Http\Controllers\Public;

use App\Http\Requests\User\Cart\AddItemToCartRequest;
use App\Http\Requests\User\Cart\ClearCartRequest;
use App\Http\Requests\User\Cart\RemoveItemFromCartRequest;
use App\Http\Requests\User\Cart\SetItemQuantityInCartRequest as SetItemQuantityInCartRequestAlias;
use App\Http\Requests\User\Cart\ViewCartRequest;
use App\Models\User\Cart;
use App\Services\Public\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * @var CartService $cartService
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
     * @return View
     */
    public function viewCartItems(ViewCartRequest $request): View
    {
        return view('cart');
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
     * @param SetItemQuantityInCartRequestAlias $request
     * @return RedirectResponse
     */
    public function setCartItemQuantity(SetItemQuantityInCartRequestAlias $request): RedirectResponse
    {
        $this->cartService->setCartItemQuantity($request->toPopo(), Session::getId());

        return redirect()->back();
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
