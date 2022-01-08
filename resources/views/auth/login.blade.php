<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="overlay">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin-top: 1%">
                <center>
                    <h1 style="color: #ffff;">Login</h1>
                </center>
            </div>
            <div class="col-md-7 div_login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-md-12">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                  <div class="row mb-2">
                        <div class="col-md-12 offset-md-5">
                            <button type="submit" class="btn" style="background: #24B7A4; color:#fff; border-radius: 50%;">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                  <div class="row mb-0 bt-2">
                        <div class="col-md-12 text-center">
                                don't Have Account ? <a href="{{ route('register') }}">Register Now</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
