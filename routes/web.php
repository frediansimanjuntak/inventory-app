<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductLocationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::resource('product_categories', ProductCategoryController::class);
Route::resource('product_locations', ProductLocationController::class);
Route::resource('products', ProductController::class);
Route::resource('product_transactions', ProductTransactionController::class);
