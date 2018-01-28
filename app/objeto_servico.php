<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tipo_servico;

class objeto_servico extends Model
{
    public function tipos_servicos() {
        return $this->belongsToMany(tipo_servico)->as('tipos_servicos_objetos_servicos');
    }
}
