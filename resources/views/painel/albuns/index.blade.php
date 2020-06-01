@extends('painel.templates.template')

@section('content')

<!--Filters and actions-->
<div class="actions">
		<div class="container">
			<a class="add" href="{{url('/painel/album/cadastrar')}}">
				<i class="fa fa-plus-circle"></i>
			</a>

            <form class="form-search form form-inline" method="post" action="{{url('/painel/album/pesquisar')}}">
                {{csrf_field()}}
				<input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
				<input type="submit" value="Encontrar" class="btn btn-danger">
			</form>
		</div>
	</div><!--Actions-->

<div class="container">
    <h1 class="title">
        Listagem dos Álbuns
    </h1>

    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th width="100px">Ações</th>
        </tr>

        @forelse($data as $album)
        <tr>
            <td>{{$album->id}}</td>
            <td>{{$album->nome}}</td>
            <td>
                <a href='{{url("/painel/album/editar/$album->id")}}' class="edit">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href='{{url("/painel/album/deletar/$album->id")}}' class="delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="90">Não existem álbuns cadastrados</td>
            </tr>
        @endforelse
    </table>


    <nav>
        {{$data->links()}}
    </nav>
</div>

@endsection