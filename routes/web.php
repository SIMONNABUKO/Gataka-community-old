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


Route::get('/search', 'ItemsController@search');

Route::get('items.featured', 'ItemsController@featured');
Route::get('/', 'ItemsController@index');
Route::get('create', 'ItemsController@create');
Route::post('create', 'ItemsController@store');
Route::patch('edit/{id}', 'ItemsController@update');
Route::get('edit/{id}', 'ItemsController@edit');
Route::get('show/{id}', 'ItemsController@show');
Route::delete('delete/{id}', 'ItemsController@delete');

// Categories routes
Route::get('categories/index', 'CategoriesController@index');
Route::get('categories/create', 'CategoriesController@create');
Route::post('categories/create', 'CategoriesController@store');
Route::patch('categories/edit/{id}', 'CategoriesController@update');
Route::get('categories/show/{id}', 'CategoriesController@show');
Route::delete('categories/delete/{id}', 'CategoriesController@delete');
Route::get('categories/edit/{id}', 'CategoriesController@edit');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
