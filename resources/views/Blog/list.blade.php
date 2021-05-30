@extends('layouts.master')
@section('style')
<style>
    .reply-button{
        -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        padding-left: 0px;
    }
    .reply-button:hover{
        color: #1CD449 !important;
        padding-left: 10px;
    }
    .reply-tarea{
        border: 0px;
        border-bottom:1px solid rgb(85, 95, 83);
        -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
    }
    .reply-tarea:focus{
        outline: none;
        border-bottom: 1px solid #1CD449;
    }
    .card{
        box-shadow: 0px 0px 12px #00000020;
    }
    @keyframes fadein{
        0%{
            margin-left: 50%;
            opacity: 0;
        }
        100%{
            margin-left: 0%;
            opacity: 1;
        }
    }
    .reply-form{
        animation-name: fadein;
        animation-duration: 0.5s;
        animation-fill-mode: forwards;
    }
</style>
<link rel="stylesheet" href="{{asset('rating.css')}}">
<link rel="stylesheet" href="{{asset('blogsearch.css')}}">
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
								<li class="active"><a href="blog-single.html">Blog Single Sidebar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
        <section class="product-area shop-sidebar shop section blog-single">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
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
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
                            {{--  --}}
						</div>
					</div>
                    <div class="col-lg-4 col-md-4 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="single-widget search">
								<div class="form">
									<input type="email" placeholder="Search Here...">
									<a class="button" href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget category">
								<h3 class="title">Blog Categories</h3>
								<ul class="categor-list">
									<li><a href="#">Men's Apparel</a></li>
									<li><a href="#">Women's Apparel</a></li>
									<li><a href="#">Bags Collection</a></li>
									<li><a href="#">Accessories</a></li>
									<li><a href="#">Sun Glasses</a></li>
								</ul>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget recent-post">
								<h3 class="title">Recent post</h3>
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
										<img src="https://via.placeholder.com/100x100" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>Jan 11, 2020</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>
										</ul>
									</div>
								</div>
								<!-- End Single Post -->
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
										<img src="https://via.placeholder.com/100x100" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>Mar 05, 2019</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>59</li>
										</ul>
									</div>
								</div>
								<!-- End Single Post -->
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
										<img src="https://via.placeholder.com/100x100" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>June 09, 2019</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>44</li>
										</ul>
									</div>
								</div>
								<!-- End Single Post -->
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget side-tags">
								<h3 class="title">Tags</h3>
								<ul class="tag">
									<li><a href="#">business</a></li>
									<li><a href="#">wordpress</a></li>
									<li><a href="#">html</a></li>
									<li><a href="#">multipurpose</a></li>
									<li><a href="#">education</a></li>
									<li><a href="#">template</a></li>
									<li><a href="#">Ecommerce</a></li>
								</ul>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget newsletter">
								<h3 class="title">Newslatter</h3>
								<div class="letter-inner">
									<h4>Subscribe & get news <br> latest updates.</h4>
									<div class="form-inner">
										<input type="email" placeholder="Enter your email">
										<a href="#">Submit</a>
									</div>
								</div>
							</div>
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start Blog Single -->

@endsection
@section('script')
<script>
$(document).ready(function(e) {
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    $('.reply-button').on('click', function(e) {
        e.preventDefault();
        //locate the TD with value
        $form = $(this).next('.reply-form');
        if($form.hasClass("d-none")){
            $('.reply-form:not(.d-none)').addClass('d-none');
            $('.reply-button.d-none').removeClass('d-none');
            $(this).addClass("d-none");
            $form.removeClass("d-none");
            $("textarea.reply-tarea:not(.d-none)").focus();
        }
    });
    $("input[name='rating']").on('change', function(){
        $("#ratingForm").submit();
    });
    $(".comment-button").on('click', function(e){
        e.preventDefault();
        $('html, body').animate({ scrollTop: $('#comment-section').offset().top }, 'slow');
    });
});
</script>
@endsection
