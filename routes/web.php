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
    return redirect('login');
});

Route::get('login', 'UserController@showLoginPage');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');

Route::get('register', 'UserController@showSignUpPage');
Route::post('register', 'UserController@signUp');

Route::get('user/account', 'UserController@showUserAccount')->name('dashboard');
Route::get('account/delete', 'UserController@deleteUserAccount');

Route::get('add_product', 'ProductController@showAddProductPage');
Route::post('add_product', 'ProductController@addProduct');

Route::get('edit_product/{id}', 'ProductController@showEditProductPage');
Route::post('update_product/{id}', 'ProductController@updateProduct')->name('update_product');

Route::get('products/list', 'ProductController@showUserProducts')->name('products');
Route::get('delete_product/{id}', 'ProductController@deleteProduct');