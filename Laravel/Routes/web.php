<?php

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

// Getting all products
Route::get('products', [App\Http\Controllers\ProductController::class, 'get_products']);

// Getting product add page
Route::get('product/add', [App\Http\Controllers\ProductController::class, 'get_add_product']);

// Posting product data to database
Route::post('product/add', [App\Http\Controllers\ProductController::class, 'post_add_product']);
