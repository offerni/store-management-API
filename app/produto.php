<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\categoria;
use App\venda;

class produto extends Model
{
    public function categorias() {
        return $this->belongsToMany(categoria);
    }

    public function vendas() {
        return $this->belongsTo(venda);
    }
}
