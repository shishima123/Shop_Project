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

Route::get('register', 'UserController@store')->name('register');

Route::get('login', 'chkLoginController@getLogin')->name('login');
Route::post('login', 'chkLoginController@postLogin');

Route::post('logout', 'chkLoginController@getLogout')->name('logout');

Route::get('admin', function () {
    return view('templates.Admin.master');
})->name('admin')->middleware('checkAdminLogin');

Route::get('admin/user', 'UserController@show')->name('user.index');
