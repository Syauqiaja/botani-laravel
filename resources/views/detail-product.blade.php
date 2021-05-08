@extends('layouts.master')

@section('content')
    <script>var harga = parseInt("<?php echo $harga; ?>");</script>
    <div class="container my-5 mx-3 row align-items-start">
        <div class="col-md-5 my-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="rect-img-container">
                            <img src="https://via.placeholder.com/370x370" alt="Foto" class="img-fluid rect-img">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="rect-img-container">
                            <img src="https://via.placeholder.com/370x370" alt="Foto" class="img-fluid rect-img">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="rect-img-container">
                            <img src="https://via.placeholder.com/370x370" alt="Foto" class="img-fluid rect-img">
                        </div>
                    </div>
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
                <form action="" class="">
                    <div class="input-group mx-auto mt-3 row" >
                        <h1 class="h5 text-gray-800 col-sm-2 input-group-text bg-white"> &nbsp Rp.</h1>
                        <input type="text" name="total_harga" disabled class="form-control col-sm-8 border-0 bg-white mx-3" value="0">
                    </div>
                    <div>
                        <div class="input-group mt-3">
                            <a class="btn bs btn-outline-danger mx-1" id="barang-minus"><i class="fas fa-minus"></i></a>
                            <input type="number" value="0" name="jumlah_barang" style="max-width:15%" class="rounded form-control text-center">
                            <a class="btn bs btn-outline-success mx-1" id="barang-plus"><i class="fas fa-plus"></i></a>

                            <input type="submit" name="submit" id="" value="Checkout" class="btn bs btn-success mx-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md my-3">
            <div>
                <h1 class="h3 mb-3 text-gray-800">Detail Produk</h1>
                <div style="font-size:16px">
                    <div class="row">
                        <div class="col-3 "><strong>Nama Barang</strong></div>
                        <div class="col">: Kembang Janda Bolong</div>
                    </div>
                    <div class="row">
                        <div class="col-3 "><strong>Famili</strong></div>
                        <div class="col">: Daun Lebar</div>
                    </div>
                    <div class="row">
                        <div class="col-3 fw-500 fs-3"><strong>Habibat</strong></div>
                        <div class="col">: Daerah Panas</div>
                    </div>
                    <div class="row">
                        <div class="col-3 fw-500 fs-3"><strong>Harga</strong></div>
                        <div class="col">: Rp.{{$harga}}</div>
                    </div>
                    <div class="row">
                        <div class="col-3 fw-500 fs-3"><strong>Barang Tersedia</strong></div>
                        <div class="col">: 50</div>
                    </div>
                    <div>
                        <div class="mb-1 mt-3"><strong>Deskripsi Lainnya </strong>&nbsp<span ><i style="color:#1CD449" class="fas fa-chevron-down"></i></div>
                        <div class="deskripsi" id="deskripsi">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique voluptatem impedit doloribus odit, repellendus vero enim quae sed? Obcaecati quibusdam placeat dolorem magnam soluta non incidunt aut quia ipsum nobis.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, mollitia temporibus? Repellendus, magnam. Architecto labore quis tempore, rem temporibus non? Voluptas eos ea at fuga consequatur. Velit veniam tenetur blanditiis.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus minima commodi provident autem iure saepe iusto dolore eum voluptas fugit, tenetur non rerum maiores culpa beatae nostrum velit pariatur perspiciatis?</p>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero quaerat dolor architecto reiciendis suscipit, quidem nisi sit, nobis laboriosam harum officiis. Neque distinctio, accusantium in libero dolor beatae sit aut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
@endsection
