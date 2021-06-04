@extends('layouts.admin-layout')
@section('title', "Admin Page")
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
.card.table-success{
    box-shadow: 0px 0px 12px #23a1423b;
}

.table-wrapper{
    max-height: 80vh;
}

    </style>
@endsection
@section('produk', 'active')
    @section('content')
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
</div>
</div>
<div class="row mb-5">
	<div class="col-md-12">
		<div class="card table-success table-responsive table-wrapper">
            <table class="table table-hover table-inverse table-scrollx" style="width: 100%">
                <thead class="thead-inverse">
                    <tr class="bg-success text-white text-center table-title">
                        <th colspan="8">Manajemen Produk</th>
                    </tr>
                    <tr class="bg-success text-white text-center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Nama Toko</th>
                        <th>Jenis Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                        <tr>
                            <td scope="row">{{$loop->index + 1}}</td>
                            <td><a class="text-link" href="{{route('produk.show', $produk->id)}}">{{$produk->nama_produk}}</a></td>
                            <td>{{$produk->toko['nama_toko']}}</td>
                            <td>@if ($produk->jenis_produk == "Tanaman")
                                <span class="border border-success text-success p-1 rounded">Tanaman </span>
                                @else
                                <span class="border border-primary text-primary p-1 rounded">Peralatan </span>
                                @endif
                            </td>
                            <td>{{$produk->harga_produk}}</td>
                            <td>{{$produk->stok}}</td>
                            <td>
                                <div class="rect-img-container">
                                    @if($produk->fotos != null)
                                    <img src="{{asset($produk->fotos->first()->path)}}" alt="" class="rect-img img-fluid">
                                    @else
                                    <img src="{{asset('images/profiles/preview.png')}}" alt="" class="rect-img img-fluid">
                                    @endif
                                </div>
                            </td>
                            <td class="text-truncate">
                                <div class="d-block">
                                    <form action="{{route('produk.destroy', $produk->id)}}" method="post" class="position-relative" onSubmit="return confirm('Apa kamu yakin ingin menghapus ini?');">
                                        @csrf @method('DELETE')
                                        <a href="" class="btn bs btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn bs btn-danger"><i class="fas fa-trash"></i></button>
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
    function confirm_reset() {
    return confirm("Apa kamu yakin ingin menghapus ini?");
}
    $(document).ready(function(){
        $('.table-scrollx').DataTable({
            "scrollX": true,
            "scrollY": "50vh",
    "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
    });
    });
        </script>
@endsection
