<?php

namespace App\Http\Controllers;
use Purifier;
use Session;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;



use Illuminate\Support\Facades\Auth;




class PostController extends Controller
{
    /**
     *
    public function __construct()
    {
    $this->middleware('guest')->except('logout');
    }
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
        if (Auth::check()) {

            $posts = Post::orderBy('id', 'desc')->paginate(5);
            return view('posts.index')->withPosts($posts);
        }
        else{  // return \App::call('App\Http\Controllers\BlogController@getindex');
            return \Redirect::route('blog.index');

        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create form in create blade and view return and store in next function
        //and validate //save it
        $categories=Category::all();
        $tags=Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        //store in db
        //and save and redirect


        $this->validate($request,array(
            'title'=>'required|max:255',

            'category_id'=>'required|integer',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug'
            ));


        $post=new Post;


        $post->title=Purifier::class($request->title);
        $post->body=Purifier::clean($request->body);
        $post->category_id=Purifier::class($request->category_id);
        $post->slug=$request->slug;
        $post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success','The post has submitted successfully. Thanks');
        return redirect()->route('posts.show',$post->id);





    }

    /**
     * Display the specified resource.
     * udr le kr jana . jidr purifer ka tag add krte hein. wo file jis ne provider wagira add KARTE AA?
     * YES!
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a single post serach with id

        $post= Post::find($id);


        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //first find post and create view
        $post=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        //same as store but a little change and input method
        $post=Post::find($id);
        $tags=Tag::find($id);

        if($request->slug==$post->slug){
            $this->validate($request,array(
                'title'=>'required|max:255',
                'body'=>'required',

            ));
        }
        else {

            $this->validate($request,array(
                'title'=>'required|max:255',
                'body'=>'required',
                'category_id'=>'required|integer',
                'slug'=>'required|min:5|max:255|alpha_dash|unique:posts,slug'
            ));
        }

        $post= Post::find($id);


        $post->title=Purifier::clean($request->input('title'));
        $post->body=Purifier::clean($request->input('body'));
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success','The post has updated successfully. Thanks');
        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // crete a little form in show delete and then submit
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success',"The Post Deleted Successfully");
        return redirect()->route('posts.index');
    }
}
