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
body{

    background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%) no-repeat;
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
        .card{
            box-shadow: 0px 6px 12px #3d3d3d3b;
        }
        form input, form textarea{
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
        form input#resi{
            border:2px solid rgb(160, 219, 149) !important;
            -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        }
        form input#resi:focus{
            border:2px solid #1CD449 !important;
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
<body>
    <div class="container-fluid my-5 row justify-content-center">
        <div class="card col-8">
            <div class="card-body">
                <div class="my-3">
                    <h1 class="h5 h5-masuk">Pesanan #{{$pemesanan->id}}</h1>
                    <div class="head-title"></div>
                </div>
                <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('pemesanan.kirim', $pemesanan->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Pemesan</label>
                            <input id="" type="text"  name="nama" value="{{ $pemesanan->user->nama }}" disabled class="form-control">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Nama Produk</label>
                            <input id="" type="text"  name="nama" value="{{ $pemesanan->produk->nama_produk }}" disabled class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="">Kuantitas</label>
                            <input id="" type="text"  name="nama" value="{{ $pemesanan->kuantitas }}" disabled class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Harga</label>
                            <input id="" type="text"  name="nama" value="{{ $pemesanan->produk->harga_produk }}" disabled class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Total Harga</label>
                            <input id="" type="text"  name="nama" value="{{ $pemesanan->total_harga }}" disabled class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="">Alamat</label>
                            <textarea disabled class="form-control" cols="30" rows="2">{{ $pemesanan->alamat_pengiriman }}</textarea>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Ekspedisi</label>
                            <input id="" type="text"  name="nama" value="{{ $pemesanan->ekspedisi }}" disabled class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Bukti Pembayaran</label>
                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter"><img src="{{asset($pemesanan->bukti_pembayaran)}}" alt="" class="img-fluid"></button>
                        </div>
                        <div class="col-md-8 row justify-content-center">
                            <div class="col-8">
                                <h1 class="h4 text-center mt-3">Sisa Waktu Pengiriman</h1>
                                @if ($pemesanan->status == 1)
                                    @if ($sisaWaktu <= 1)
                                    <h1 class="text-center text-danger" style="font-size: 100px;">{{$sisaWaktu}}</h1>
                                    @elseif($sisaWaktu <= 2)
                                    <h1 class="text-center text-warning" style="font-size: 100px;">{{$sisaWaktu}}</h1>
                                    @elseif($sisaWaktu <= 4)
                                    <h1 class="text-center text-primary" style="font-size: 100px;">{{$sisaWaktu}}</h1>
                                    @elseif($sisaWaktu > 4)
                                    <h1 class="text-center text-success" style="font-size: 100px;">{{$sisaWaktu}}</h1>
                                    @endif
                                @else
                                <h1 class="text-center text-secondary" style="font-size: 30px;">Tidak ada</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr><br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="resi"><strong>Masukkan No.Resi Pengiriman</strong></label>
                            <input id="resi" type="text"  name="resi" class="form-control"
                            @if($pemesanan->status != 1) value="{{$pemesanan->resi->kode_resi}}" disabled @else placeholder="ex: JP162916783052" @endif>
                        </div>
                    </div>
                    @if($pemesanan->status == 1)
                    <div class="row mb-3">
                        <div class="input-group col-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileResi" name="fileResi">
                                <label class="custom-file-label" for="fileResi" aria-describedby="PembayaranAria">Upload Resi Pengiriman</label>
                            </div>
                            @error('fileResi')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn bs btn-success w-100 rounded-0" @if($pemesanan->status != 1) disabled @endif>Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Kepuasan pelanggan adalah prioritas utama
            </div>
        </div>
    </div>
    <div class="bs modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="bs modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="bs modal-content">
            <div class="bs modal-header">
              <h5 class="bs modal-title" id="exampleModalLongTitle">Foto Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="bs modal-body">
                <img src="{{asset($pemesanan->bukti_pembayaran)}}" alt="" class="img-fluid">
            </div>
            <div class="bs modal-footer">
              <button type="button" class="bs btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $("#fileResi").on("change", function() {
        if (this.files && this.files[0]) {
        var fileName = $(this).val();
        var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
        var reader = new FileReader();
            reader.onload = function () {
                $("#gambar").attr('src', reader.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
            });
        </script>
</body>
</html>
