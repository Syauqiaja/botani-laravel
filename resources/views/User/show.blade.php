@extends('layouts.master')
@section('title', 'Profil')
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

            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    @auth @if(Auth::user()->id == $user->id)
                    <div class="text-right">
                        <a href="{{route('user.edit',Auth::user()->id)}}" class="text-link"><i class="far fa-edit"></i> Ubah</a>
                    </div>
                    @endif @endauth
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset($user['foto_profil'])}}" alt="Admin" class="rounded-circle" width="150"
                    style="background-color: @if(strpos(Auth::user()->foto_profil,'male-')) #c7ccf5; @elseif(strpos(Auth::user()->foto_profil,'female-')) #f5c7cf; @else white; @endif">
                    <div class="mt-3">
                      <h4>{{strtok($user['nama'], " ")}}</h4>
                      {{-- <p class="text-secondary mb-3">"Hiduplah seperti tumbuhan"</p> --}}
                      <blockquote class="blockquote text-center">
                        <p class="mb-0"><small> {{$user['quote']}} </small></p>
                        <footer class="blockquote-footer"><small> {{$user['nama']}} </small></footer>
                      </blockquote>
                      <div class="text-center">
                        <div class="dropdown show">
                            <a class="btn bs btn-primary dropdown-toggle rounded-0 no-outline" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Pindah Halaman
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item active" href="{{route('user.show', $user->id)}}">Profil</a>
                              @if($user->id == Auth::user()->id)<a class="dropdown-item" href="{{route('user.riwayat')}}">Riwayat Pembelian</a>@endif
                              @if($user->toko != null)<a class="dropdown-item" href="{{route('toko.show', Auth::user()->toko->id)}}">Toko</a>@endif
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                    @if(session()->has('pesan'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <span>{{session()->get('pesan')}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    @endif

                  <div class="row mt-2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$user['nama']}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$user['email']}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user['telepon']}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if($user['jenis_kelamin'] == 'L') Laki-laki @else Perempuan @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$user['alamat']}}
                    </div>
                  </div>
                  @if($user['role']=='2')
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Toko</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="{{route('toko.show', $user->toko->id)}}" class="text-link">{{$user->toko->nama_toko}}</a>
                    </div>
                 </div>
                 @endif
                </div>
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
@endsection
