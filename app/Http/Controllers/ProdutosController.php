<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProdutoResource;
use App\Produto;
use Illuminate\Support\Facades\DB;


class ProdutosController extends Controller
{
    public function find_all() {
        $data = Produto::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhum produto encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new ProdutoResource(Produto::all());
        }     
    }

    public function find_one($id) {
        $data = Produto::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Produto não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new ProdutoResource(Produto::find($id));
        }  
    }

    public function create(Request $req) {
        $dados = $req->all();
        DB::table('produtos')->insert($dados);
        return response('Cadastrado', 200)
        ->header('Content-Type', 'text/plain'); ;
    }
}
