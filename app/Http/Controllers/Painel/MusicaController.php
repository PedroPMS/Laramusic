<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\StandartController;
use App\Models\Painel\Musica;

class MusicaController extends StandartController
{
    protected $model;
    protected $nameView = 'painel.musicas';
    protected $redirectCad = '/painel/musica/cadastrar';
    protected $redirectEdit = '/painel/musica/editar';
    protected $route = '/painel/musicas';
    protected $request;

    public function __construct(Musica $musica, Request $request)
    {
        $this->model = $musica;
        $this->request = $request;
    }

    public function cadGo()
    {
        //Recupera os dados do form
        $dadosForm = $this->request->all();
        //Valida os dados
        $validator = validator($dadosForm, $this->model->rules);

        if ($validator->fails()) {
            return redirect($this->redirectCad)
                ->withErrors($validator)
                ->withInput();
        }
        
        //Upload arquivo//
        //Recupera o campo de upload
        $musica = $this->request->file('arquivo');

        //Define o caminho
        $path = storage_path('app/public/painel/musicas');

        //Define o nome da música
        $nameMusic = date('YmdHms').'.' .$musica->getClientOriginalExtension();
        $dadosForm['arquivo'] = $nameMusic;

        //Faz o upload da música
        $upload = $musica->move($path, $nameMusic);

        if(!$upload)
            return redirect($this->redirectCad)
                    ->withErrors(['errors' => 'Falha ao fazer upload'])
                    ->withInput();



        //Faz o insert
        $insert = $this->model->create($dadosForm);

        //Verifica se deu tudo certo
        if ($insert)
            return redirect($this->route);
        else
            return redirect($this->redirectCad)
                ->withErrors(['errors' => 'Falha ao Cadastrar'])
                ->withInput();
        
    }

    public function editGo($id)
    {
        //Recupera os dados do formulário em forma de array
        $dadosForm = $this->request->all();

        //Valida os dados
        $validator = validator($dadosForm, $this->model->rulesEdit);
        if ($validator->fails()) {
            return redirect("{$this->redirectEdit}/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        //Recupera o item pelo ID
        $item = $this->model->find($id);

        if($this->request->hasFile('arquivo')){

            //Recupera o arquivo
            $musica = $this->request->file('arquivo');

            //Define o caminho
            $path = storage_path('app/public/painel/musicas');

            //Define o nome da música
            $nameMusic =  $item->arquivo;

            //Faz o upload da música
            $dadosForm['arquivo'] = $item->arquivo;
            $upload = $musica->move($path, $nameMusic);

            if(!$upload)
                return redirect($this->redirectEdit/$id)
                        ->withErrors(['errors' => 'Falha ao fazer upload'])
                        ->withInput();
        }

        //Faz a edição do item
        $update = $item->update($dadosForm);

        //Verifica se editou com sucesso
        if ($update)
            return redirect($this->route);
        else
            return redirect("{$this->redirectEdit}/{$id}")
                ->withErrors(['errors' => 'Falha ao Editar'])
                ->withInput();
        

        return view('painel.estilos.cad-edit', compact('estilo'));
    }
}
