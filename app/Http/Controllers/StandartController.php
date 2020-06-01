<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class StandartController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $totalPorPagina = 10;

    //Listagem dos itens
    public function index()
    {
        //Recupera todos os estilos cadastrados
        $data = $this->model->paginate($this->totalPorPagina);
        return view("{$this->nameView}.index", compact('data'));
    }

    //Exibe o formulário de cadastro 
    public function cad()
    {
        return view("{$this->nameView}.cad-edit");
    }

    //Faz o cadastro
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

    //Exibe o formulário de Edição
    public function edit($id)
    {
        //Recupera o estilo pelo ID
        $data = $this->model->find($id);

        return view("{$this->nameView}.cad-edit", compact('data'));
    }


    //Editando o item
    public function editGo($id)
    {
        //Recupera os dados do formulário em forma de array
        $dadosForm = $this->request->all();

        //Valida os dados
        $validator = validator($dadosForm, $this->model->rules);
        if ($validator->fails()) {
            return redirect("{$this->redirectEdit}/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        //Recupera o item pelo ID
        $item = $this->model->find($id);

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

    //Deleta um registro
    public function delete($id)
    {
        //Recupera o item pelo seu ID
        $item = $this->model->find($id);

        //Deleta o item
        $delete = $item->delete();
        
        return redirect($this->route);
    }

    //Pesquisa um registro
    public function pesquisar()
    {
        //Recupera a palavra pesquisada
        $palavra = $this->request->get('pesquisar');

        //Filtra os dados de acordo com a palavra pesquisada
        $data = $this->model->where('nome', 'LIKE', "%$palavra%")->paginate($this->totalPorPagina);

        //Mostra a view
        return view("{$this->nameView}.index", compact('data'));
    }
}
