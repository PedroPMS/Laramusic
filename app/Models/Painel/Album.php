<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albuns';

    protected $fillable = [
        'id_estilo',
        'nome'
    ];
    
    public $rules = [
        'id_estilo' => 'required',
        'nome' => 'required|min:3|max:100'
    ];
}
