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
Route::prefix('admin')->group(function () {
    Route::get('/', 'ProductController@index')->name('products.list');
    Route::get('/produto', 'ProductController@create')->name('product.new');
    Route::get('/produto/{id}', 'ProductController@show')->name('product.details');
    Route::get('/produto/editar/{id}', 'ProductController@edit')->name('product.edit');
    Route::put('/produto/{id}', 'ProductController@update')->name('product.update');
    Route::post('/produto', 'ProductController@store')->name('product.store');
    Route::delete('/produto/{id}', 'ProductController@destroy')->name('product.delete');
});



