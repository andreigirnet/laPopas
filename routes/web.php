<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
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

Route::get('/service', function(){
    return view('front.service');
})->name('service.index');

Route::get('/contacts', function(){
    return view('front.contacts');
})->name('front.contacts');
Route::get('/delivery', function(){
    return view('front.delivery');
})->name('front.delivery');
Route::get('/product/{key}/{product}', function($product){
    return view('front.product');
})->name('product');

Route::get('/cart', [BasketController::class,'index'])->name('cart.index');
Route::get('/total', [BasketController::class,'cartTotalBefore'])->name('cart.totalForDisc');
Route::get('/cartTotal', [BasketController::class,'cartTotal'])->name('cart.total');
Route::post('/cart/add/', [App\Http\Controllers\BasketController::class,'store'])->name('basket.store');
Route::delete('/cart/delete/{id}', [App\Http\Controllers\BasketController::class,'destroy'])->name('basket.delete');
Route::put('/update-cart', [App\Http\Controllers\BasketController::class,'update'])->name('basket.update');
Route::post('/discount', [App\Http\Controllers\BasketController::class,'applyDiscounts'])->name('basket.discount');


Route::middleware('auth')->group(function () {

    Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout.index');
    Route::post('/payment', [CheckoutController::class,'setPayment']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => 'App\Http\Middleware\IsAdminMiddleware'], function () {
        Route::get('/admin', function(){
            return view('admin.main');
        })->name('admin.index');

        Route::get('/users', [App\Http\Controllers\UsersController::class,'index'])->name('users.index');
        Route::get('/create', [App\Http\Controllers\UsersController::class,'create'])->name('user.create');
        Route::get('/edit/{id}', [App\Http\Controllers\UsersController::class,'edit'])->name('user.edit');
        Route::put('/update/{id}', [App\Http\Controllers\UsersController::class,'update'])->name('user.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\UsersController::class,'destroy'])->name('user.destroy');
        Route::get('/users/search', [App\Http\Controllers\UsersController::class,'search'])->name('user.search');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
        Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search');
    });

    Route::get('/dashboard/', [DashboardController::class, 'ordersIndex'])->name('dash.orders.index');
    Route::get('/dashboard/profile', [DashboardController::class, 'profileIndex'])->name('dash.profile.index');
    Route::put('/dashboard/profile/update/{id}', [DashboardController::class, 'updateProfile'])->name('dash.profile.update');

});

require __DIR__.'/auth.php';
