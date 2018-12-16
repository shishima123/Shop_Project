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

Route::get('/', 'CategoryController@index')->name('index');

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

Route::get('register', 'chkLoginController@getRegister')->name('getRegister');
Route::post('register', 'chkLoginController@postRegister')->name('postRegister');

Route::get('login', 'chkLoginController@getLogin')->name('getLogin');
Route::post('login', 'chkLoginController@postLogin')->name('postLogin');

Route::post('logout', 'chkLoginController@getLogout')->name('logout');

Route::get('admin', 'DashBoardController@index')->name('admin')->middleware('checkAdminLogin');

Route::get('admin/user', 'UserController@index')->name('user.index')->middleware('checkAdminLogin');

Route::get('admin/user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('checkAdminLogin');
Route::put('admin/user/{id}/edit', 'UserController@update')->name('user.update')->middleware('checkAdminLogin');

Route::delete('admin/user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('checkAdminLogin');

Route::post('admin/user', 'UserController@store')->name('user.store')->middleware('checkAdminLogin');

Route::get('admin/order', 'OrderController@index')->name('order.index')->middleware('checkAdminLogin');

Route::get('admin/order/{id}', 'OrderController@show')->name('order.show')->middleware('checkAdminLogin');
