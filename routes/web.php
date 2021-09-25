<?php

use Illuminate\Support\Facades\Route;

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

#main
Route::get('/', 'LayoutsController@index')->name('home');
Route::post('/change-theme', 'LayoutsController@cookie')->name('change.theme');
Route::get('/setcookie', 'LayoutsController@setcookie');
Route::get('/admin', 'LayoutsController@admin')->name('admin.index')->middleware('is_admin');
Route::get('/timeline', 'LayoutsController@timeline')->name('timeline')->middleware('auth');
Route::post('/search', 'LayoutsController@search')->name('search');

#profile
Route::get('/profile/{user}', 'UserController@show')->name('profile')->middleware('auth');
Route::get('/profile/{user}/edit', 'UserController@edit')->middleware('auth');
Route::patch('/profile', 'UserController@update')->name('profile.update')->middleware('auth');

#follow
Route::post('/follow-user', 'FollowController@store')->name('follow')->middleware('auth');
Route::delete('/unfollow-user/{follow}', 'FollowController@destroy')->name('unfollow')->middleware('auth');

#elektronik
Route::get('/elektronik', 'ElektronikController@index')->name('elektronik')->middleware('auth');
Route::get('/product-upload', 'ElektronikController@create')->middleware('auth');
Route::get('/elektronik/{elektronik}', 'ElektronikController@show')->middleware('auth');
Route::post('/product-upload', 'ElektronikController@store')->name('product.upload.post')->middleware('auth');
Route::get('/elektronik/{elektronik}/beli', 'ElektronikController@belishow')->middleware('auth');
Route::patch('/elektronik/{elektronik}/beli-proses', 'ElektronikController@beli')->middleware('auth');

#cart
Route::get('/cart', 'CartController@index')->name('cart')->middleware('auth');
Route::post('/add-to-cart', 'CartController@store')->name('add-to-cart')->middleware('auth');
Route::delete('/{cart}/delete-from-cart', 'CartController@destroy')->name('delete-from-cart')->middleware('auth');

Auth::routes();

