<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;

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


Route::get('/',[LoginController::class,'index']);
Route::get('/register',[LoginController::class,'register']);
Route::post('/checklogin',[LoginController::class,'checklogin']);
Route::post('/store',[UserController::class,'store']);
Route::get('/admin',[UserController::class,'admin']);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/customer',[UserController::class,'customer']);
Route::get('/placeorder',[UserController::class,'placeorder']);
Route::get('/order/{id}',[ProductController::class,'order'])->name('order');
Route::get('/employee',[UserController::class,'employee']);
Route::get('/emporders',[OrderController::class,'showall']);

Route::resource('products', ProductController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('orders', OrderController::class);

Route::get('/reset',[EmployeeController::class,'reset']);
Route::post('/restore',[EmployeeController::class,'restore']);
Route::get('/myorder',[UserController::class,'myorder']);
Route::get('/delivered/{id}',[OrderController::class,'delivered'])->name('delivery');
Route::get('/cancel/{id}',[OrderController::class,'cancel'])->name('cancel');

