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
// Route::get('/', function () {
//     // return view('frontend.index');
//     $user = App\User::with('products')->get();
//     return $user;
// });

Route::get('/', 'CategoryController@index');

Route::get('/blank', function () {
    return view('frontend.blank');
});

Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::get('/product', function () {
    return view('frontend.product');
});

Route::get('/store', function () {
    return view('frontend.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
