<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active
{
 -webkit-box-shadow: 0 0 0 30px white inset !important;
}
        .card{
            box-shadow: 0px 6px 12px #3d3d3d3b;
        }
        form input{
        background: transparent !important;
        outline: none !important;
        box-shadow: none !important;
        border: 0px !important;
        border-bottom:2px solid rgb(160, 219, 149) !important;
        border-radius: 0% !important;
        -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        }
        form input:focus{
            outline: none;
            border-bottom: 2px solid #1CD449 !important;
        }
        .head-title{
            width: 70px;
            height: 8px;
            background: rgb(24,139,52);
            background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);
        }
        .h5-masuk{
            font-size: 30px;
            font-weight: 700;
        }
        .btn.btn-success{
            background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);
            -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        }
        .btn.btn-success:hover{
            opacity: 0.8;
        }
    </style>
    <title>Form Login</title>
</head>
<body style="background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);">
    <div class="container-fluid my-5 row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="my-3">
                    <h1 class="h5 h5-masuk">MASUK</h1>
                    <div class="head-title"></div>
                </div>
                <form method="POST" class="mt-5">
                    @csrf
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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
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
                        <button type="submit" class="btn btn-success btn-block rounded-0">
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
                        <a href="{{route('register')}}" type="button" class="btn btn-block btn-outline-success">Buat akun baru</a>
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
