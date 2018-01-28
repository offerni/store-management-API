<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Categoria extends Model
{
    public function produtos() {
        return $this->belongsToMany(produto);
    }
}
