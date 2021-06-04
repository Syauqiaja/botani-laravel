@extends('layouts.master')
@section('title', "Tentang")
@section('content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Mengenal Startup Botani</h4>
									<h3>AL KISAH</h3>
								</div>
								<p>
                                    Website botani ini adalah karya anak bangsa yang menuangkan ide-ide cemerlang mereka pada media digital.
                                    Ini bermula ketika 3 mahasiswa Universitas Negeri Malang yang sedang menjalani tugas besar matakuliah Pemrograman Web.
                                    Mereka saling berdikusi tentang apa yang ingin mereka ciptakan.
                                </p> <br>
                                <p>Bukan hanya sebagai penggugur kewajiban, atau pemenuhan tugas. Tapi, mereka mencari inovasi baru yang dapat berguna bagi seluruh kalangan masyarakat.
                                    Baik sebagai tempat berbisnis, maupun belajar. Akhirnya setelah perdebatan panjang, komitmen tinggi, serta perjuangan tanpa henti, lahirlah BOTANI.
                                </p><hr>
                                <p>Oleh : Syauqi, Diaz, dan Helmi</p>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>+123 456-789-1120</li>
										<li>+522 672-452-1120</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
										<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->

	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap"></div>
	</div>
	<!--/ End Map Section -->

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
@endsection
