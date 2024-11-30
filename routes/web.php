<?php

//use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\OrderController;
//use App\Http\Controllers\UserController;

//Route::get('/categories', [CategoryController::class, 'index']);
//Route::post('/categories', [CategoryController::class, 'store']);
//Route::get('/categories/{id}', [CategoryController::class, 'show']);
//Route::put('/categories/{id}', [CategoryController::class, 'update']);
//Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

//Route::get('/orders', [OrderController::class, 'index']);
//Route::post('/orders', [OrderController::class, 'store']);
//Route::get('/orders/{id}', [OrderController::class, 'show']);
//Route::put('/orders/{id}', [OrderController::class, 'update']);
//Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

//Route::get('/users', [UserController::class, 'index']);
//Route::post('/users', [UserController::class, 'store']);
//Route::get('/users/{id}', [UserController::class, 'show']);
//Route::put('/users/{id}', [UserController::class, 'update']);
//Route::delete('/users/{id}', [UserController::class, 'destroy']);
