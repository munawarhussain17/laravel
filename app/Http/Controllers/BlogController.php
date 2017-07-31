<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //
    public function getsingle($slug)

    {


        $post=Post::where('slug','=',$slug)->first();
        return view('blogs.single')->withPost($post);
    }
    public function getindex(){
        $posts=Post::paginate(3);
        return view('blogs.index')->withPosts($posts);
    }
}
