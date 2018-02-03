<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tipo_servicoResource;
use App\Tipo_servico;
use Illuminate\Support\Facades\DB;

class Tipos_servicosController extends Controller
{
    public function find_all() {
        $data = Tipo_servico::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhum tipo de serviço encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_servicoResourcee(Tipo_servico::all());
        }  
    }

    public function find_one($id) {
        $data = Tipo_servico::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Tipo de serviço não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_servicoResourcee(Tipo_servico::find($id));
        } 
        
    }

    public function create(Request $req) {
        $dados = $req->all();
        DB::table('tipos_servicos')->insert($dados);
        return response('Cadastrado', 200)
        ->header('Content-Type', 'text/plain'); ;
    }
}
