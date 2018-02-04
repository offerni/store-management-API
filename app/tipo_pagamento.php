<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Venda;

class Tipo_pagamento extends Model
{
    protected $fillable = ['nome'];
    protected $table = 'tipos_pagamentos';
    public function vendas() {
        return $this->belongsTo(venda);
    }
}
