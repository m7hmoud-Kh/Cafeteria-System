<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserApiController;

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
    Route::post('/user/{id}', [UserApiController::class, 'update']);
    Route::delete('/user/{id}', [UserApiController::class, 'destory']);
});

