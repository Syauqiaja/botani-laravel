@extends('layouts.master')
@section('title', 'Bayar Pesanan')
@section('style')
<style>
    body{
color: #1a202c;
text-align: left;
background-color: #e2e8f0;
}
.card form{
    box-shadow: 0px 6px 12px #3d3d3d3b;
}
.card form .card-header{
    border: none;
    box-shadow: 0px 6px 10px #23a1426c;
}
.card form .card.method .card-header{
    border: none;
    box-shadow: 0px 6px 10px #2368a16c;
}
</style>
@endsection
@section('content')
    <div class="container my-5">
     <div class="card">
         <form action="{{route('pemesanan.bayar.store', $pemesanan->id)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PATCH')
         <div class="card-header bg-success text-white h5 text-center">
             Pembayaran
         </div>
         <div class="card-body">
             <h5 class="h5">Metode Pembayaran Tersedia</h5>
             <div class="row mt-3 mb-5">
                 @foreach ($pemesanan->toko->pembayaran as $pembayaran)
                 <div class="col-md-3">
                     <div class="card method">
                         <div class="card-header bg-info text-white">
                             <h3 class="card-title">{{$pembayaran->metode}}</h3>
                         </div>
                         <div class="card-body">
                             <p class="card-text">[{{$pembayaran->kode_identitas}}]</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Nama produk</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">{{$pemesanan->produk->nama_produk}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Toko</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">{{$pemesanan->toko->nama_toko}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Detail Harga</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">Rp.<span id="harga">{{$pemesanan->total_harga}}</span></div>
                    </div>
                    <hr>
                    <h5 class="h5 mb-3">Upload Bukti Pembayaran</h5>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="filePembayaran" name="bukti">
                            <label class="custom-file-label" for="filePembayaran" aria-describedby="PembayaranAria">Upload Bukti Pembayaran</label>
                        </div>
                        @error('bukti')
                        <span class="text-danger" role="alert">
                            <small><strong>{{ $message }}</strong></small>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn bs btn-success mt-3 rounded-0">Bayar Sekarang</button>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="rect-img-container">
                            <img id="gambar" src="{{asset('images/profiles/preview.png')}}" alt="PreviewFoto" class="rect-img img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center h5">Bukti pembayaran</h4>
                        </div>
                    </div>

                </div>
            </div>
            </form>
         </div>
     </div>
    </div>
@endsection
@section('script')
    <script>
$(document).ready(function() {
    $("#filePembayaran").on("change", function() {
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
$(".card.method" ).hover(function() {
    $(this).addClass('shadow').css('cursor', 'pointer');
  }, function() {
    $(this).removeClass('shadow');
  }
  );
  function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
    };
    $("#harga").text(numberWithCommas($("#harga").text()));

// document ready
});
    </script>
@endsection
