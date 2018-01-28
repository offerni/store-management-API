<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Estoque extends Model
{
    public function produtos() {
        return $this->hasMany(produto);
    }
}