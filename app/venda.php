<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo_pagamento;
use App\Produto;
use App\Tipo_servico;

class venda extends Model
{
    protected $fillable = ['descricao', 'valor', 'tipo_pagamento_id', 'produto_id', 'tipo_servico_id'];
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
