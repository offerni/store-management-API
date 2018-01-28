<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Venda;

class Tipo_pagamento extends Model
{
    public function vendas() {
        return $this->belongsTo(venda);
    }
}
