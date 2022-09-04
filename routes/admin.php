<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrderManualController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\UsersOrderController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::group(['middleware'=>['auth','isadmin']],function(){
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('products',ProductController::class);
    Route::resource('products',ProductController::class);

    Route::get('/userorders', [UsersOrderController::class, 'index'])->name('userorders');
    Route::post('/change-status', [UsersOrderController::class, 'update'])->name('changestatus');
    Route::post('/select-orders', [UsersOrderController::class, 'select'])->name('selectorders');



    /**Route OrderManual*/
    Route::get('/make-order',[OrderManualController::class,'index'])->name('make-order');
    Route::post('/user-id-cart',[OrderManualController::class,'store_user_id'])->name('user-cart');
    Route::get('/shopping',[OrderManualController::class,'shopping_cart'])->name('shopping-cart');
    Route::get('/checkout_details',[OrderManualController::class,'checkout_details'])->name('checkout-details');

    Route::post('/place_order',[OrderManualController::class,'place_order'])->name('place_order');
    /**Route End OrderManual */


    /***Route Orders */
    Route::get('/orders',[OrderController::class,'index'])->name('orders');
    /**Route End Orders */

});


