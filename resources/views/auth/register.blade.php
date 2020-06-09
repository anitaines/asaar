<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body>

    <div class="" style="width: 75%; margin: 100px auto; text-align: center;">

      <div class="card-header" style="margin: 15px 0px;">{{ __('Register') }}</div>

      <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="" style="margin: 15px 0px;">
                  <label for="username">Username</label>

                  <div class="">
                      <input id="username" type="text"  name="username" value="{{ old('username') }}" autofocus>

                      @error('username')
                          <div class="" role="alert">
                              <strong>{{ $message }}</strong>
                          </div>
                      @enderror
                  </div>
              </div>

              <div class="" style="margin: 15px 0px;">
                  <label for="password">{{ __('Password') }}</label>

                  <div class="">
                      <input id="password" type="password"  name="password">

                      @error('password')
                          <div class="" role="alert">
                              <strong>{{ $message }}</strong>
                          </div>
                      @enderror
                  </div>
              </div>

              <div class="" style="margin: 15px 0px;">
                  <label for="password-confirm">{{ __('Confirm Password') }}</label>

                  <div class="">
                      <input id="password-confirm" type="password" name="password_confirmation">
                  </div>
              </div>

              <div class="" style="margin: 15px 0px;">
                  <div class="">
                      <button type="submit">
                          {{ __('Register') }}
                      </button>
                  </div>
              </div>
          </form>
      </div>

    </div>

  </body>
</html>
