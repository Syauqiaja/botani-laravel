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

		<!-- Start Blog Single -->
		<section class="blog-single section">
            <div class="container">
                @if(session()->has('pesan'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <span>{{session()->get('pesan')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
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
                                                <a href="{{route('user.show', $user->id)}}"><i class="fa fa-user"></i>{{strtok($user->nama, " ")}}</a>
                                                <a href="#"><i class="fa fa-calendar"></i>{{date("d/m/Y", strtotime($blog['updated_at']))}}</a>
                                                <a href="#" class="comment-button"><i class="fa fa-comments"></i>Komentar ({{$comCount}})</a>
                                                @auth
                                                @if (Auth::user()->id == $blog->user->id)
                                                <a href="{{route('blog.edit',$blog->id)}}"><i class="far fa-edit"></i>Ubah</a>
                                                <button type="button" class="text-danger mx-3" style="background:none; border:none;"  data-toggle="modal" data-target="#modalHapus">
                                                    <i class="fas fa-trash-alt text-danger"></i>Hapus
                                                </button>
                                                @endif
                                                @endauth
                                            </span>
										</div>
										<div class="content">
                                            {!! $blog['isi_blog'] !!}
										</div>
									</div>
									<div class="share-social">
										<div class="row">
											<div class="col-12">
                                                <div class="content-tags card text-center">
                                                    <div>Bagaimana menurutmu blogtani ini?</div>
                                                    <form class="cc-selector mt-3" id="ratingForm" action="{{route('blog.rate', $blog->id)}}" method="POST">@csrf
                                                            <input id="nilai-1" type="radio" name="rating" value="1" @if($rating != null)@if($rating->rating == '1') checked @endif @endif/>
                                                            <label class="drinkcard-cc nilai-1" for="nilai-1" data-toggle="tooltip" data-placement="top" title="Sangat Buruk!"></label>

                                                            <input id="nilai-2" type="radio" name="rating" value="2" @if($rating != null)@if($rating->rating == '2') checked @endif @endif/>
                                                            <label class="drinkcard-cc nilai-2" for="nilai-2" data-toggle="tooltip" data-placement="top" title="Buruk"></label>

                                                            <input id="nilai-3" type="radio" name="rating" value="3" @if($rating != null)@if($rating->rating == '3') checked @endif @endif/>
                                                            <label class="drinkcard-cc nilai-3" for="nilai-3" data-toggle="tooltip" data-placement="top" title="Cukup"></label>

                                                            <input id="nilai-4" type="radio" name="rating" value="4" @if($rating != null)@if($rating->rating == '4') checked @endif @endif/>
                                                            <label class="drinkcard-cc nilai-4" for="nilai-4" data-toggle="tooltip" data-placement="top" title="Bagus"></label>
                                                            <input id="nilai-5" type="radio" name="rating" value="5" @if($rating != null)@if($rating->rating == '5') checked @endif @endif/>
                                                            <label class="drinkcard-cc nilai-5" for="nilai-5" data-toggle="tooltip" data-placement="top" title="Sangat Bagus!"></label>
                                                    </form>
												</div>
                                                <div><small class="text-secondary"><a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></small></div>
											</div>
										</div>
									</div>
								</div>
                                {{-- Start Comment Section  --}}
								<div class="col-12" id="comment-section">
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

                                                    <div class="reply-button"><a class="btn "><i class="fa fa-reply" aria-hidden="true"></i>Balas</a></div>
                                                    <div class="reply-form d-none">
                                                        @if (Auth::user() != null)
                                                        <form action="{{route('blog.reply')}}" method="POST">@csrf
                                                            <textarea name="isi_comment" placeholder="" class="reply-tarea"></textarea>
                                                            <input type="hidden" name="id_parent" value="{{$comment->id}}">
                                                            <input type="hidden" name="id_blog" value="{{$blog->id}}">
                                                            <button type="submit" class="btn bs btn-success rounded-0">Kirim</button>

                                                        </form>
                                                        @else
                                                        <div class="alert alert-primary" role="alert">
                                                            <span>Mohon <a href="{{route('login')}}"><u>masuk</u></a> terlebih dahulu agar dapat membalas komentar</span>
                                                        </div>
                                                        @endif
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
				</div>
			</div>
		</section>

@auth
@if (Auth::user()->id == $blog->user->id)
  <!-- Modal -->
  <div class="modal fade bs" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle" aria-hidden="true">
    <div class="modal-dialog bs" role="document">
      <div class="modal-content bs">
        <div class="modal-header bs">
          <h5 class="modal-title bs" id="exampleModalLongTitle">Hapus Blog?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bs">
          Apakah anda yakin untuk mengahpus blog ini?
          Blog yang telah dihapus tidak bisa dimunculkan kembali
        </div>
        <div class="modal-footer bs">
            <form action="{{route('blog.destroy',$blog->id)}}" method="POST">@csrf @method('DELETE')
                <button type="submit" class="btn bs btn-danger">Hapus Blog</button>
            </form>
            <button type="button" class="btn bs btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endif
@endauth

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
