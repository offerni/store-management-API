<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Objeto_servicoResource;
use App\Objeto_servico;
use Illuminate\Support\Facades\DB;


class Objetos_servicosController extends Controller
{
    public function find_all() {
        $data = Objeto_servico::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhum objeto de serviço encontrado']), 404)
            ->header('Content-Type', 'application/json');
        } else {
            return new Objeto_servicoResource(Objeto_servico::all());
        }  
    }
    
    public function find_one($id) {
        $data = Objeto_servico::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Objeto de serviço não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Objeto_servicoResource(Objeto_servico::find($id));
        }   
    }

    public function create(Request $req) {
        $dados = $req->all();
        DB::table('objetos_servicos')->insert($dados);
        return response('Cadastrado', 200)
        ->header('Content-Type', 'text/plain'); ;
    }
}
