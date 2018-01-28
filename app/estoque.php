<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\produto;

class estoque extends Model
{
    public function produtos() {
        return $this->hasMany(produto);
    }
}