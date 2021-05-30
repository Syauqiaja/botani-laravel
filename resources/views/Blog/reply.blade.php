@foreach ($replies as $reply)
<div class="single-comment left">
    <img src="{{asset($reply->user->foto_profil)}}" alt="#">
    <div class="content">
        <h4>{{$reply->user->nama}} <span>At {{$reply->updated_at}}</span></h4>
        <p><a href="{{route('user.show',$reply->parent->user->id)}}" style="color:#1CD449"><span>@</span>{{$reply->parent->user->nama}}</a>
            {!!$reply->comment!!}</p>
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
@include('Blog.reply', ["blog"=>$blog, "replies"=>$reply->replies])
@endforeach
