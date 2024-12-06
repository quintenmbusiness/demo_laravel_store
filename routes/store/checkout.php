<?php

use App\Http\Controllers\Public\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'process'])->name('checkout.process');
