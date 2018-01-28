<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\VendaResource;
use App\venda;

class VendasController extends Controller
{
    public function find_all() {
        return new VendaResourcesourcee(vendaa::all());
    }

    public function find_one($id) {
        return new VendaResourcesourcee(vendaa::find($id));
    }
}
