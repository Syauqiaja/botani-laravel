<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Form Registrasi</title>
</head>
<body style="background-color:rgb(7, 148, 26);">
    <div class="container-fluid my-5 row justify-content-center ">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                FORM REGISTRASI CUSTOMER
            </div>
            <div class="card-body ">
                <form method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control" name="nama" value="" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                            <input id="telepon" type="text" class="form-control" name="telepon" value="" placeholder="Masukkan Nomor Telepon/HP">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Masukkan Alamat Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi">
                    </div>

                    <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                            <input id="password2" type="password" class="form-control" name="password2" placeholder="Ulangi Kata Sandi">
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            Buat
                        </button>
                    </div>

                    <div class="mt-4 mb-2 text-center">
                        Sudah punya akun? Silakan login <a href="login">disini</a>
                    </div>
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
