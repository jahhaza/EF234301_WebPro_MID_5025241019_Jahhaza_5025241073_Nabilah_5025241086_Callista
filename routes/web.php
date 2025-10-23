<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ConcertController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [OrderController::class, 'create'])->name('orders.create');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/concerts', [ConcertController::class, 'index'])->name('concerts.index');