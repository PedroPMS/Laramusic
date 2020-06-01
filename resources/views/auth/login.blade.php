@extends('auth.templates.template')

@section('content-form')
<form class="login" method="POST" action="{{ route('login') }}">
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
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-login">
            {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
        <a href="{{url('/password/reset')}}" class="btn btn-link">Recuperar Senha?</a>
        @endif

    </div>


</form>
@endsection