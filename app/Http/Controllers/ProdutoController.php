<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProdutoResource;
use App\Produto;

class ProdutoController extends Controller
{
    public function find() {
        return new ProdutoResource(Produto::all());
    }
}
