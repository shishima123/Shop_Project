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
Route::get('/product', function () {
    return view('frontend.product');
});
Route::get('/index', function () {
    return view('frontend.index');
});

Route::get('/about-us', function () {
    return view('frontend.about-us');
});
Route::get('/best-deal', function () {
    return view('frontend.best-deal');
});
Route::get('/cart', function () {
    return view('frontend.cart');
});
Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/login', function () {
    return view('frontend.login');
});
Route::get('/register', function () {
    return view('frontend.register');
});
Route::get('/shop-grid', function () {
    return view('frontend.shop-grid');
});
Route::get('/single-product', function () {
    return view('frontend.single-product');
});
Route::get('/store', function () {
    return view('frontend.store');
});
Route::get('/terms-conditions', function () {
    return view('frontend.terms-conditions');
});
Route::get('/wishlist', function () {
    return view('frontend.wishlist');
});
Route::get('/faq', function () {
    return view('frontend.faq');
});

Route::get('/feature', function () {
    return view('frontend.feature');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
