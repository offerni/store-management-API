<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tipo_pagamentoResource;
use App\Tipo_pagamento;
use Illuminate\Support\Facades\DB;
use Validator;

class Tipos_pagamentosController extends Controller
{
    public function find_all() {
        $data = Tipo_pagamento::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhum tipo de pagamento encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_pagamentoResource(Tipo_pagamento::all());
        }  
    }

    public function find_one($id) {
        $data = Tipo_pagamento::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Tipo de pagamento não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_pagamentoResource(Tipo_pagamento::find($id));
        } 
        
    }

    public function create(Request $req) {
        $data = $req->all(); 
        $messages = [
            'unique' => 'Este :attribute já existe',
            'required' => 'O campo :attribute não pode ser vazio'
            ];

        $rules =  [
            'nome' => 'required|unique:tipos_pagamentos,nome'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Tipo_pagamento::create($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }
}
