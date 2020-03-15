<?php

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

Route::get('weather', 'WeatherController@getCity' );

Route::get('order/list', 'OrderController@getAll');

Route::get('order/show', 'OrderController@show');
Route::post('order/show', 'OrderController@show');

Route::get('products', 'ProductController@getAllProducts' );
Route::post('products', 'ProductController@savePrice' );
