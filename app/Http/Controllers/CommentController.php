<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = $request->validate([
            "isi_comment" => "required"
        ]);

        $comment = new Comment;

        $comment->comment = $request->isi_comment;

        $comment->user()->associate($request->user());

        $blog = Blog::findOrMissing($request->id_blog);

        $blog->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $request->validate([
            "isi_comment" => "required"
        ]);

        $reply = new Comment();

        $reply->comment = $request->get('isi_comment');

        $reply->user()->associate($request->user());

        $reply->id_parent = $request->get('id_parent');

        $blog = Blog::findOrMissing($request->get('id_blog'));

        $blog->comments()->save($reply);

        return back();

    }
}
