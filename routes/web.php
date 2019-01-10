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

Route::get('/', 'FrontendController@index')->name('index');

// Route::get('/blank', function () {
//     return view('frontend.blank');
// });

// Route::get('/checkout', function () {
//     return view('frontend.checkout');
// });

// Route::get('/product', function () {
//     return view('frontend.product');
// });
Route::get('/product/{id}', 'FrontendController@show')->name('product');

Route::get('search', 'FrontendController@getSearch')->name('search');
//Shopping cart
Route::get('cart/{id}/{name}', 'FrontendController@getAddToCart')->name('cart');
Route::get('shopping-cart', 'FrontendController@getCart')->name('shopcart');


Route::get('category/{cate?}', 'FrontendController@store')->name('store');

Route::get('register', 'chkLoginController@getRegister')->name('getRegister');
Route::post('register', 'chkLoginController@postRegister')->name('postRegister');

Route::get('login', 'chkLoginController@getLogin')->name('getLogin');
Route::post('login', 'chkLoginController@postLogin')->name('postLogin');

Route::post('logout', 'chkLoginController@getLogout')->name('logout');

Route::get('admin', 'DashBoardController@index')->name('admin')->middleware('checkAdminLogin');

// route admin/user
Route::get('admin/user', 'UserController@index')->name('user.index')->middleware('checkAdminLogin');
Route::get('admin/user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('checkAdminLogin');
Route::put('admin/user/{id}/edit', 'UserController@update')->name('user.update')->middleware('checkAdminLogin');
Route::delete('admin/user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('checkAdminLogin');
Route::post('admin/user', 'UserController@store')->name('user.store')->middleware('checkAdminLogin');

// route admin/order
Route::get('admin/order', 'OrderController@index')->name('order.index')->middleware('checkAdminLogin');
Route::get('admin/order/{id}', 'OrderController@show')->where('id', '[0-9]+')->name('order.show')->middleware('checkAdminLogin');
Route::put('admin/order/{id}', 'OrderController@edit')->where('id', '[0-9]+')->name('order.edit')->middleware('checkAdminLogin');
Route::delete('admin/order/{id}', 'OrderController@destroy')->where('id', '[0-9]+')->name('order.destroy')->middleware('checkAdminLogin');
Route::get('admin/order/sort_by={sort_by}', 'OrderController@sortBy')->name('order.sortBy')->middleware('checkAdminLogin');

// route admin/category
Route::get('admin/category', 'CategoryController@index')->name('category.index')->middleware('checkAdminLogin');
Route::get('admin/category/{id}', 'CategoryController@show')->name('category.show')->middleware('checkAdminLogin');
Route::post('admin/category', 'CategoryController@store')->name('category.store')->middleware('checkAdminLogin');
Route::delete('admin/category/{id}', 'CategoryController@destroy')->name('category.destroy')->middleware('checkAdminLogin');
Route::put('admin/category/{id}', 'CategoryController@update')->name('category.update')->middleware('checkAdminLogin');

// route admin/product
Route::get('admin/product', 'ProductController@index')->name('product.index')->middleware('checkAdminLogin');
Route::get('admin/product/sort_by={sort_by}', 'ProductController@sortBy')->name('product.sortBy')->middleware('checkAdminLogin');
Route::get('admin/product/{id}', 'ProductController@edit')->name('product.edit')->middleware('checkAdminLogin');
Route::post('admin/product', 'ProductController@store')->name('product.store')->middleware('checkAdminLogin');
Route::delete('admin/product/{id}', 'ProductController@destroy')->name('product.destroy')->middleware('checkAdminLogin');
Route::put('admin/product/{id}', 'ProductController@update')->name('product.update')->middleware('checkAdminLogin');
Route::put('admin/product/delimg/{id}', 'ProductController@delImage')->name('product.delImage')->middleware('checkAdminLogin');

//route admin/comment
Route::get('admin/comment', 'CommentRatingController@index')->name('comment.index')->middleware('checkAdminLogin');
Route::get('admin/comment/{id}', 'CommentRatingController@show')->name('comment.show')->middleware('checkAdminLogin');
Route::put('admin/comment/{id}', 'CommentRatingController@update')->name('comment.update')->middleware('checkAdminLogin');
