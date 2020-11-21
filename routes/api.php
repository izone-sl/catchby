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

Route::group([ 'prefix' => 'auth' ], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([ 'middleware' => 'auth:api' ], function() {
        Route::get('logout', 'AuthController@logout');
        // Route::get('user', 'AuthController@user');
    });
});

Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout')->middleware('auth:api');
Route::get('user', 'AuthController@user')->middleware('auth:api');

// Category
Route::get('category', 'CategoryController@index');
Route::post('category', 'CategoryController@store') ->middleware('auth:api');
Route::put('category/{id}', 'CategoryController@update') ->middleware('auth:api');
Route::delete('category/{id}', 'CategoryController@destroy') ->middleware('auth:api');

// Product
Route::get('product', 'ProductController@index');
Route::post('product', 'ProductController@store')->middleware('auth:api');
Route::put('product/{id}', 'ProductController@update')->middleware('auth:api');
Route::delete('product/{id}', 'ProductController@destroy')->middleware('auth:api');

// Orders
Route::get('order', 'OrderController@index');
Route::post('order', 'OrderController@store');
Route::put('order/{id}', 'OrderController@update')->middleware('auth:api');
Route::delete('order/{id}', 'OrderController@destroy')->middleware('auth:api');

// Customer
Route::get('customer', 'CustomersController@index')->middleware('auth:api');
Route::post('customer', 'CustomersController@store');

// adsConfig
Route::get('adsconfig', 'AdsConfigController@index');
Route::post('adsconfig', 'AdsConfigController@store')->middleware('auth:api');
Route::put('adsconfig/{id}', 'AdsConfigController@update')->middleware('auth:api');
Route::delete('adsconfig/{id}', 'AdsConfigController@destroy')->middleware('auth:api');

// settings
Route::get('settings', 'SettingsController@index');
Route::post('settings', 'SettingsController@store')->middleware('auth:api');
Route::put('settings/{id}', 'SettingsController@update')->middleware('auth:api');


