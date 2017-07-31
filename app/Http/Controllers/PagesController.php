<?php


namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Post;
use Mail;



class PagesController extends Controller{

public function getAbout(){
	$degree='bcs';



 
	
	return view('pages.about')->withDegree($degree);

}
public function getIndex(){


    $posts=Post::orderBy('id','desc')->paginate(5);
    return view('pages.welcome')->withPosts($posts);


}
public function getContact(){


	return view('pages.contact');

	
}
public function postcontact(Request $request)

{
    $this->validate($request,[
       'message'=>'required|max:240|min:3',
       'subject'=>'required|max:240|min:3',
       'email'=>'required|email'
    ]);

    $data=[
        'email'=>$request->email,
        'subject'=>$request->subject,
        'body'=>$request->message
    ];

Mail::send('emails.contact',$data,function($message) use($data){

    $message->from($data['email']);
    $message->to('munawar.hussain17@gmail.com');
    $message->subject($data['body']);

});
    Session::flash('success',"Email sent Successfully.");
    return redirect()->route('blog.index');

}

}



?>