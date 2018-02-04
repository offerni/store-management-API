<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Objeto_servicoResource;
use App\Objeto_servico;
use Illuminate\Support\Facades\DB;
use Validator;


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
        $data = $req->all(); 
        $messages = [
            'unique' => 'Este :attribute já existe',
            'required' => 'O campo :attribute não pode ser vazio',
            'numeric' => 'O campo :attribute deve ser um número'
            ];

        $rules =  [
            'identificacao' => 'required'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Objeto_servico::create($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }

    public function update(Request $req, $id) {
        $data = $req->all(); 
        $messages = [
            'unique' => 'Este :attribute já existe',
            'required' => 'O campo :attribute não pode ser vazio',
            'required_without' => 'O campo :attribute não pode ser vazio', 
            'numeric' => 'O campo :attribute deve ser um número'
            ];

        $rules =  [
            'identificacao' => 'required_without:descricao'
        ];

        if (!Objeto_servico::find($id)) {
            return response(json_encode(['erro' => 'Objeto de serviço não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else 

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Objeto_servico::find($id)->update($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }
}
