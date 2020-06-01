<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    protected $fillable = ['nome'];
    public $rules = [
        'nome' => 'required|min:3|max:100'
    ];
}
