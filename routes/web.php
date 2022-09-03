<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify'=>true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/account', [App\Http\Controllers\MangeAccountController::class, 'index'])->name('account');
Route::post('/account/update', [App\Http\Controllers\MangeAccountController::class, 'update'])->name('updateAccount');
Route::post('/account/delete', [App\Http\Controllers\MangeAccountController::class, 'destroy'])->name('destroyAccount');





