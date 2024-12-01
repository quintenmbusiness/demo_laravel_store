<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');;
Route::get('/profile/orders', [ProfileController::class, 'index'])->name('profile.orders')->middleware('auth');;
Route::get('/settings', [ProfileController::class, 'settings'])->name('settings')->middleware('auth');;

