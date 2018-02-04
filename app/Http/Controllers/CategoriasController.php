<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoriaResource;
use App\Categoria;
use Validator;
use Illuminate\Http\JsonResponse;


class CategoriasController extends Controller
{
    public function find_all() {
        $data = Categoria::all();
        if (count($data) == 0) {
            return response(json_encode(['erro' => 'Nenhuma categoria encontrada']), 404)
            ->header('Content-Type', 'application/json');
        } else {
            return new CategoriaResource(Categoria::all());
        }   
    }

    public function find_one($id) {
        $data = Categoria::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Categoria não encontrada']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new CategoriaResource(Categoria::find($id));
        } 
    }

    public function create(Request $req) {
       
        $messages = [
            'unique' => 'Este :attribute já existe'
            ];

        $rules =  [
                'nome' => 'required|unique:categorias,nome',
            ];
        

        $data = $req->all(); 
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Categoria::create($data);

            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }

    public function update(Request $req, $id) {
        $data = $req->all(); 
        $messages = [
            'unique' => 'Este :attribute já existe',
            'required' => 'O campo :attribute não pode ser vazio',
            'required_without' => 'O campo :attribute não pode ser vazio'
            
            ];

        $rules =  [
                'nome' => 'required_without:descricao|unique:categorias,nome',
                
            ];

        if (!Categoria::find($id)) {
            return response(json_encode(['erro' => 'Nenhuma categoria encontrada']), 404)
            ->header('Content-Type', 'application/json');
        } else

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Categoria::find($id)->update($data);
            return response('Atualizado', 200)->header('Content-Type', 'application/json');
        }
    }
}
