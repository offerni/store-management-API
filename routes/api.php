<?php

use Illuminate\Http\Request;
use App\Http\Resources\ProdutoResource;
use App\Produto;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas find_all
Route::get('/categorias', ['as' => 'categorias', 'uses' => 'CategoriasController@find_all']);
Route::get('/estoque', ['as' => 'estoque', 'uses' => 'EstoqueController@find_all']);
Route::get('/objetos_servicos', ['as' => 'objetos_servicos', 'uses' => 'Objetos_servicosController@find_all']);
Route::get('/produtos', ['as' => 'produtos', 'uses' => 'ProdutosController@find_all']);
Route::get('/tipos_pagamentos', ['as' => 'tipos_pagamentos', 'uses' => 'Tipos_pagamentosController@find_all']);
Route::get('/tipos_servicos', ['as' => 'tipos_servicos', 'uses' => 'Tipos_servicosController@find_all']);
Route::get('/vendas', ['as' => 'vendas', 'uses' => 'VendasController@find_all']);

// rotas find_id
Route::get('/categorias/{id}', ['as' => 'categorias', 'uses' => 'CategoriasController@find_one']);
Route::get('/estoque/{id}', ['as' => 'estoque', 'uses' => 'EstoqueController@find_one']);
Route::get('/objetos_servicos/{id}', ['as' => 'objetos_servicos', 'uses' => 'Objetos_servicosController@find_one']);
Route::get('/produtos/{id}', ['as' => 'produtos', 'uses' => 'ProdutosController@find_one']);
Route::get('/tipos_pagamentos/{id}', ['as' => 'tipos_pagamentos', 'uses' => 'Tipos_pagamentosController@find_one']);
Route::get('/tipos_servicos/{id}', ['as' => 'tipos_servicos', 'uses' => 'Tipos_servicosController@find_one']);
Route::get('/vendas/{id}', ['as' => 'vendas', 'uses' => 'VendasController@find_one']);