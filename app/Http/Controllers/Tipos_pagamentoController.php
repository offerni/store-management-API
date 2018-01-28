<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tipo_pagamentoResource;
use App\Tipo_pagamento;

class Tipo_pagamentoController extends Controller
{
    public function find_all() {
        return new Tipo_pagamentoResourcee(Tipo_pagamento::all());
    }

    public function find_one($id) {
        return new Tipo_pagamentoResourcee(Tipo_pagamento::find($id));
    }
}
