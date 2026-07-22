<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockMovementController;
use Illuminate\Support\Facades\Route;

// Ana Sayfa (Giriş yapmış kullanıcılar erişebilir)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});