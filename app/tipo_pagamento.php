<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\venda;

class tipo_pagamento extends Model
{
    public function vendas() {
        return $this->belongsTo(venda);
    }
}
