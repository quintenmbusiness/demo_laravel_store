<?php

use App\Http\Controllers\Admin\AdminOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/orders')->group(function () {
    Route::get('/', [AdminOrderController::class, 'orders'])->name('admin.orders.index');
    Route::get('/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/create', [AdminOrderController::class, 'create'])->name('admin.orders.create');
    Route::post('/create', [AdminOrderController::class, 'store'])->name('admin.orders.store');
    Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/update/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/delete/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.delete');
});
