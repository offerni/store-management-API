<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tipo_servicoResource;
use App\Tipo_servico;
use Illuminate\Support\Facades\DB;
use Validator;

class Tipos_servicosController extends Controller
{
    public function find_all() {
        $data = Tipo_servico::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhum tipo de serviço encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_servicoResource(Tipo_servico::all());
        }  
    }

    public function find_one($id) {
        $data = Tipo_servico::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Tipo de serviço não encontrado']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new Tipo_servicoResource(Tipo_servico::find($id));
        } 
        
    }

    public function create(Request $req) {
        $data = $req->all(); 
        $messages = [
            'required' => 'O campo :attribute não pode ser vazio'
            ];

        $rules =  [
            'nome' => 'required'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Tipo_servico::create($data);
            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }
}
