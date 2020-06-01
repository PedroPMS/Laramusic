<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\StandartController;
use App\Models\Painel\Estilo;

class EstilosController extends StandartController
{
    protected $model;
    protected $nameView = 'painel.estilos';
    protected $redirectCad = '/painel/estilos/cadastrar';
    protected $redirectEdit = '/painel/estilos/editar';
    protected $route = '/painel/estilos';
    protected $request;

    public function __construct(Estilo $estilo, Request $request)
    {
        $this->model = $estilo;
        $this->request = $request;
    }
}
