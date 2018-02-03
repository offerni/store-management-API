<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function messages() {
        return $messages = [
        'unique' => 'Este :attribute já existe'
        ];
    }

    public function rules() {
        return $rules =  [
            'nome' => 'required|unique:categorias,nome',
        ];
    }
    
}
