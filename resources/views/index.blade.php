@extends('layouts.master')
@section('title', "Beranda")
@section('style')
<style>
.carousel-item{
    -webkit-transform: translateZ(0); -moz-transform: translateZ(0);
}
.slide-1{
    background: url('images/slide-1.jpg');
}
.slide-2{
    background: url('images/slide-2.jpg');
}
.slide-3{
    background: url('images/slide-3.jpg');
}
.hero-slider .carousel-item .single-slider .text-inner{
    background: rgba(0, 0, 0, 0.4);
    animation-name: hero-text;
    animation-duration: 0.8s;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
    position: relative;
    opacity: 0;
}
@keyframes hero-text{
    0%{
        opacity: 0;
        top: 40%;
    }
    100%{
        opacity: 1;
        top: 0%;
    }
}
.hero-text h1{
color: #29ec5a;
}

.slide-btn {
    position: relative;
    padding-left: 0;
  }
  .slide-btn:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 100%;
    border-bottom: 3px solid #1cd449;
    transition: width .3s ease-in-out;
  }

  .slide-btn:hover:after {
    width: 93%;
  }

</style>
@endsection

@section('content')
	<!-- Slider Area -->
@if(session()->has('pesan'))
    <div class="bs modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="bs modal-dialog modal-dialog-centered" role="document">
          <div class="bs modal-content">
            <div class="bs modal-header">
              <h5 class="bs modal-title" id="exampleModalLongTitle">Selamat!!!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="bs modal-body">
                {{session()->get('pesan')}}
            </div>
            <div class="bs modal-footer">
                <a href="{{route('pemesanan.bayar', session()->get('id_pemesanan'))}}" class="bs btn btn-primary">Bayar Sekarang</a>
              <button type="button" class="bs btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
