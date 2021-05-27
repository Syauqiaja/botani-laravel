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
								<li class="active"><a href="blog-single.html">Blog Single Sidebar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
                                    @if($blog['foto'] != null)
									<div class="image">
										<img src="{{asset($blog['foto'])}}" alt="#">
									</div>
                                    @endif
									<div class="blog-detail">
										<h2 class="blog-title">{{$blog['nama_blog']}}</h2>
										<div class="blog-meta">
											<span class="author">
                                                <a href="#"><i class="fa fa-user"></i>{{strtok($user->nama, " ")}}</a>
                                                <a href="#"><i class="fa fa-calendar"></i>{{date("d/m/Y", strtotime($blog['updated_at']))}}</a>
                                                <a href="#"><i class="fa fa-comments"></i>Komentar ({{$comCount}})</a></span>
										</div>
										<div class="content">
                                            {!! $blog['isi_blog'] !!}
										</div>
									</div>
									<div class="share-social">
										<div class="row">
											<div class="col-12">
												<div class="content-tags">
													<h4>Tags:</h4>
													<ul class="tag-inner">
														<li><a href="#">[Fitur Belum Tersedia]</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
                                {{-- Start Comment Section  --}}
								<div class="col-12">
									<div class="comments">
										<h3 class="comment-title">Komentar ({{$comCount}})</h3>
                                        @forelse ($comments as $comment)
                                        @if($comment->id_parent == null)
                                        <!-- Single Comment -->
                                        <div class="single-comment">
                                                <img src="{{asset($comment->user->foto_profil)}}" alt="#">
                                                <div class="content">
                                                    <h4>{{$comment->user->nama}} <span>At {{$comment->updated_at}}</span></h4>
                                                    <p>{!!$comment->comment!!}</p>

                                                    <a class="btn reply-button"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>

                                                    <div class="reply-form d-none">
                                                        <form action="{{route('blog.reply')}}" method="POST">@csrf
                                                            <textarea name="isi_comment" placeholder=""></textarea>
                                                            <input type="hidden" name="id_parent" value="{{$comment->id}}">
                                                            <input type="hidden" name="id_blog" value="{{$blog->id}}">
                                                            <button type="submit" class="btn bs btn-success rounded-0">Kirim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                            <!-- End Single Comment -->
                                            @include('Blog.reply', ["blog"=>$blog, "replies"=>$comment->replies])
                                            @endif
                                        @empty
                                        <div class="single-comment">
                                            <h5>Belum ada komentar</h5>
                                        </div>
                                        @endforelse
									</div>
								</div>
                                {{-- End Comment Section  --}}

                                {{-- Start Comment Form  --}}
								<div class="col-12">
									<div class="reply">
										<div class="reply-head">
											<h2 class="reply-title">Tinggalkan Komentar</h2>
											<!-- Comment Form -->
                                            @if (!Auth::guest())
											<form class="form" action="{{route('blog.comment')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Nama Anda<span>*</span></label>
															<input type="text" name="" disabled value="{{Auth::user()->nama}}">
														</div>
													</div>
													<div class="col-12">
                                                        <div class="form-group">
                                                            <label>Pesan<span>*</span></label>
															<textarea name="isi_comment" placeholder=""></textarea>
														</div>
													</div>
                                                    <input type="hidden" name="id_blog" required="required"  value="{{$blog->id}}">
													<div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn">Kirim</button>
														</div>
													</div>
												</div>
											</form>
                                            @else
                                                <div class="alert alert-primary" role="alert">
                                                    <span>Mohon <a href="{{route('login')}}"><u>masuk</u></a> terlebih dahulu agar dapat berkomentar</span>
                                                </div>
                                            @endif
											<!-- End Comment Form -->
										</div>
									</div>
								</div>
                                {{-- End Comment Form  --}}
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
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
@endsection
@section('script')
<script>
$(document).ready(function(e) {
    $('.reply-button').on('click', function(e) {
        e.preventDefault();
        //locate the TD with value
        $form = $(this).next('.reply-form');
        if($form.hasClass("d-none")){
            $('.reply-form:not(.d-none)').addClass('d-none');
            $form.removeClass("d-none");
        }else{
            $form.addClass("d-none");
        }
    });
});
</script>
@endsection
