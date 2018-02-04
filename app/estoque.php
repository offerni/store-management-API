<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Estoque extends Model
{
    protected $fillable = ['valor_entrada', 'valor_saida', 'validade', 'quantidade', 'produto_id'];
    protected $table = 'estoque';
    public function produtos() {
        return $this->hasMany(produto);
    }
}