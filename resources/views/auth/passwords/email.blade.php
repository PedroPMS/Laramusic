@extends('auth.templates.template')

@section('content-form')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form class="login" method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>


        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-login">
            {{ __('Enviar email de recuperação') }}
        </button>
    </div>
</form>
@endsection