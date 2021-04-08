<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('user',[AuthController::class,'user']);
    Route::get('logout',[AuthController::class,'logout']);
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::get('search_product','ProductController@search');
    Route::resource('order', 'OrderController');
    Route::resource('order_detail', 'OrderDetailController');
});

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
});
