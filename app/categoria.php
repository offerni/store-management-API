<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Categoria extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function produtos() {
        return $this->belongsToMany(produto);
    }
}
