<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo_servico;

class Objeto_servico extends Model
{
    public function tipos_servicos() {
        return $this->belongsToMany(tipo_servico)->as('tipos_servicos_objetos_servicos');
    }
}
