<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Venda;

class Produto extends Model
{
    public function categorias() {
        return $this->belongsToMany(categoria);
    }

    public function vendas() {
        return $this->belongsTo(venda);
    }
}
