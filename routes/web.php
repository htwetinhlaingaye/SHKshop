<?php

use Illuminate\Support\Facades\Route;
Route::get('/',[App\Http\Controllers\FrontController::class, 'shop'])->name('shop');
Route::get('/shop-item/{id}',[App\Http\Controllers\FrontController::class, 'shopItem'])->name('shop-item');

Route::get('carts',[App\Http\Controllers\FrontController::class,'carts'])->name('carts');

Route::post('order-now',[App\Http\Controllers\FrontController::class,'orderNow'])->name('orderNow');
Route::group(['middleware'=>['auth','role:Super Admin|Admin'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('items',App\Http\Controllers\Admin\ItemController::class);
    // Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('payments',App\Http\Controllers\Admin\PaymentController::class);
    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class, 'orders'])->name('orders');
    Route::get('orderAccept',[App\Http\Controllers\Admin\OrderController::class, 'orderAccept'])->name('orderAccept');
    Route::get('orderComplete',[App\Http\Controllers\Admin\OrderController::class, 'orderComplete'])->name('orderComplete');
    Route::get('orders/{voucher}',[App\Http\Controllers\Admin\OrderController::class, 'orderDetail'])->name('orders.detail');
    Route::put('orders/{voucher}',[App\Http\Controllers\Admin\OrderController::class,'status'])->name('orders.status');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
