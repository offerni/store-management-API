<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EstoqueResource;
use App\Estoque;

class EstoqueController extends Controller
{
    public function find_all() {
        return new EstoqueResource(Estoque::all());
    }

    public function find_one($id) {
        return new EstoqueResource(Estoque::find($id));
    }
}
