@extends('layouts.master')

@section('content')
    <script>var harga = parseInt("<?php echo $produk->harga_produk; ?>");</script>

    <!-- POP-UP START -->
    <div class="popup-overlay container-fluid row justify-content-center">
        <div class="popup-content my-5 col-5">
            <h1 class="h2 mb-3 mt-5 text-gray-800 text-center">Tambahkan Pesanan</h1>
            <div class="my-5 mx-3">
                <div class="pop-header my-3 row justify-content-between">
                    <div class="rect-img-container col-3">
                        <img src="https://via.placeholder.com/370x370" alt="Foto" class="img-fluid rect-img">
                    </div>
                    <h2 class="col align-self-end text-right"><small>Rp.</small><span id="total" class="h2">0</span></h2>
                </div>
                <form action="" class="">
                    <div>
                        <div class="form-group row justify-content-between my-4">
                            <h4 class="text-gray-700 col-sm-4 h4">Jumlah</h4>
                            <div class="input-group col d-flex justify-content-end">
                                <a class="btn bs btn-outline-danger mx-1 rounded-0" id="barang-minus"><i class="fas fa-minus"></i></a>
                                <input type="number" value="0" name="jumlah_barang" style="max-width:15%" class="form-control text-center">
                                <a class="btn bs btn-outline-success mx-1 rounded-0" id="barang-plus"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <input type="submit" name="checkout" id="" value="Checkout" class="btn bs w-100 btn-success my-1 p-2" style="font-size: 18px">
                        <input type="submit" name="keranjang" id="" value="Masukkan Keranjang" class="btn bs w-100 btn-primary my-1 p-2" style="font-size: 18px">
                    </div>
                </form>
            </div>
            <div class="position-absolute top-0 end-0"><a id="popClose"class="fas fa-times text-success" style="font-size: 24px"></a></div>
        </div>
    </div>
    <!-- POP-UP END -->

    <div class="container my-5 mx-3 row align-items-start">
        <div class="col-md-5 my-3">
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
                                <img src="{{URL::asset('images/'.$foto->path)}}" alt="Foto" class="img-fluid rect-img">
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
            <div class="mt-3">
                <div>
                    <a class="h3 mb-3 btn bs btn-success text-center text-success w-100" id="popOpen">
                        Dapatkan Barangmu
                    </a>
                </div>

            </div>
        </div>
        <div class="col-md my-3">
            <div>
                <h1 class="h3 mb-3 text-gray-800">Detail Produk</h1>
                <div style="font-size:16px">
                    <div class="row">
                        <div class="col-3 "><strong>Nama Barang</strong></div>
                        <div class="col">: {{$produk->nama_produk}}</div>
                    </div>
                    <div class="row">
                        <div class="col-3 "><strong>Jenis Barang</strong></div>
                        <div class="col">: {{$produk->jenis_produk}}</div>
                    </div>
                    <div class="row">
                        <div class="col-3 fw-500 fs-3"><strong>Harga</strong></div>
                        <div class="col">: Rp.{{$produk->harga_produk}}</div>
                    </div>
                    <div class="row">
                        <div class="col-3 fw-500 fs-3"><strong>Barang Tersedia</strong></div>
                        <div class="col">: {{$produk->stok}}</div>
                    </div>
                    <div>
                        <div class="mb-1 mt-3"><a id="descArrow" style="cursor: pointer;"><strong style="color:#1CD449;">Deskripsi Lainnya </strong>&nbsp
                            <i style="color:#1CD449;" class="fas fa-chevron-down" id="arrow"></i>
                        </a></div>
                        <div class="deskripsi" id="deskripsi">
                            {{$produk->deskripsi_produk}}
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
@endsection
