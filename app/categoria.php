<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\produto;

class categoria extends Model
{
    public function produtos() {
        return $this->belongsToMany(produto);
    }
}
