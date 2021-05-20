<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Form Login</title>
</head>
<body style="background-color:rgb(7, 148, 26);">
    <div class="container-fluid my-5 row justify-content-center ">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                FORM LOGIN
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password
                        </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="custom-control-label">Ingat saya</label>
                        </div>
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </div>

                    <div class="mt-4 mb-2 text-center">
                        Belum punya akun?
                    </div>
                        <a href="register_admin" type="button" class="btn btn-block btn-success">Buat akun Seller</a>
                        <a href="register" type="button" class="btn btn-block btn-info">Buat akun Customer</a>
                </form>
            </div>
            <div class="card-footer">
                Copyright 2021 Botani Marketplace and Education Website
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
