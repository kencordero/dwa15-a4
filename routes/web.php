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

Route::get('/', 'WelcomeController');

if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@showProduct')->where(['id' => '[0-9]+']);
Route::get('/products/random', 'ProductController@showRandomProduct');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@addToCart');
Route::delete('/cart', 'CartController@removeFromCart');

Route::get('/orders', 'OrderController@index');
Route::get('/orders/{id}', 'OrderController@showOrderDetails')->where(['id' => '[0-9]+']);
