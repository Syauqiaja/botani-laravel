@extends('layouts.master')
@section('title', 'Toko')
@section('style')
<style type="text/css">

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
.toko-head{
    left: 0%;
    width: 100%;
    height: 35vh;
    background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);
}
.toko-head .title-under{
    width: 70px;
            height: 8px;
            background: rgb(24,139,52);
            background: linear-gradient(60deg, rgba(34,149,115,1) 4%, rgba(30,227,72,1) 100%);
}
.toko-title{
    height: 60%;
    background-color: white;
    box-shadow: 0px 6px 12px rgba(68, 68, 68, 0.39);
}
.social .fas.fa-star{
    color: gold;
}

.toko-button{
    margin: 15px 20px;
    color: white !important;
    background: transparent;
    border: 2px solid white;
    font-weight: 500;
    padding: 5px 10px;
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
            text-decoration: none;
}
.toko-button:hover{
    cursor: pointer;
    color: rgba(30,227,72,1) !important;
    background: white;
}
.shop-top{
    left: 0%;
}
</style>
@endsection
@section('content')

@extends('layouts.master')

@section('content')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Shop Grid</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="row justify-content-center">
                            <div class="toko-head p-4 row justify-content-between col-12">
                                <div class="toko-title col-sm-6 p-2 row">
                                    <div class="col-3">
                                        <div class="img-rect-container">
                                            <img src="{{asset('images/profiles/preview.png')}}" class="img-rect img-fluid rounded-circle">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                    <h1 class="text-dark h4">{{$toko->nama_toko}}</h1>
                                    <div class="title-under"></div>
                                    <div class="social mt-2">
                                        <span class="mr-4">Blog {{$toko->blogRating()}}<i class="fas fa-star"></i></span>
                                        <span>Produk 3.0<i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <div class="toko-button">
                                        <a>Hubungi</a>
                                    </div>
                                    <div class="toko-button">
                                        <a>Informasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-12 p-0">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a><i class="fa fa-th-large"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
                        <div class="row">
                            @forelse ($produks as $produk)
							<div class="col-lg-4 col-md-6 col-12">
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
                            @empty
                            <div class="alert alert-primary alert-dismissible fade show w-100" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <p>Maaf, toko ini belum memiliki produk</p>
                            </div>
                            @endforelse
						</div>
                    </div>
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Kategori</h3>
                                <ul class="categor-list">
                                    <li><a href="{{route('produk.showJenis',"Tanaman")}}">Tanaman</a></li>
										<li><a href="{{route('produk.showJenis',"Peralatan")}}">Peralatan</a></li>
                                </ul>
                            </div>
                            <!--/ End Single Widget -->

                            <!-- Single Widget -->
                            <div class="single-widget recent-post">
                                <h3 class="title">Recent post</h3>
                                @foreach (\App\Models\Produk::latestProduk(3) as $produk)
                                <!-- Single Post -->
                                <div class="single-post first">
                                    <div class="image">
                                        <img src="{{($produk->fotos == null)? asset('images/profiles/preview.png') : asset($produk->fotos->first()->path)}}" alt="#" class="rect-img img-fluid">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{route('produk.show', $produk->id)}}">{{$produk->nama_produk}}</a></h5>
                                        <p class="price">Rp.<span class="harga-produk">{{$produk->harga_produk}}</span></p>
                                        <ul class="reviews">
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                                @endforeach
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Toko Terpopuler</h3>
                                <ul class="categor-list">
                                    @foreach (\App\Models\Toko::popular(3) as $toko)
                                    <li><a href="{{route('toko.show', $toko->id)}}">{{$toko->nama_toko}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/ End Single Widget -->
                    </div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->

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
<script>
    $(document).ready(function(){
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
        };
        $('.harga-produk').each(function(i, obj) {
            $(this).text(numberWithCommas($(this).text()));
        });
        $("#exampleModalCenter").modal('show');
    });
</script>
@endsection

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
