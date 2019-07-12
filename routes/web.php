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
Route::get('/filter','CustomerController@filterByCategory')->name('customer.filterByCategory');

Route::group(['prefix' => 'category'], function () {
    Route::get('/','CategoryController@index')->name('category.index');
    Route::get('/create','CategoryController@create')->name('category.create');
    Route::post('/store','CategoryController@store')->name('category.store');
    Route::get('{id}/edit','CategoryController@edit')->name('category.edit');
    Route::post('{id}/update','CategoryController@update')->name('category.update');
    Route::get('{id}/destroy','CategoryController@destroy')->name('category.destroy');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('{id}/view', 'AdminController@view')->name('admin.view');
    Route::get('/create','AdminController@create')->name('admin.create');
    Route::post('/store','AdminController@store')->name('admin.store');
    Route::get('{id}/edit','AdminController@edit')->name('admin.edit');
    Route::post('{id}/update','AdminController@update')->name('admin.update');
    Route::get('{id}/destroy','AdminController@destroy')->name('admin.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
