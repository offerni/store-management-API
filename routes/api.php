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
Route::get('/categoria', ['as' => 'categoria', 'uses' => 'CategoriasController@find_all']);
Route::get('/estoque', ['as' => 'estoque', 'uses' => 'EstoqueController@find_all']);
Route::get('/objeto_servico', ['as' => 'objeto_servico', 'uses' => 'Objetos_servicosController@find_all']);
Route::get('/produto', ['as' => 'produto', 'uses' => 'ProdutosController@find_all']);
Route::get('/tipo_pagamento', ['as' => 'tipo_pagamento', 'uses' => 'Tipos_pagamentosController@find_all']);
Route::get('/tipo_servico', ['as' => 'tipo_servico', 'uses' => 'Tipos_servicosController@find_all']);
Route::get('/venda', ['as' => 'venda', 'uses' => 'VendasController@find_all']);

// rotas find_id
Route::get('/categoria/{id}', ['as' => 'categoria', 'uses' => 'CategoriasController@find_one']);
Route::get('/estoque/{id}', ['as' => 'estoque', 'uses' => 'EstoqueController@find_one']);
Route::get('/objeto_servico/{id}', ['as' => 'objeto_servico', 'uses' => 'Objetos_servicosController@find_one']);
Route::get('/produto/{id}', ['as' => 'produto', 'uses' => 'ProdutosController@find_one']);
Route::get('/tipo_pagamento/{id}', ['as' => 'tipo_pagamento', 'uses' => 'Tipos_pagamentosController@find_one']);
Route::get('/tipo_servico/{id}', ['as' => 'tipo_servico', 'uses' => 'Tipos_servicosController@find_one']);
Route::get('/venda/{id}', ['as' => 'venda', 'uses' => 'VendasController@find_one']);

// rotas create
Route::post('/categoria', ['as' => 'categoria', 'uses' => 'CategoriasController@create']);
Route::post('/estoque', ['as' => 'estoque', 'uses' => 'EstoqueController@create']);
Route::post('/objeto_servico', ['as' => 'objeto_servico', 'uses' => 'Objetos_servicosController@create']);
Route::post('/produto', ['as' => 'produto', 'uses' => 'ProdutosController@create']);
Route::post('/tipo_pagamento', ['as' => 'tipo_pagamento', 'uses' => 'Tipos_pagamentosController@create']);
Route::post('/tipo_servico', ['as' => 'tipo_servico', 'uses' => 'Tipos_servicosController@create']);
Route::post('/venda', ['as' => 'venda', 'uses' => 'VendasController@create']);
