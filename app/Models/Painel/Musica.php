<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $fillable = ['nome','arquivo'];
    public $rules = [
        'nome' => 'required|min:3|max:100',
        'arquivo' => 'required|max:30000'
    ];

    public $rulesEdit = [
        'nome' => 'required|min:3|max:100',
        'arquivo' => 'max:30000'
    ];
}

