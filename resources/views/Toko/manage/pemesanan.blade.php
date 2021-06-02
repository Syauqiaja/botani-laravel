@extends('layouts.manage-toko')
@section('title', "Manage Toko")
@section('style')
    <style>
        body{
color: #1a202c;
text-align: left;
background-color: #e2e8f0;
}
.main-body {
padding: 15px;
}
.card {
box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
position: relative;
display: flex;
flex-direction: column;
min-width: 0;
word-wrap: break-word;
background-color: #fff;
background-clip: border-box;
border: 0 solid rgba(0,0,0,.125);
border-radius: .25rem;
}

.card-body {
flex: 1 1 auto;
min-height: 1px;
padding: 1rem;
}

.gutters-sm {
margin-right: -8px;
margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
padding-right: 8px;
padding-left: 8px;
}
.mb-3, .my-3 {
margin-bottom: 1rem!important;
}

.bg-gray-300 {
background-color: #e2e8f0;
}
.h-100 {
height: 100%!important;
}
.shadow-none {
box-shadow: none!important;
}
.text-link {
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
}
.text-link:hover {
    color: #1CD449;
}
.text-link:active {
    color: #23a142;
}
.no-outline, .no-outline:active:focus, .no-outline.active:focus{
    outline:none !important;
    box-shadow: none !important;
}
.card.table-primary{
    box-shadow: 0px 0px 12px #232ba14f;
}

.table-wrapper{
    max-height: 80vh;
}

    </style>
@endsection
@section('pemesanan', 'active')
    @section('content')
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
</div>
</div>
<div class="row mb-5">
	<div class="col-md-12">
		<div class="card table-primary table-responsive table-wrapper">
            <table class="table table-hover table-inverse table-scrollx" style="width: 100%">
                <thead class="thead-inverse">
                    <tr class="bg-primary text-white text-center table-title">
                        <th colspan="8">Pesanan Masuk</th>
                    </tr>
                    <tr class="bg-primary text-white text-center">
                        <th>No</th>
                        <th>Pemesan</th>
                        <th>Nama Produk</th>
                        <th>Kuantitas</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanans as $pemesanan)
                        <tr>
                            <td scope="row">{{$loop->index + 1}}</td>
                            <td>{{$pemesanan->user->nama}}</td>
                            <td class="text-center">{{$pemesanan->produk->nama_produk}}</td>
                            <td class="text-center">{{$pemesanan->kuantitas}}</td>
                            <td class="text-right">Rp.<span class="harga">{{$pemesanan->total_harga}}</span></td>
                            <td class="text-center">
                                {{substr($pemesanan->alamat_pengiriman, 0, 100)}}
                            </td>
                            <td>
                                @if($pemesanan->status == 0)
                                    <span class="btn bs btn-danger btn-sm text-truncate w-100">Belum Dibayar</span>
                                @elseif($pemesanan->status == 1)
                                    <span class="btn bs btn-warning btn-sm w-100">Sudah Bayar</span>
                                @elseif($pemesanan->status == 2)
                                    <span class="btn bs btn-primary btn-sm w-100">Terkirim</span>
                                @elseif($pemesanan->status == 3)
                                    <span class="btn bs btn-success btn-sm w-100">Sukses</span>
                                @elseif($pemesanan->status == 4)
                                    <span class="btn bs btn-secondary btn-sm w-100">Dibatalkan</span>
                                @else
                                    <span class="btn bs btn-outline-secondary btn-sm w-100">Undefined</span>
                                @endif
                            </td>
                            <td class="text-truncate text-center">
                                <div class="d-block">
                                    <form action="" method="post" class="position-relative">
                                        <a class="btn bs btn-primary mr-1" type="button" target="_blank" title="Lihat Pesanan" href="{{route('pemesanan.show', $pemesanan->id)}}"><i class="fas fa-eye" ></i></a>
                                        <button type="submit" class="btn bs btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
</div>
</div>
</div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js+bootstrap.min.js+main.js.pagespeed.jc.mGo61WuhWO.js"></script><script>eval(mod_pagespeed_VlMY9A_Ej6);</script>
<script>eval(mod_pagespeed_Jrc1mCtwoH);</script>
<script>eval(mod_pagespeed_p4wjUenRL9);</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"657906123960051b","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.5.2","si":10}'></script>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
        };
        $('.harga').each(function(i, obj) {
            $(this).text(numberWithCommas($(this).text()));
        });
        $('.table-scrollx').DataTable({
            "scrollX": true,
            "scrollY": "50vh",
    "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
    });
        </script>
@endsection
