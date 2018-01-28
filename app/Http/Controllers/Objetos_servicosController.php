<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Objeto_servicoResource;
use App\Objeto_servico;


class Objetos_servicosController extends Controller
{
    public function find_all() {
        return new Objeto_servicoResource(Objeto_servico::all());
    }
    
    public function find_one($id) {
        return new Objeto_servicoResource(Objeto_servico::find($id));
    }
}
