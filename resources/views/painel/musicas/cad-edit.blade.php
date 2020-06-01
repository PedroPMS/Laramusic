@extends('painel.templates.template')

@section('content')

<div class="container">
	<h1 class="title">
		Gestão de Músicas	
	</h1>
	@if(isset($errors) && count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				{{$error}}<br>
			@endforeach
		</div>
	@endif

	@if(isset($data))
	<form class="form" method="POST" action="/html/laravel/public/painel/musica/editar/{{$data->id}}" enctype="multipart/form-data">
	@else
	<form class="form" method="POST" action="/html/laravel/public/painel/musica/cadastrar" enctype="multipart/form-data">
	@endif
		{{csrf_field()}}
		<div class="form-group">
			<input type="text" name="nome" placeholder="Insira o Nome da Música" class="form-control" value="{{isset($data->nome) ? $data->nome : old('nome')}}">
		</div>

		<div class="form-group">
			<input type="file" name="arquivo" class="form-control">
		</div>

		<div class="form-group">
			<input type="submit" name="enviar" value="Enviar" class="btn btn-success">
		</div>
	</form>
</div>

@endsection