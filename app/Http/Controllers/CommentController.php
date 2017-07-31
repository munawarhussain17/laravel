<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Session;
use App\Comment;
use Purifier;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        $post=Post::find($post_id);
        //
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required',
           'comment'=>'required'
        ]);
        $comment=new Comment();


        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=Purifier::clean($request->comment);
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('success',"Comment posted Successfully");
        return redirect()->route('slug.single',$post->slug);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comment=Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $comment=Comment::find($id);
        $this->validate($request,[
           'comment'=>'required'
        ]);
        $comment->comment=Purifier::clean($request->comment);
        $comment->save();
        Session::flash('success',"The Comment Edited Successfully");
        return redirect()->route('posts.show',$comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $comment=Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }
    public function destroy($id)
    {
        //
        $comment=Comment::find($id);
        $comment->delete();
        Session::flash('success',"The post Deleted Successfully.");
        return redirect()->route('posts.show',$comment->post->id);
    }
}
