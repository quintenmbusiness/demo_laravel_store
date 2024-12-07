<?php

use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/users')->group(function () {
    Route::get('/', [AdminUserController::class, 'users'])->name('admin.users');
    Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/create', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
});
