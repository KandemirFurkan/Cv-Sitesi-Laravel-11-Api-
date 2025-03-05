<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactController;



Route::group(['prefix' => 'auth', 'as'=>'auth.'], function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register',[UserController::class, 'register']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::post('forgot-password', [UserController::class, 'sendResetLinkEmail']);
    Route::post('reset-password', [UserController::class, 'resetPassword']);


});

Route::get('/about', [AboutController::class, 'index']);
Route::post('/about/update',[AboutController::class, 'update']);


Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/store',[ContactController::class, 'store']);
