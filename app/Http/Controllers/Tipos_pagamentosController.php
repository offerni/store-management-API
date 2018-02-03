<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tipo_pagamentoResource;
use App\Tipo_pagamento;
use Illuminate\Support\Facades\DB;

class Tipos_pagamentosController extends Controller
{
    public function find_all() {
        $data = Tipo_pagamento::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhum tipo de pagamento encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_pagamentoResourcee(Tipo_pagamento::all());
        }  
    }

    public function find_one($id) {
        $data = Tipo_pagamento::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Tipo de pagamento não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_pagamentoResourcee(Tipo_pagamento::find($id));
        } 
        
    }

    public function create(Request $req) {
        $dados = $req->all();
        DB::table('tipos_pagamentos')->insert($dados);
        return response('Cadastrado', 200)
        ->header('Content-Type', 'text/plain'); ;
    }
}
