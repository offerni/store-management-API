<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoriaResource;
use App\Categoria;

class CategoriasController extends Controller
{
    public function find_all() {
        return new CategoriaResource(Categoria::all());
    }
    
    public function find_one($id) {
        return new CategoriaResource(Categoria::find($id));
    }
}
