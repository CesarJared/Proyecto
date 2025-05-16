<?php

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('products',ProductsController::class);
Route::resource('users',UsersController::class);
Route::resource('index',IndexController::class);

//localhost:8000/api/login => POST {"email":"","password":""}
Route::post('/login', [AuthController::class, 'login']);