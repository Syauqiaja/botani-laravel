<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('style.css')}}"> --}}
    <script src="{{asset('js/jquery.min.js')}}"></script>
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
                    width: 100%;
                    height: 8px;
                    background: rgb(24,139,52);
                    background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);
                }
                .h5-masuk{
                    font-size: 30px;
                    font-weight: 700;
                    color: rgb(50, 80, 50);
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
    <title>Form Registrasi</title>
</head>
<body style="background:linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);">
    <div class="container-fluid row justify-content-center ">
        <div class="col-8" >
        <div class="card  my-5 form-toko"  style="border-radius: 2%">
            <div class="card-body ">
                <div class="text-center">
                    <div class="my-3">
                        <h1 class="h5 h5-masuk">Daftarkan Tokomu</h1>
                        <div class="head-title"></div>
                    </div>
                </div>
                <form method="POST" action="{{route('toko.store')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Toko</label>
                            <input id="nama" type="text" class="form-control" name="nama" value="" placeholder="Masukkan Nama Toko">
                            @error('nama')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pembayaran">Metode Pembayran Utama</label>
                            <select name="pembayaran" id="pembayaran" class="form-control nice-select wide open">
                                <option value="">--Pilih--</option>
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                            @error('pembayaran')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="kode_identitas">No.Rekening</label>
                            <input id="kode_identitas" type="text" class="form-control" name="kode_identitas" value="" placeholder="Kode Identitas">
                            @error('kode_identitas')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                        @error('alamat')
                        <span class="text-danger" role="alert">
                            <small><strong>{{ $message }}</strong></small>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="info">Informasi Toko</label>
                        <textarea class="form-control" id="info" rows="3" name="info"></textarea>
                        @error('info')
                        <span class="text-danger" role="alert">
                            <small><strong>{{ $message }}</strong></small>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-success btn-block">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Copyright 2021 Botani Marketplace and Education Website
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/active.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $(".nice-select").niceselect();
            });
        </script>
</body>
</html>
