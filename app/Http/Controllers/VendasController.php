<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\VendaResource;
use App\venda;
use Illuminate\Support\Facades\DB;
use Validator;

class VendasController extends Controller
{
    public function find_all() {
        $data = Venda::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhuma venda encontrada']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new VendaResource(Venda::all());
        }  
        
    }

    public function find_one($id) {
        $data = Venda::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Venda não encontrada']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new VendaResource(Venda::find($id));
        }  
    }

    public function create(Request $req) {
        $data = $req->all(); 
        $messages = [
            'required' => 'O campo :attribute não pode ser vazio',
            'numeric' => 'O campo :attribute deve ser um número'
            ];

        $rules =  [
            'tipo_pagamento_id' => 'required',
            'valor' => 'numeric',
            'produto_id' => 'required',
            'tipo_servico_id' => 'required'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Venda::create($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }
}
