<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da web para sua aplicação.
| Essas rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| contém o grupo de middleware "web". Agora crie algo incrível!
|
*/

// Rota para exibir o formulário de login
Route::get('/login', 'LoginController@index')->name('login.index');

// Rota para autenticar o usuário ao fazer login
Route::post('/login', 'LoginController@logIn')->name('login.auth');

// Rota raiz redireciona para a página de login
Route::get('/', function () {
    redirect()->route('login.index');
});

// Rotas relacionadas aos produtos, agrupadas com middleware de autenticação
Route::middleware('authenticate')->prefix('admin')->group(function () {
    // Rota para exibir a lista de produtos
    Route::get('/products/lista', 'ProductController@index')->name('products.list');

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

    // Rota para fazer logout
    Route::get('/logout', 'LoginController@logOut')->name('login.logout');
});
