<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EstoqueResource;
use App\Estoque;
use Illuminate\Support\Facades\DB;
use Validator;

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
            return response(json_encode(['erro' => 'Produto não encontrado no estoque']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new EstoqueResource(Estoque::find($id));
        }  
    }

    public function create(Request $req) {
        $data = $req->all(); 
        $messages = [
            'unique' => 'Este :attribute já existe',
            'required' => 'O campo :attribute não pode ser vazio',
            'numeric' => 'O campo :attribute deve ser um número'
            ];

        $rules =  [
            'valor_entrada' => 'required|numeric',
            'valor_saida' => 'required|numeric',
            'quantidade' => 'required|numeric',
            'produto_id' => 'required|numeric'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Estoque::create($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }

    public function update(Request $req, $id) {
        $data = $req->all(); 
        $messages = [
            'unique' => 'Este :attribute já existe',
            'required' => 'O campo :attribute não pode ser vazio',
            'numeric' => 'O campo :attribute deve ser um número'
            ];

        $rules =  [
            'valor_entrada' => 'required_without:valor_saida,quantidade,produto_id|numeric',
            'valor_saida' => 'required_without:valor_entrada|numeric',
            'quantidade' => 'required_without:valor_entrada,valor_saida,produto_id|numeric',
            'produto_id' => 'required_without:valor_entrada,valor_saida,quantidade|numeric'
        ];

        if (!Estoque::find($id) || count($data)==0) {
            return response(json_encode(['erro' => 'Produto não encontrado no estoque']), 404)
            ->header('Content-Type', 'application/json');
        } else

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Estoque::find($id)->update($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }
}
