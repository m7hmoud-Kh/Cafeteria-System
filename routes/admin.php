<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;

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
});

