@extends('layouts.app')

@section("title")
  Login -
  @endsection

@section('content')

  <main class="admin login">
    <h4>Iniciar sesión:</h4>
    {{-- @dd($errors) --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-item">
            <label for="username" class="">Usuario:</label>

            <div class="">
                <input id="username" type="text" name="username" value="{{ old('username') }}" autofocus>

                @error('username')
                    <div class="" style="color: red;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-item">
            <label for="password" class="">Contraseña:</label>

            <div class="">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <div class="" style="color: red;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-item">
            <div class="">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      Recordarme
                    </label>
                </div>
            </div>
        </div>

        <div class="">
            <div class="">
                <button type="submit" class="">
                    Login
                </button>

            </div>
        </div>

        <p style="margin: 50px 0px 0px 0px; color: var(--magenta);">Para poder utilizar todas las funcionalidades del panel de control es necesario loguearse desde un navegador <b>Chrome</b> o <b>Firefox</b>.</p>
    </form>

  </main>

@endsection
