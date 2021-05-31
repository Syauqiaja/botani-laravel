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
        <div class="container row mx-auto" style="">
        <div class="product-area shop-sidebar shop section col-lg-8 col-12">
			<div class="container p-0">
				<div class="row">
					<div class="col-12">
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
                            @forelse ($blogs as $blog)
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="{{route('blog.show', $blog->id)}}" class="rect-img-container">
											<img class="default-img img-fluid rect-img" src="{{ (!empty($blog->foto)) ? asset($blog->foto) : asset('images/profiles/preview.png') }}" alt="#">
											<img class="hover-img img-fluid rect-img" src="{{ (!empty($blog->foto)) ? asset($blog->foto) : asset('images/profiles/preview.png') }}" alt="#">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Tanggal"><i class="fas fa-calendar"></i><span>{{date("d/m/Y", strtotime($blog->updated_at))}}</span></a>
												<a title="Penulis" href="#"><i class="fas fa-store"></i><span>{{$blog->toko->nama_toko}}</span></a>
												<a title="Reviews" href="#"><i class="fas fa-grin-alt"></i><span>{{$blog->ratings_count}} reviews</span></a>
											</div>
											<div class="product-action-2">
												<a title="Add to cart" href="{{route('blog.show', $blog->id)}}">Lihat</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="{{route('blog.show', $blog->id)}}">{{$blog->nama_blog}}</a></h3>
										<div class="product-price text-right">
											<span><span class="harga-produk">{{$blog->ratingValue()}}</span><i class="fas fa-star" style="color: gold"></i></span>
                                            <span><span class="harga-produk">{{$blog->comments_count}}</span> <i class="far fa-comment" style=""></i></span>
										</div>
									</div>
								</div>
							</div>
                            @empty
                            <div class="bs modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="bs modal-dialog modal-dialog-centered" role="document">
                                  <div class="bs modal-content">
                                    <div class="bs modal-header">
                                      <h5 class="bs modal-title" id="exampleModalLongTitle">Terjadi Kesalahan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="bs modal-body text-center">
                                      Maaf, barang tidak ditemukan. <br>
                                      Barang anda tidak terdaftar dengn nama tersebut. <br>
                                      Mohon cari dengan kata kunci lain :)
                                    </div>
                                    <div class="bs modal-footer">
                                      <button type="button" class="bs btn btn-primary" data-dismiss="modal">Tutup</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endforelse
						</div>
					</div>

				</div>
			</div>
		</div>

<div class="blog-single section col-lg-4 col-12">
    <div class="container ">
        @if(session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <span>{{session()->get('pesan')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        @endif
		<div class="row">
        <div class="col-12">
            <div class="main-sidebar">
                <!-- Single Widget -->
                <div class="single-widget search">
                    <form class="form" action="{{route('blog.list')}}" method="POST"> @csrf
                        <input type="text" name="search" placeholder="Search Here...">
                        <button type="submit" class="button" href="#"><i class="fa fa-search"></i></a>
                    </form>
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
		<!-- Start Blog Single -->
    </div>
</div>
</div>
</div>
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
