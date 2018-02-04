<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Venda;
use App\Estoque;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'img'];
    public function categorias() {
        return $this->belongsToMany(categoria);
    }

    public function vendas() {
        return $this->belongsTo(venda);
    }

    public function estoque() {
        return $this->belongsTo(estoque);
    }
}
