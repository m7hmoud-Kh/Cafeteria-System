<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\MangeAccountController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\CheckOutController;
use App\Http\Controllers\website\CategoryController;
use App\Http\Controllers\website\MyOrderController;

Auth::routes(['verify'=>true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){
    Route::get('/account', [MangeAccountController::class, 'index'])->name('account');
    Route::post('/account/update', [MangeAccountController::class, 'update'])->name('updateAccount');
    Route::post('/account/delete', [MangeAccountController::class, 'destroy'])->name('destroyAccount');
    Route::post('/account/update-image', [MangeAccountController::class, 'updateimage'])->name('updateimage');
    Route::post('/account/change-password', [MangeAccountController::class, 'changepassword'])->name('change-password');

    Route::group(['middleware'=>'empty-cart'],function(){
         /**Route Cart **/
        Route::get('/cart',[CartController::class,'index'])->name('cart');
        /**End Route Cart */

        /**Route Check out */
        Route::get('/check-out',[CheckOutController::class,'index'])->name('check-out');
        Route::post('/confirm-order',[CheckOutController::class,'store'])->name('confirm-order');
        /***End Route Check out */
    });


    //category Route
    Route::get('/category/{id}',[CategoryController::class,'show'])->name('show-category');
    // End category Route
    
    /*** Route my order*/
    Route::get('/my-order', [MyOrderController::class, 'index'])->name('myorder');
    Route::post('/delete-order', [MyOrderController::class, 'destroy'])->name('deleteorder');
    Route::post('/select-date', [MyOrderController::class, 'selectdate'])->name('selectdate');



});

