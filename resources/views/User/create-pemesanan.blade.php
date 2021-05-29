@extends('layouts.master')

@section('content')
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - BBBootstrap</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
                                <style>body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-image: url("https://i.imgur.com/GMmCQHC.png");
    background-repeat: no-repeat;
    background-size: 100% 100%
}

.card {
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'>function validate(val) {
v1 = document.getElementById("fname");
v2 = document.getElementById("lname");
v3 = document.getElementById("file");
v4 = document.getElementById("deskripsi");
v5 = document.getElementById("eks");

flag1 = true;
flag2 = true;
flag3 = true;
flag4 = true;
flag5 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}
if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}
if(val>=4 || val==0) {
if(v4.value == "") {
v4.style.borderColor = "red";
flag4 = false;
}
else {
v4.style.borderColor = "green";
flag4 = true;
}
}
if(val>=5 || val==0) {
if(v5.value == "") {
v5.style.borderColor = "red";
flag5 = false;
}
else {
v5.style.borderColor = "green";
flag5 = true;
}
}



flag = flag1 && flag2 && flag3 && flag4 && flag5;

return flag;
}</script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div class="container-fluid px-1 py-5 mx-auto">
                                @if(session()->has('pesan'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span>{{session()->get('pesan')}}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                            @endif
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Buat Pesanan</h5>
                <form class="form-card" action="{{route('pemesanan.update', $pemesanan->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nama Pemesan<span class="text-danger"> *</span></label> <input type="text" id="" name="nama_pemesan" value="{{$pemesanan->user->nama}}" onblur="validate(1)" disabled> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Pesanan<span class="text-danger"> *</span></label> <input type="text" id="" name="nama_produk" value="{{$pemesanan->produk->nama_produk}}" onblur="validate(2)" disabled> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Jumlah Pesanan<span class="text-danger"> *</span></label> <input type="text" id="" name="kuantitas" value="{{$pemesanan->kuantitas}}" onblur="validate(2)" disabled> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nama Toko<span class="text-danger"> *</span></label> <input type="text" id="" name="nama_toko" value="{{$pemesanan->toko->nama_toko}}" onblur="validate(1)" disabled> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Harga<span class="text-danger"> *</span></label> <input type="text" id="" name="harga_produk" value="{{$pemesanan->produk->harga_produk}}" onblur="validate(1)" disabled> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ekspedisi<span class="text-danger"> *</span></label>
                             <select type="ekspedisi" id="ekspedisi" name="ekspedisi" class="custom-select">
                                 <option value="" selected>--Pilih Ekspedisi--</option>
                                 <option value="Pos Indonesia" {{(old('ekspedisi') == 'Pos Indonesia') ? "selected" : ""}}>Pos Indonesia</option>
                                 <option value="JNE" {{(old('ekspedisi') == 'JNE') ? "selected" : ""}}>JNE</option>
                                 <option value="Ninja Express" {{(old('ekspedisi') == 'Ninja Express') ? "selected" : ""}}>Ninja Express</option>
                                 <option value="SICEPAT" {{(old('ekspedisi') == 'SICEPAT') ? "selected" : ""}}>SICEPAT</option>
                                </select>
                                @error('ekspedisi')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                                @enderror
                            </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Total Harga<span class="text-danger"> *</span></label> <input type="text" id="" name="total_harga" value="{{$pemesanan->total_harga}}" onblur="validate(2)" disabled> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bukti Pembayaran<span class="text-danger"> *</span></label> <input type="file" id="bukti" name="bukti" placeholder="" onblur="validate(3)">
                            @error('bukti')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Alamat Tujuan<span class="text-danger"> *</span></label> <textarea name="alamat" id="alamat" cols="10" rows="5">{{ (!empty(old('alamat')))? old('alamat') : Auth::user()->alamat }}</textarea> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="button" class="btn-block btn-primary" id="submitButton" data-toggle="modal" data-target="#exampleModalCenter">Buat Pesanan</button> </div>
                    </div>
                    <div class="bs modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="bs modal-dialog modal-dialog-centered" role="document">
                          <div class="bs modal-content">
                            <div class="bs modal-header">
                              <h5 class="bs modal-title" id="exampleModalLongTitle">Konfirmasi Pesanan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="bs modal-body">
                              <div><h1 class="h4 text-gray-800">Berikut Pesanan Anda</h1></div>
                              <p>Pastikan seluruh data benar! jika terbukti terdapat kesalahan dari pembeli, maka kami tidak bertanggung jawab</p>
                                <div class="form-konfirmasi justify-content-start text-left mt-5">
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Nama Pembeli</h6></div>
                                        <div class="col-sm-8 text-secondary">{{$pemesanan->user->nama}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Toko Penjual</h6></div>
                                        <div class="col-sm-8 text-secondary">{{$pemesanan->toko->nama_toko}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Nama Barang</h6></div>
                                        <div class="col-sm-8 text-secondary">{{$pemesanan->produk->nama_produk}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Harga Barang</h6></div>
                                        <div class="col-sm-8 text-secondary">{{$pemesanan->kuantitas}} x {{$pemesanan->produk->harga_produk}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Total Harga</h6></div>
                                        <div class="col-sm-8 text-secondary">{{$pemesanan->total_harga}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Ekspedisi</h6></div>
                                        <div class="col-sm-8 text-secondary" id="konfirmasiEkspedisi"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Alamat Tujuan</h6></div>
                                        <div class="col-sm-8 text-secondary" id="konfirmasiAlamat">{{Auth::user()->alamat}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4"><h6>Bukti pembayaran</h6></div>
                                        <div class="col-sm-8 text-secondary rect-img-container h-100 p-0 mx-3">
                                            <img src="{{asset('images/profiles/preview.png')}}" alt="Foto" class="img-fluid rect-img" style="left:0%; width:100%" id="konfirmasiBukti">
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Kami sarankan untuk memeriksa kembali pesanan anda</p>
                                </div>
                            </div>
                            <div class="bs modal-footer">
                              <button type="submit" class="btn bs btn-primary">Konfirmasi</button>
                              <button type="button" class="btn bs btn-outline-danger" data-dismiss="modal">Batalkan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $("#submitButton").on('click', function(){
        $("#konfirmasiEkspedisi").html($("select[name='ekspedisi'] option").filter(':selected').val());
        $("#konfirmasiAlamat").html($("textarea[name='alamat']").val());
    });
    $("#bukti").on("change", function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function () {
                $("#konfirmasiBukti").attr('src', reader.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
                            </body>
                        </html>
@endsection
