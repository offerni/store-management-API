<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProdutoResource;
use App\Produto;

class ProdutosController extends Controller
{
    public function find_all() {
        return new ProdutoResource(Produto::all());
    }

    public function find_one($id) {
        return new ProdutoResource(Produto::find($id));
    }
}
