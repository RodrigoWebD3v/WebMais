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

//login
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@logIn')->name('login.auth');

//product
Route::middleware('authenticate')->prefix('admin')->group(function () {
    // Rota para exibir a lista de produtos
    Route::get('/', 'ProductController@index')->name('products.list');

    // Rota para exibir o formulário de criação de um novo produto
    Route::get('/produto', 'ProductController@create')->name('product.new');

    // Rota para exibir os detalhes de um produto específico
    Route::get('/produto/{id}', 'ProductController@show')->name('product.details');

    // Rota para exibir o formulário de edição de um produto específico
    Route::get('/produto/editar/{id}', 'ProductController@edit')->name('product.edit');

    // Rota para atualizar os dados de um produto específico
    Route::put('/produto/{id}', 'ProductController@update')->name('product.update');

    // Rota para armazenar um novo produto criado
    Route::post('/produto', 'ProductController@store')->name('product.store');

    // Rota para excluir um produto específico
    Route::delete('/produto/{id}', 'ProductController@destroy')->name('product.delete');

    Route::get('/logout', 'LoginController@logOut')->name('login.logout');
});



