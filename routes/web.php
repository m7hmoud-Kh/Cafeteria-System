<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangeAccountController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\CheckOutController;

Auth::routes(['verify'=>true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){
    Route::get('/account', [MangeAccountController::class, 'index'])->name('account');
    Route::post('/account/update', [MangeAccountController::class, 'update'])->name('updateAccount');
    Route::post('/account/delete', [MangeAccountController::class, 'destroy'])->name('destroyAccount');

    Route::group(['middleware'=>'empty-cart'],function(){
         /**Route Cart **/
        Route::get('/cart',[CartController::class,'index'])->name('cart');
        /**End Route Cart */


        /**Route Check out */
        Route::get('/check-out',[CheckOutController::class,'index'])->name('check-out');

        Route::post('/confirm-order',[CheckOutController::class,'store'])->name('confirm-order');
        /***End Route Check out */

    });

});
