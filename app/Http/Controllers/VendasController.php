<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\VendaResource;
use App\venda;
use Illuminate\Support\Facades\DB;

class VendasController extends Controller
{
    public function find_all() {
        $data = Venda::all();
        
        if (count($data)==0) {
            return response(json_encode(['erro' => 'Nenhuma venda encontrada']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new VendaResourcesourcee(vendaa::all());
        }  
        
    }

    public function find_one($id) {
        $data = Venda::find($id);
        
        if (!$data) {
            return response(json_encode(['erro' => 'Venda não encontrada']), 404)
            ->header('Content-Type', 'application/json');

        } else {
            return new VendaResourcesourcee(vendaa::find($id));
        }  
    }

    public function create(Request $req) {
        $dados = $req->all();
        DB::table('vendas')->insert($dados);
        return response('Cadastrado', 200)
        ->header('Content-Type', 'text/plain'); ;
    }
}
