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

Route::get('/', 'CustomerController@index')->name('customer.index');
Route::get('/topView', 'CustomerController@showByView')->name('customer.show.view');
Route::get('/topLike', 'CustomerController@showByLike')->name('customer.show.like');
Route::get('{id}/view', 'CustomerController@view')->name('customer.view');
Route::get('/search', 'CustomerController@search')->name('customer.search');
