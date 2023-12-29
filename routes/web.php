<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// user
Route::get('/user/list', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/view/{id}', [UserController::class, 'viewUser']);
Route::get('/user/edit/{id}', [UserController::class, 'editUser']);
Route::post('/user/update/{id}', [UserController::class, 'updateUser']);
Route::get('/user/delete/{id}', [UserController::class, 'userDelete']);

// Supplier
Route::resource('suppliers', SupplierController::class);

Route::get('{view}', ApplicationController::class)->where('view', '(.*)');
