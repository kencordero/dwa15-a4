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
Route::get('/home', 'HomeController@index');

if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@showProduct');
Route::get('/products/random', 'ProductController@showRandomProduct');

Route::get('/cart', 'BagController@showCart');
Route::post('/cart', 'BagController@addToCart');
// TODO remove from cart
Route::get('/cart/checkout', 'BagController@checkout');
Route::post('/cart/checkout', 'BagController@placeOrder');

Route::get('/wishlist', 'BagController@showWishlist');
Route::post('/wishlist', 'BagController@addToWishlist');

Route::get('/orders', 'OrderController@index');
Route::get('/orders/{id}', 'OrderController@showOrderDetails');

Auth::routes();
