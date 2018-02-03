<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Venda;

class Tipo_pagamento extends Model
{
    protected $table = 'tipos_pagamentos';
    public function vendas() {
        return $this->belongsTo(venda);
    }
}
