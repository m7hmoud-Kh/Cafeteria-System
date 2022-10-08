<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserApiController;
use App\Http\Controllers\Api\SuperAdminAuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'admin'], function () {
    Route::get('/user', [UserApiController::class, 'index']);
    Route::post('/user', [UserApiController::class, 'store']);
    Route::put('/user/{id}', [UserApiController::class, 'update']);
    Route::delete('/user/{id}', [UserApiController::class, 'destory']);
});





Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [SuperAdminAuthController::class, 'login']);
    Route::post('/register', [SuperAdminAuthController::class, 'register']);
    Route::post('/logout', [SuperAdminAuthController::class, 'logout']);
    Route::post('/refresh', [SuperAdminAuthController::class, 'refresh']);
    Route::get('/user-profile', [SuperAdminAuthController::class, 'userProfile']);
});


