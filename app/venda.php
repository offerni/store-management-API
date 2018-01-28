<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tipo_pagamento;
use App\produto;
use App\tipo_servico;

class venda extends Model
{
    public function tipos_pagamentos() {
        return $this->hasMany(tipo_pagamento);
    }

    public function produtos() {
        return $this->hasMany(produto);
    }

    public function tipos_servicos() {
        return $this->hasMany(tipo_servico);
    }


}
