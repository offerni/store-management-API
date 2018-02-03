<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EstoqueResource;
use App\Estoque;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    public function find_all() {
        $data = Estoque::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Não existem produtos no estoque']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new EstoqueResource(Estoque::all());
        }   
    }

    public function find_one($id) {
        $data = Estoque::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Nenhum produto encontrado no estoque']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new EstoqueResource(Estoque::find($id));
        }  
    }

    public function create(Request $req) {
        $dados = $req->all();
        DB::table('estoque')->insert($dados);
        return response('Cadastrado', 200)
        ->header('Content-Type', 'text/plain'); ;
    }
}
