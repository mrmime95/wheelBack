<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
Route::get('user', 'User\UserController@user');
Route::get('user/{id}', 'User\UserController@userById');
Route::post('user', 'User\UserController@userSave');
Route::put('user/{id}', 'User\UserController@userUpdate');
Route::delete('user/{id}', 'User\UserController@userDelete');
 */

Route::post('auth/register', 'Auth\AuthController@register');
Route::post('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('auth/user', 'Auth\AuthController@getAuthUser');


Route::apiResource('user', 'User\UserController');
Route::apiResource('checkout', 'Checkout\CheckoutController');
Route::apiResource('product', 'Product\ProductController');
