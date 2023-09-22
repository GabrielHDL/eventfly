<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events', [EventsController::class, 'index'])->name('events.index');

Route::get('/events/{event}', [EventsController::class, 'show'])->name('events.show');

Route::get('/events/category/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['auth'])->group(function() {
    Route::get('/cart', ShoppingCart::class)->name('shopping-cart');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/payment', PaymentOrder::class)->name('orders.payment');
    Route::get('/billing', [BillingController::class, 'index'])->name('billings.index');
});