@endif
	<section class="hero-slider">

		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<!-- Single Slider -->
                <div class="single-slider slide-1">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-9 offset-lg-1 col-12 row">
                                <div class="text-inner col-8 mt-5 p-3">
                                    <div class="row">
                                        <div class="col-lg-9 col-12">
                                            <div class="hero-text">
                                                <h1><span class="text-white">Kini Telah Hadir </span>Botani</h1>
                                                <p class="text-white">E-Marketplace Tanaman Pertama di Indonesia <br> Tersedia 100+ toko tanaman hias terpercaya <br> Ratusan blog eduasi botani, serta ribuan produk siap beli</p>
                                                <div class="hero-button">
                                                    <a href="#" class="btn bs slide-btn text-white">Daftar Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/ End Single Slider -->
            </div>
            <div class="carousel-item">
                <!-- Single Slider -->
            <div class="single-slider slide-2">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-9 offset-lg-1 col-12 row">
                            <div class="text-inner col-8 mt-5 p-3">
                                <div class="row">
                                    <div class="col-lg-9 col-12">
                                        <div class="hero-text">
                                            <h1><span class="text-white">Kini Telah Hadir </span>Botani</h1>
                                                <p class="text-white">E-Marketplace Tanaman Pertama di Indonesia <br> Tersedia 100+ toko tanaman hias terpercaya <br> Ratusan blog eduasi botani, serta ribuan produk siap beli</p>
                                                <div class="hero-button">
                                                    <a href="#" class="btn bs slide-btn text-white">Daftar Sekarang</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
		  </div>
		  <div class="carousel-item">
			<!-- Single Slider -->
                <div class="single-slider slide-3">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-9 offset-lg-1 col-12 row">
                                <div class="text-inner col-8 mt-5 p-3">
                                    <div class="row">
                                        <div class="col-lg-9 col-12">
                                            <div class="hero-text">
                                                <h1><span class="text-white">Kini Telah Hadir </span>Botani</h1>
                                                <p class="text-white">E-Marketplace Tanaman Pertama di Indonesia <br> Tersedia 100+ toko tanaman hias terpercaya <br> Ratusan blog eduasi botani, serta ribuan produk siap beli</p>
                                                <div class="hero-button">
                                                    <a href="#" class="btn bs slide-btn text-white">Daftar Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/ End Single Slider -->
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
	</section>
	<!--/ End Slider Area -->

	<!-- Start Small Banner  -->
	{{-- <section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Summer travel <br> collection</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
                            <img src="{{asset('images/profiles/preview.png')}}" alt="#" class="img-600x370">
						<div class="content">
							<p>Bag Collectons</p>
							<h3>Awesome Bag <br> 2020</h3>
							<a href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-12">
					<div class="single-banner tab-height">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Flash Sale</p>
							<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Small Banner --> --}}



	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Produk Populer</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Tanaman</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Peralatan</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                            @foreach (\App\Models\Produk::latestProduk(6) as $produk)
                                            @if ($produk->jenis_produk == "Tanaman")
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{route('produk.show', $produk->id)}}">
                                                            <img class="default-img" src="{{ (!empty($produk->fotos)) ? asset($produk->fotos->first()->path) : asset('images/profiles/preview.png') }}" alt="#">
                                                            <img class="hover-img" src="{{ (!empty($produk->fotos)) ? asset($produk->fotos->first()->path) : asset('images/profiles/preview.png') }}" alt="#">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                            </div>
                                                            <div class="product-action-2">
                                                                <a title="Toko" href="{{route('toko.show', $produk->id_toko)}}">{{$produk->toko['nama_toko']}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="{{route('produk.show', $produk->id)}}">{{$produk->nama_produk}}</a></h3>
                                                        <div class="product-price">
                                                            <span>Rp.<span class="harga-produk">{{$produk->harga_produk}}</span></span>
                                                            @if($produk->jenis_produk == "Tanaman")
                                                            <span class="text-right mx-auto text-success border border-success px-1">Tanaman</span>
                                                            @else
                                                            <span class="text-right mx-auto text-primary border border-primary px-1">Peralatan</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
										</div>
									</div>
								</div>
                                <div class="tab-pane fade active" id="women" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                            @foreach (\App\Models\Produk::latestProduk(6) as $produk)
                                            @if($produk->jenis_produk == "Peralatan")
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{route('produk.show', $produk->id)}}">
                                                            <img class="default-img" src="{{ (!empty($produk->fotos)) ? asset($produk->fotos->first()->path) : asset('images/profiles/preview.png') }}" alt="#">
                                                            <img class="hover-img" src="{{ (!empty($produk->fotos)) ? asset($produk->fotos->first()->path) : asset('images/profiles/preview.png') }}" alt="#">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                            </div>
                                                            <div class="product-action-2">
                                                                <a title="Toko" href="{{route('toko.show', $produk->id_toko)}}">{{$produk->toko['nama_toko']}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="{{route('produk.show', $produk->id)}}">{{$produk->nama_produk}}</a></h3>
                                                        <div class="product-price">
                                                            <span>Rp.<span class="harga-produk">{{$produk->harga_produk}}</span></span>
                                                            @if($produk->jenis_produk == "Tanaman")
                                                            <span class="text-right mx-auto text-success border border-success px-1">Tanaman</span>
                                                            @else
                                                            <span class="text-right mx-auto text-primary border border-primary px-1">Peralatan</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->

	<!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Dari BlogTani</h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach (\App\Models\Blog::latestBlog(3) as $newblog)
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="{{asset($newblog->foto)}}" alt="#">
						<div class="content">
							<p class="date">{{date("j F, Y. l", strtotime($newblog->created_at))}}</p>
							<a href="{{route('blog.show', $newblog->id)}}" class="title">{{$newblog->nama_blog}}</a>
							<a href="{{route('blog.show', $newblog->id)}}" class="more-btn">Lanjut Membaca</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->

	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Gratis Ongkir</h4>
						<p>Dalam beberapa produk khusus</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Transaksi Aman</h4>
						<p>100% transaksi aman</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Harga Terbaik</h4>
						<p>Dapatkan beragam diskon dan penawaran khusus</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->

	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
@endsection
@section('script')
@if(session()->has('pesan'))
<script>
    $(document).ready(function(){
        $("#exampleModalCenter").modal('show');
    });
</script>
@endif
@endsection
