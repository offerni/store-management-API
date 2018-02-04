<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo_servico;

class Objeto_servico extends Model
{
    protected $fillable = ['identificacao', 'descricao'];
    protected $table = 'objetos_servicos';
    public function tipos_servicos() {
        return $this->belongsToMany(tipo_servico)->as('tipos_servicos_objetos_servicos');
    }
}
