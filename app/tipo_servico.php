<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\objeto_servico;
use App\venda;

class tipo_servico extends Model
{
    public function objetos_servicos() {
        return $this->belongsToMany(objeto_servico)->as('tipos_servicos_objetos_servicos');
    }

    public function vendas() {
        return $this->belongsTo(venda);
    }
}
