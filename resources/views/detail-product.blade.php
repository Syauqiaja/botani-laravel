@extends('layouts.master')

@section('content')
    <div class="container my-5 mx-3 row">
        <div class="col-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner mt-5">
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
        </div>
        <div class="col">
            <h4>Deskripsi Produk</h4>

        </div>
    </div>
@endsection
