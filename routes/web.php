<?php

use App\Http\Controllers\CustommerController;
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



Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
Route::get('search_product','ProductController@search');
Route::get('product_by_category/{id}','ProductController@getProductByCategory');
