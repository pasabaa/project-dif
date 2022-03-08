@extends('layouts.login-template')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-6 col-12 text-center d-none d-lg-block">
            <img class="img-fluid" width="400" src="{{asset('img/logo.png')}}" alt="">
        </div>
        <div class="col-lg-4 col-12">
            <div class="card border-0">
                <div class="card-header fs-1 border-0">Inicia Sesión</div>
                <div class="card-body p-4">
                    <form class="fw-bolder" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group my-4">
                            <label for="email" class="form-label align-items-center d-flex">Correo electrónico</label>

                            <input id="email" type="email"
                                class="form-control border-0 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label for="email" class="form-label align-items-center d-flex">Contraseña</label>

                            <input id="password" type="password"
                                class="form-control border-0 @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">


                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-light rounded-pill">
                                Iniciar sesión
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link d-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
