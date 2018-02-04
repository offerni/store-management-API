<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Objeto_servico;
use App\Venda;

class Tipo_servico extends Model
{
    protected $fillable = ['nome', 'descricao'];
    protected $table = 'tipos_servicos';
    public function objetos_servicos() {
        return $this->belongsToMany(objeto_servico)->as('tipos_servicos_objetos_servicos');
    }

    public function vendas() {
        return $this->belongsTo(venda);
    }
}
