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
        if (!$data) {
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

        $data = $req->all(); 
        $validator = Validator::make($data, Controller::rules(), Controller::messages());

        if ($validator->fails()) {    

            return response($validator->messages(), 400);

        } else {

            Categoria::create($data);

            return response('Cadastrado', 200)->header('Content-Type', 'application/json');
        }
    }
}
