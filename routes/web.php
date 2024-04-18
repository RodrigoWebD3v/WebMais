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
//product
Route::get('/', 'ProductController@index')->name('products.list');
Route::get('/produto', 'ProductController@create')->name('products.new');
Route::get('/produto/{id}', 'ProductController@show')->name('products.details');
Route::get('/produto/editar/{id}', 'ProductController@edit')->name('products.edit');
Route::put('/produto/{id}', 'ProductController@update')->name('products.update');
Route::post('/produto', 'ProductController@store')->name('products.store');
Route::delete('/produto/{id}', 'ProductController@destroy')->name('product.delete');




