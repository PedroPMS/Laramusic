@extends('painel.templates.template')

@section('content')

<div class="container">
	<h1 class="title">
		Gestão de Álbum	
	</h1>
	@if(isset($errors) && count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				{{$error}}<br>
			@endforeach
		</div>
	@endif

	@if(isset($data))
	<form class="form" method="POST" action="/html/laravel/public/painel/album/editar/{{$data->id}}">
	@else
	<form class="form" method="POST" action="/html/laravel/public/painel/album/cadastrar">
	@endif
		{{csrf_field()}}
		<div class="form-group">
			<select name="id_estilo" class="form-control">
				<option value="">Escolha o Estilo</option>
				@foreach($estilos as $estilo)
					<option value="{{$estilo->id}}"
						@if(isset($data->id_estilo) && $data->id_estilo == $estilo->id)
							selected
						@endif
						>{{$estilo->nome}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<input type="text" name="nome" placeholder="Insira o Nome do Álbum" class="form-control" value="{{isset($data->nome) ? $data->nome : old('nome')}}">
		</div>

		<div class="form-group">
			<input type="submit" name="enviar" value="Enviar" class="btn btn-success">
		</div>
	</form>
</div>

@endsection