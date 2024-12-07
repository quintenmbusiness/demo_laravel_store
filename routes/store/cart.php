<?php

use App\Http\Controllers\Public\CartController;
use Illuminate\Support\Facades\Route;


Route::prefix('/cart')->group(function () {
    Route::get('/', [CartController::class, 'viewCartItems'])->name('cart.view');
    Route::get('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/add', [CartController::class, 'addCartItem'])->name('cart.add');
    Route::post('/set', [CartController::class, 'setCartItemQuantity'])->name('cart.set');
    Route::post('/remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
});
