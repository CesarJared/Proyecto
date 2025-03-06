<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\UploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){return view('admin.index');});

Route::get('/admin/uploads', [UploadController::class,'uploadInfo']);
Route::post('/admin/uploads/add', [UploadController::class,'insertInfo']);
Route::post('/admin/uploads/edit/{id}', [UploadController::class,'editInfo']);
Route::get('/admin/uploads/delete/{id}', [UploadController::class,'deleteInfo']);

Route::get('/admin/labels', [LabelController::class, 'labelInfo']);
Route::post('/admin/labels/add', [LabelController::class, 'insertInfo']);
Route::post('/admin/labels/edit/{id}', [LabelController::class, 'editInfo']);
Route::get('/admin/labels/delete/{id}', [LabelController::class, 'deleteInfo']);

Route::get('/admin/sales', [SaleController::class, 'saleInfo']);
Route::post('/admin/sales/add', [SaleController::class, 'insertInfo']);
Route::post('/admin/sales/edit/{id}', [SaleController::class, 'editInfo']);
Route::get('/admin/sales/delete/{id}', [SaleController::class, 'deleteInfo']);

Route::get('/admin/users', [UserController::class, 'userInfo']);

Route::get('/send-email', [UserController::class, 'sendEmail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
