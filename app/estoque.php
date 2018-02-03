<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Estoque extends Model
{
    protected $table = 'estoque';
    public function produtos() {
        return $this->hasMany(produto);
    }
}