@foreach ($replies as $reply)
<div class="single-comment left">
    <img src="{{asset($reply->user->foto_profil)}}" alt="#">
    <div class="content">
        <h4>{{$reply->user->nama}} <span>At {{$reply->updated_at}}</span></h4>
        <p><a href="{{route('user.show',$reply->parent->user->id)}}" style="color:#1CD449"><span>@</span>{{$reply->parent->user->nama}}</a>
            {!!$reply->comment!!}</p>
            <a class="btn reply-button"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
            <div class="reply-form d-none">
                <form action="{{route('blog.reply')}}" method="POST">@csrf
                    <textarea name="isi_comment" placeholder=""></textarea>
                    <input type="hidden" name="id_parent" value="{{$reply->id}}">
                    <input type="hidden" name="id_blog" value="{{$blog->id}}">
                    <button type="submit" class="btn bs btn-success rounded-0">Kirim</button>
                </form>
            </div>
    </div>
</div>
@include('Blog.reply', ["blog"=>$blog, "replies"=>$reply->replies])
@endforeach
