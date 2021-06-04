@extends('layouts.master')

@section('style')
    <style>
.card {
    padding: 20px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
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
								<li><a href="{{route('home')}}">Beranda<i class="ti-arrow-right"></i></a></li>
								<li ><a href="{{route('produk.showList')}}">Produk<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{route('produk.show', $produk->id)}}">Detail Produk</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
    <script>var harga = parseInt("<?php echo $produk->harga_produk; ?>");</script>

    <div class="bs modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="bs modal-dialog modal-dialog-centered" role="document">
          <form action="{{route('pemesanan.store')}}" class="bs modal-content" method="POST">
            @csrf
            <div class="bs modal-header">
              <h5 class="bs modal-title" id="exampleModalLongTitle">Dapatkan Barangmu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="bs modal-body">
                <div class="my-3 row justify-content-between">
                    <div class="rect-img-container col-sm-3 h-100 p-0 mx-3">
                        <img src="{{asset($fotos->first()->path)}}" alt="Foto" class="img-fluid rect-img" style="left:0%; width:100%">
                    </div>
                    <div class="col-sm-8">
                        <h3 class="h4 text-gray-800">{{$produk->nama_produk}}</h3>
                        <h2 class="align-self-end text-right"><small>Rp.</small><span id="total" class="h2">0</span></h2>
                    </div>
                </div>
                <hr>
                    <div>
                        <div class="form-group row justify-content-between my-4">
                            <h4 class="text-gray-700 col-sm-4 h4">Jumlah</h4>
                            <div class="input-group col d-flex justify-content-end">
                                <a class="btn bs btn-outline-danger mx-1 rounded-0" id="barang-minus"><i class="fas fa-minus"></i></a>
                                <input type="number" value="0" name="jumlah_barang" style="max-width:15%" class="form-control text-center">
                                <input type="hidden" value="{{$produk->harga_produk}}" name="harga">
                                <input type="hidden" value="{{$produk->id}}" name="id_produk">
                                <input type="hidden" value="{{Auth::user()->id}}" name="id_user">
                                <input type="hidden" value="{{Auth::user()->toko->id}}" name="id_toko"> <!-- Perlu diedit !-->
                                <a class="btn bs btn-outline-success mx-1 rounded-0" id="barang-plus"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-warning">Mohon perhatikan, harga di atas belum termasuk ongkir</p>
                </div>
            </div>
            <div class="bs modal-footer">
                <button type="submit" class="btn btn-primary bs rounded-0">Checkout</button>
              <button type="button" class="btn btn-outline-danger bs rounded-0" data-dismiss="modal">Batalkan</button>
            </div>
        </form>
        </div>
      </div>

    <div class="container my-5 mx-3 row align-items-start">
        <div class="col-md-5 my-3 card mr-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @forelse ($fotos as $foto)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}"
                        class="@if($loop->first) active @endif"></li>
                    @empty
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @endforelse
                </ol>
                <div class="carousel-inner">
                    @forelse ($fotos as $foto)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="rect-img-container">
                                <img src="{{URL::asset($foto->path)}}" alt="Foto" class="img-fluid rect-img">
                            </div>
                        </div>
                    @empty
                    <div class="carousel-item active">
                        <div class="rect-img-container">
                            <img src="https://via.placeholder.com/370x370" alt="Foto" class="img-fluid rect-img">
                        </div>
                    </div>
                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="mt-3 card-body">
                <div>
                    <a class="h3 mb-3 btn bs btn-success text-center text-success w-100 rounded-0" data-toggle="modal" data-target="#exampleModalCenter">
                        Dapatkan Barangmu
                    </a>
                </div>

            </div>
        </div>
        <div class="col-md my-3">
            <div>
                @if(session()->has('pesan'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <span>{{session()->get('pesan')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
                <h1 class="h3 mb-3 text-gray-800">Detail Produk</h1>
                <div style="font-size:16px">
                    <div class="row">
                        <div class="col-4 "><strong>Nama Barang</strong></div>
                        <div class="col">: {{$produk->nama_produk}}</div>
                    </div>
                    <div class="row">
                        <div class="col-4 "><strong>Jenis Barang</strong></div>
                        <div class="col">: {{$produk->jenis_produk}}</div>
                    </div>
                    <div class="row">
                        <div class="col-4 fw-500 fs-3"><strong>Harga</strong></div>
                        <div class="col">: Rp.<span id="detailharga">{{$produk->harga_produk}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4 fw-500 fs-3"><strong>Barang Tersedia</strong></div>
                        <div class="col">: {{$produk->stok}}</div>
                    </div>
                    <div>
                        <div class="mb-1 mt-3"><a id="descArrow" style="cursor: pointer;"><strong style="color:#1CD449;">Deskripsi Lainnya </strong>&nbsp
                            <i style="color:#1CD449;" class="fas fa-chevron-down" id="arrow"></i>
                        </a></div>
                        <div class="deskripsi" id="deskripsi">
                            {!!$produk->deskripsi_produk!!}
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
@endsection
@section('script')
    <script>
$(document).ready(function (){
    function tambahBarang(val) {
        var current = parseInt($("input[name='jumlah_barang']").val());
        if(val == -1 && current <= 0) return;
        $("input[name='jumlah_barang']").val(current+val);
        $("input[name='jumlah_barang']").change();
    };
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
    };
    $("#detailharga").text(numberWithCommas($("#detailharga").text()));
    $("#barang-minus").click(function(){
        tambahBarang(-1);
    });
    $("#barang-plus").click(function(){
        tambahBarang(1);
    });
    $("input[name='jumlah_barang']").change(function(){
        var current = parseInt($("input[name='jumlah_barang']").val()) * harga;
        current = numberWithCommas(current);
        $("#total").text(current);
    });

    $("#descArrow").click(function(){
        if($("#arrow").hasClass("fa-chevron-down")){
            $("#arrow").removeClass("fa-chevron-down");
            $("#arrow").addClass("fa-chevron-up");
            $('#deskripsi').addClass("d-none");
        }else{
            $("#arrow").addClass("fa-chevron-down");
            $("#arrow").removeClass("fa-chevron-up");
            $('#deskripsi').removeClass("d-none");
        }
    });
});
    </script>
@endsection
