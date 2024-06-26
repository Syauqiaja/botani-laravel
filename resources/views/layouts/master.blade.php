<?php

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Botani | @yield('title')</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{asset('images/logo.png')}}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.min.css') }}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.fancybox.min.css') }}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ URL::asset('css/themify-icons.css') }}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/niceselect.css') }}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/flex-slider.min.css') }}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl-carousel.css') }}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.min.css') }}">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    @yield('style')
    <script src="https://kit.fontawesome.com/ba28014178.js" crossorigin="anonymous"></script>

</head>
<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->

		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="{{route('home')}}"><img src="{{asset('images/nerfed-logo.png')}}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form" action="{{route('produk.search')}}" method="POST">
                                    @csrf
									<input type="text" placeholder="Cari di sini..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select id="searchCat">
                                    <option value="">Semua</option>
									<option value="Tanaman">Tanaman</option>
									<option value="Peralatan">Peralatan</option>
								</select>
                                <form action="{{route('produk.search')}}" method="POST" id="search-form">
                                    @csrf
									<input name="search" placeholder="Cari di sini..." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
                                    <input type="hidden" name="category" value="" id="search-category">
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar profile">

                                <a class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                                @if (!Auth::guest())
                                <div class="profile-item">
                                    <div class="rect-img-container w-50 h-50 mx-auto mb-3">
                                        <img src="{{asset(Auth::user()->foto_profil)}}" alt="Foto" class="img-fluid rect-img h-100 w-100" id="preview"
                                        style="background-color: @if(strpos(Auth::user()->foto_profil,'male-')) #c7ccf5; @elseif(strpos(Auth::user()->foto_profil,'female-')) #f5c7cf; @else white; @endif border-radius: 50%">
                                    </div>
                                    <h1 class="h5 mb-3 text-gray-800 text-center">{{strtok(Auth::user()->nama, " ")}}</h1>
                                    <hr>
                                    <div class="bottom mt-4 mb-0">
										<a href="{{route('user.show',Auth::user()->id)}}" class="btn animate btn-profile">Profil</a>
									</div>
                                    <div class="bottom mt-0">
                                        <a href="{{route('user.riwayat')}}" class="btn animate btn-profile">Riwayat Pembelian</a>
									</div>
                                    @if (Auth::user()->role == 2)
                                    <div class="bottom mt-0">
                                        <a href="{{route('toko.show', Auth::user()->toko->id)}}" class="btn animate btn-profile">Toko Saya</a>
									</div>
                                    <div class="bottom mt-0">
                                        <a href="{{route('toko.manage')}}" class="btn animate btn-profile">Manage Toko</a>
									</div>
                                    @endif

									<div class="bottom mt-4"><form method="POST" action="{{ route('logout') }}">@csrf
										<button type="submit" href="checkout.html" class="btn animate w-100 final">Keluar</button>
                                    </form></div>
								</div>
                                @else
                                <div class="profile-item text-center">
                                    <div class="rounded-circle"> <i class="fas fa-user" style="font-size: 400%"></i></div>
                                    <small>Anda belum masuk</small>
                                    <hr>
                                    <div class="bottom mt-0">
                                        <a href="{{route('login')}}" class="btn animate btn-profile">Masuk</a>
									</div>
                                    <div class="bottom mt-0 final">
                                        <a href="{{route('register')}}" class="btn animate btn-profile w-100 rounded-0 btn-success">Daftar</a>
									</div>
								</div>
                                @endif
								<!--/ End Shopping Item -->
							</div>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
                                    [Belum Tersedia]
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>KATEGORI</h3>
								<ul class="main-category dropdown">
									<li><a href="#">New Arrivals <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="sub-category">
											<li><a href="#">accessories</a></li>
											<li><a href="#">best selling</a></li>
											<li><a href="#">top 100 offer</a></li>
											<li><a href="#">sunglass</a></li>
											<li><a href="#">watch</a></li>
											<li><a href="#">man’s product</a></li>
											<li><a href="#">ladies</a></li>
											<li><a href="#">westrn dress</a></li>
											<li><a href="#">denim </a></li>
										</ul>
									</li>
									<li class="main-mega"><a href="#">best selling <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="mega-menu">
											<li class="single-menu">
												<a href="#" class="title-link">Shop Kid's</a>
												<div class="image">
													<img src="https://via.placeholder.com/225x155" alt="#">
												</div>
												<div class="inner-link">
													<a href="#">Kids Toys</a>
													<a href="#">Kids Travel Car</a>
													<a href="#">Kids Color Shape</a>
													<a href="#">Kids Tent</a>
												</div>
											</li>
											<li class="single-menu">
												<a href="#" class="title-link">Shop Men's</a>
												<div class="image">
													<img src="https://via.placeholder.com/225x155" alt="#">
												</div>
												<div class="inner-link">
													<a href="#">Watch</a>
													<a href="#">T-shirt</a>
													<a href="#">Hoodies</a>
													<a href="#">Formal Pant</a>
												</div>
											</li>
											<li class="single-menu">
												<a href="#" class="title-link">Shop Women's</a>
												<div class="image">
													<img src="https://via.placeholder.com/225x155" alt="#">
												</div>
												<div class="inner-link">
													<a href="#">Ladies Shirt</a>
													<a href="#">Ladies Frog</a>
													<a href="#">Ladies Sun Glass</a>
													<a href="#">Ladies Watch</a>
												</div>
											</li>
										</ul>
									</li>
									<li><a href="#">accessories</a></li>
									<li><a href="#">top 100 offer</a></li>
									<li><a href="#">sunglass</a></li>
									<li><a href="#">watch</a></li>
									<li><a href="#">man’s product</a></li>
									<li><a href="#">ladies</a></li>
									<li><a href="#">westrn dress</a></li>
									<li><a href="#">denim </a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
													<li class="active mr-0"><a href="{{url('/')}}">Beranda</a></li>
													<li class="mr-0"><a href="{{route('produk.showList')}}">Produk</a></li>


													<li class="mr-0"><a href="#">Blogtani<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
                                                            <li><form action="{{route('blog.list')}}" method="POST" id="gotoBlogList"> @csrf
                                                                <input type="hidden" name="search" value="">
                                                                <a type="submit" id="searchBlog">Blogtani</a>
                                                            </form></li>
                                                            <li><a href="{{route('blog.create')}}">Buat Blogtani</a></li>
														</ul>
													</li>
													<li class="mr-0"><a href="{{route('contact')}}">Tentang</a></li>
                                                    @auth
                                                        @if(Auth::user()->role == 3)
                                                        <li class="mr-0"><a href="{{route('admin.user')}}">Admin Page</a></li>
                                                        @endif
                                                    @endauth
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

    @yield('content')


	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{asset('images/nerfed-logo.png')}}" alt="#"></a>
							</div>
							<p class="text">Botani adalah sebuah website marketplace yang berfungsi untuk membantu orang-orang yang ingin menjual tanaman
                                serta memberikan edukasi lebih untuk perawatan masing-masing tumbuhan tersebut.
                            </p>
							<p class="call">Ingin bertanya? Hubungi kami 24/7<span><a href="tel:123456789">+6281234869493</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Touch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Jl.Kapi Janula Raya 15D/5</li>
									<li>Sawojajar 2. Malang, Jawa Timur, Indonesia.</li>
									<li>info@botani.com</li>
									<li>+6281234869483</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
	<!-- Jquery -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
	<!-- Popper JS -->
	<script src="{{ URL::asset('js/popper.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<!-- Color JS -->
	<script src="{{ URL::asset('js/colors.js') }}"></script>
	<!-- Slicknav JS -->
	<script src="{{ URL::asset('js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ URL::asset('js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ URL::asset('js/magnific-popup.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{ URL::asset('js/waypoints.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ URL::asset('js/finalcountdown.min.js') }}"></script>
	<!-- Nice Select JS -->
	<script src="{{ URL::asset('js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ URL::asset('js/flex-slider.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ URL::asset('js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ URL::asset('js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{ URL::asset('js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ URL::asset('js/active.js') }}"></script>

    <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('js/demo/chart-pie-demo.js') }}"></script>
    <script>
    $(document).ready(function(){
        $(".btnn").on('click', function(){
            $("#search-category").val($("#searchCat").val());
            $("#search-form").submit();
        })
        $("#searchBlog").on('click', function(){
            $("#gotoBlogList").submit();
        });
    });
    </script>
    @yield('script')
</body>
</html>
