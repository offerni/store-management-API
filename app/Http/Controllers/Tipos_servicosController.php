<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tipo_servicoResource;
use App\Tipo_servico;

class Tipos_servicosController extends Controller
{
    public function find_all() {
        return new Tipo_servicoResourcee(Tipo_servico::all());
    }

    public function find_one($id) {
        return new Tipo_servicoResourcee(Tipo_servico::find($id));
    }
}
