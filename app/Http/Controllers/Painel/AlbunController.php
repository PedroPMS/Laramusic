<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\StandartController;
use App\Models\Painel\Album;
use App\Models\Painel\Estilo;
use App\Models\Painel\Estilos;

class AlbunController extends StandartController
{
    protected $model;
    protected $nameView = 'painel.albuns';
    protected $redirectCad = '/painel/album/cadastrar';
    protected $redirectEdit = '/painel/album/editar';
    protected $route = '/painel/albuns';
    protected $request;

    public function __construct(Album $album, Request $request)
    {
        $this->model = $album;
        $this->request = $request;
    }

    //Exibe o formulário de cadastro 
    public function cad()
    {
        //Recupera os Estilos
        $estilos = Estilo::get();

        return view("{$this->nameView}.cad-edit",compact('estilos'));
    }

    public function edit($id)
    {
        //Recupera os Estilos
        $estilos = Estilo::get();
        //Recupera o estilo pelo ID
        $data = $this->model->find($id);

        return view("{$this->nameView}.cad-edit", compact('data','estilos'));
    }
}
