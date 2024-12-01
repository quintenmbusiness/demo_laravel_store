<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create'); // Show create form
    Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');  // Store new user
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');  // Show edit form
    Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update'); // Update user
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete'); // Delete user
});
