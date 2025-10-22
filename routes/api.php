<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\CategoryController;



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
Route::post('/contact/mail/send',[ContactController::class, 'mailSend']);

Route::get('/careers', [CareerController::class, 'index']);
Route::post('/career/store',[CareerController::class, 'store']);
Route::post('/career/{id}/update',[CareerController::class, 'update']);

Route::get('/tags', [TagController::class, 'index']);
Route::post('/tags/store',[TagController::class, 'store']);
Route::post('/tags/{id}/update',[TagController::class, 'update']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/category/store',[CategoryController::class, 'store']);
Route::post('/category/{id}/update',[CategoryController::class, 'update']);