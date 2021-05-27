<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Blog.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "blog_title" => "required|max:255",
            "blog_image" => "image|max:3000",
            "blogcontent" => "required"
        ]);

        $blog = new Blog;
        $blog->user()->associate(Auth::user());
        $blog->isi_blog = $validated['blogcontent'];
        $blog->nama_blog = $validated['blog_title'];

        if(array_key_exists('blog_image', $validated)){
            $ext = $validated['blog_image']->getClientOriginalExtension();
            $nama = md5($validated['blog_title'].time()).'.'.$ext;
            $path = $validated['blog_image']->move('images\blogs',$nama);
            $blog->foto = $path;
        }
        $blog->save();
        return redirect('blogs/'.$blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function countComments(Collection $comments){
        $count = $comments->count();
        foreach($comments as $comment){
            $count += $this->countComments($comment->replies);
        }

        return $count;
    }
    public function show(Blog $blog)
    {
        $user = $blog->user;
        $comments = $blog->comments;
        $commentCount = DB::table('comments')
                                        ->where('commentable_type', '=', 'App\Models\Blog')
                                        ->where('commentable_id', '=', $blog->id)
                                        ->count();

        return view('Blog.show', ["blog"=>$blog, "user" => $user, "comments" => $comments, "comCount" => $commentCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
