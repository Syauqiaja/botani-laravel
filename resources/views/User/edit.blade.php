@extends('layouts.master')
@section('title', 'Edit Profil')
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
.h-100.w-100{
    left: 0%;
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
form input{
     -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
     border: none !important;
     border-radius: 0px !important;
     border-bottom:1px solid #1CD449 !important;
}

form input:focus{
    outline: none;
    color: black !important;
}
</style>
<link rel="stylesheet" href="{{asset('avatar-selector.css')}}">
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
        <form action="{{route('user.update', Auth::user()->id)}}" class="row gutters-sm" method="POST">
            @csrf @method('PATCH')
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="rect-img-container w-50 h-50 mx-auto mb-3 text-center">
                                <img src="{{asset(Auth::user()->foto_profil)}}" alt="Foto" class="rect-img h-100 w-100" id="fotoPreview"
                                style="background-color: @if(strpos(Auth::user()->foto_profil,'male-')) #c7ccf5; @elseif(strpos(Auth::user()->foto_profil,'female-')) #f5c7cf; @else white; @endif border-radius: 50%">
                            </div>
                            <div class="mt-3">
                                <div class="text-center">
                                    <button type="button" class="btn bs btn-outline-primary rounded-0 mx-1" data-toggle="modal" data-target="#exampleModalCenter">
                                        Ganti Foto Profil
                                </div>
                                    </button>
                                    @error('avatar')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                    @error('foto_profil')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                    <input type="hidden" name="useAvatar" value="yes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bs" role="document">
          <div class="modal-content bs">
            <div class="modal-header bs">
              <h5 class="modal-title bs" id="exampleModalLongTitle">Foto Profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bs">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Piilh Foto</label>
                </div>
                <div class="text-secondary my-3">atau</div>
                <div class="row mx-auto">
                    <div class="col-12 p-0">
                        <div class="mx-0">Pilih Avatar
                            <small style="opacity: .9;"> (<a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>)</small>
                        </div>
                      <div class="avatar-wrapper mt-2">
                        <div class="cc-selector mt-3 text-center @if(Auth::user()->jenis_kelamin!='P') d-none @endif" id="female-avatar">
                            @for ($i = 1; $i<=10; $i++)
                                <input id="avatar-{{$i}}" type="radio" name="avatar" value="female-{{$i}}" />
                                <label class="drinkcard-cc avatar-{{$i}}" for="avatar-{{$i}}"></label>
                            @endfor
                        </div>
                        <div class="cc-selector mt-3 text-center @if(Auth::user()->jenis_kelamin!='L') d-none @endif" id="male-avatar">
                            @for ($i = 1; $i<=10; $i++)
                                <input id="avatarmale-{{$i}}" type="radio" name="avatar" value="male-{{$i}}" />
                                <label class="drinkcard-cc avatarmale-{{$i}}" for="avatarmale-{{$i}}"></label>
                            @endfor
                        </div>
                        @error('avatar')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bs">
                <button type="button" class="btn bs btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn bs btn-success" data-dismiss="modal" id="modalClose">Simpan</button>
            </div>
          </div>
        </div>
      </div>

            {{-- <form action=""> --}}
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <div class="row mt-2 mb-3">
                    <div class="col-sm-3">
                      <label for="nama"><h6 class="mb-0">Nama Lengkap</h6></label>
                    </div>
                    <input type="text" name="nama" id="nama" class="h-100 col-sm-8 text-secondary" value="{{$user->nama}}">
                </div>
                @error('nama')
                <span class="text-danger" role="alert">
                    <small><strong>{{ $message }}</strong></small>
                </span>
                @enderror
                <div class="row mb-3">
                    <div class="col-sm-3">
                      <label for="email"><h6 class="mb-0">Email</h6></label>
                    </div>
                    <input type="email" name="email" id="email" class="h-100 col-sm-8 text-secondary" value="{{$user->email}}">
                </div>
                @error('email')
                <span class="text-danger" role="alert">
                    <small><strong>{{ $message }}</strong></small>
                </span>
                @enderror
                <div class="row mb-3">
                    <div class="col-sm-3">
                      <label for="telepon"><h6 class="mb-0">Telepon</h6></label>
                    </div>
                    <input type="text" name="telepon" id="telepon" class="h-100 col-sm-8 text-secondary" value="{{$user->telepon}}">
                </div>
                @error('telepon')
                <span class="text-danger" role="alert">
                    <small><strong>{{ $message }}</strong></small>
                </span>
                @enderror
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="laki-laki" name="jenis_kelamin" value="L"
                            @if(Auth::user()->jenis_kelamin == "L") checked @endif>
                            <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="perempuan" name="jenis_kelamin" value="P"
                            @if(Auth::user()->jenis_kelamin == "P") checked @endif>
                            <label class="custom-control-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                      <label for="alamat"><h6 class="mb-0">Alamat</h6></label>
                    </div>
                    <input type="text" name="alamat" id="alamat" class="h-100 col-sm-8 text-secondary" value="{{$user->alamat}}">
                </div>
                @error('alamat')
                <span class="text-danger" role="alert">
                    <small><strong>{{ $message }}</strong></small>
                </span>
                @enderror
                <div class="row mb-3">
                    <div class="col-sm-3">
                      <label for="quote"><h6 class="mb-0">Quote</h6></label>
                    </div>
                    <input type="text" name="quote" id="quote" class="h-100 col-sm-8 text-secondary" value="{{$user->quote}}">
                </div>
                @error('quote')
                <span class="text-danger" role="alert">
                    <small><strong>{{ $message }}</strong></small>
                </span>
                @enderror
                @if($user['role']=='2')
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="toko"><h6 class="mb-0">Toko</h6></label>
                      </div>
                      <input type="text" name="toko" id="toko" class="h-100 col-sm-8 text-secondary" value="{{$user->toko->nama_toko}}">
                </div>
                @endif
                <button type="submit" class="btn bs btn-success rounded-0">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
@endsection
@section('script')
<!-- Google Map JS -->
<script>
$(document).ready(function(){
    var fotoPath = "{{asset(Auth::user()->foto_profil)}}";
    function getRadioValue(name) {
        var radios = document.getElementsByName(name);

        for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            return radios[i].value;
        }
        }
    }
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function () {
                fotoPath = reader.result;
                $("input[name='useAvatar']").val('no');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    $("input[name='avatar']").on("change", function(){
        var img = getRadioValue("avatar");
        $("input[name='useAvatar']").val('yes');
        fotoPath = "{{URL::to('images/profiles/')}}"+"/"+img+".png";
    });
    $("#modalClose").on('click', function(){
        $("#fotoPreview").attr("src", fotoPath);
        if(getRadioValue('jenis_kelamin') == "L"){
            $("#fotoPreview").css("background-color", "#c7ccf5");
        }else{
            $("#fotoPreview").css("background-color", "#f5c7cf");
        }
    });
    $("input[name='jenis_kelamin']").on('click', function(){
        if(getRadioValue('jenis_kelamin') == "L"){
            if($("#male-avatar").hasClass("d-none")){
                $("#male-avatar").removeClass("d-none");
                $("#female-avatar").addClass("d-none");
            }
        }else{
            if($("#female-avatar").hasClass("d-none")){
                $("#female-avatar").removeClass("d-none");
                $("#male-avatar").addClass("d-none");
            }
        }
    });
});
</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
	<script src="{{ URL::asset('js/gmap.min.js') }}"></script>
	<script src="{{ URL::asset('js/map-script.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ URL::asset('js/active.js') }}"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
@endsection
