<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BasketController;
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

Route::get('/', function () {
    return view('front.main');
})->name('main');



Route::get('/cart', [BasketController::class,'index'])->name('cart.index');
Route::get('/cart/get', [App\Http\Controllers\BasketController::class,'getCartItems'])->name('basket.get');
Route::post('/cart/add/', [App\Http\Controllers\BasketController::class,'store'])->name('basket.store');
Route::delete('/cart/delete/{id}', [App\Http\Controllers\BasketController::class,'destroy'])->name('basket.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout.index');
    Route::post('/payment', [CheckoutController::class,'setPayment'])->name('checkout.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
