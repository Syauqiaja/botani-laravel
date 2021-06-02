@extends('layouts.master')
@section('title', 'Riwayat Pemesanan')
@section('style')
<style type="text/css">
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
@section('content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Profil</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
    <div class="main-body">
		<div class="row gutters-sm">

            <div class="col-md-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset($user['foto_profil'])}}" alt="Admin" class="rounded-circle" width="150"
                    style="background-color: @if(strpos(Auth::user()->foto_profil,'male-')) #c7ccf5; @elseif(strpos(Auth::user()->foto_profil,'female-')) #f5c7cf; @else white; @endif">
                    <div class="mt-3">
                      <h4>{{strtok($user['nama'], " ")}}</h4>
                      {{-- <p class="text-secondary mb-3">"Hiduplah seperti tumbuhan"</p> --}}
                      <blockquote class="blockquote text-center">
                        <p class="mb-0"><small> {{$pemesanans->count()}} Pesanan</small></p>
                      </blockquote>
                      <div class="text-center">
                        <div class="dropdown show">
                            <a class="btn bs btn-primary dropdown-toggle rounded-0 no-outline" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Pindah Halaman
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="{{route('user.show', $user->id)}}">Profil</a>
                              @if($user->id == Auth::user()->id)<a class="dropdown-item active" href="{{route('user.riwayat')}}">Riwayat Pembelian</a>@endif
                              @if($user->toko != null)<a class="dropdown-item" href="{{route('toko.show', Auth::user()->toko->id)}}">Toko</a>@endif
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
                <div class="card table-success table-responsive table-wrapper">
                    <table class="table table-hover table-inverse table-scrollx" style="width: 100%">
                        <thead class="thead-inverse">
                            <tr class="bg-success text-white text-center">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Toko</th>
                                <th>Total Harga</th>
                                <th>Kuantitas</th>
                                <th>Jenis</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanans as $pemesanan)
                                <tr>
                                    <td scope="row">{{$loop->index + 1}}</td>
                                    <td>{{$pemesanan->produk->nama_produk}}</td>
                                    <td>{{$pemesanan->toko->nama_toko}}</td>
                                    <td>Rp.{{$pemesanan->total_harga}}</td>
                                    <td>{{$pemesanan->kuantitas}}</td>
                                    <td>
                                        @if ($pemesanan->produk->jenis_produk == "Tanaman")
                                        <span class="border border-success text-success p-1 rounded">Tanaman </span>
                                        @else
                                        <span class="border border-primary text-primary p-1 rounded">Peralatan </span>
                                        @endif</td>
                                        <td>{{date("d/m/Y", strtotime($pemesanan->created_at)) }}</td>
                                        <td class="text-center">
                                            @if($pemesanan->status == 0)
                                                <span class="btn bs btn-danger btn-sm text-truncate w-100"><a  href="{{route('pemesanan.bayar', $pemesanan->id)}}">Belum Bayar</a></span>
                                            @elseif($pemesanan->status == 1)
                                                <span class="btn bs btn-warning btn-sm w-100">Diproses</span>
                                            @elseif($pemesanan->status == 2)
                                                <span class="btn bs btn-primary btn-sm w-100">Dikirim</span>
                                            @elseif($pemesanan->status == 3)
                                                <span class="btn bs btn-success btn-sm w-100">Sukses</span>
                                            @elseif($pemesanan->status == 4)
                                                <span class="btn bs btn-secondary btn-sm w-100">Dibatalkan</span>
                                            @else
                                                <span class="btn bs btn-outline-secondary btn-sm w-100">Undefined</span>
                                            @endif
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <!-- Google Map JS -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
	<script src="{{ URL::asset('js/gmap.min.js') }}"></script>
	<script src="{{ URL::asset('js/map-script.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ URL::asset('js/active.js') }}"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>
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
