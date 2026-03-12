<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Paparan utama (Halaman landing)
Route::get('/', function () {
    return view('home');
});

Route::get('/', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privasi', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terma', [PageController::class, 'terms'])->name('terms');
Route::get('/pemulangan', [PageController::class, 'returns'])->name('returns');