@extends('main')
@section('title','|Blog')
@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>



    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            @foreach($posts as $post)
                <h2>{{$post->title}}</h2>
                <h4>Published: {{date('M j,Y', strtotime($post->created_at))}}</h4>
                <p>{{substr(strip_tags($post->body),0,250)}}{{strlen(strip_tags($post->body))>250 ?"...":""}}</p>
                <a href="{{route('slug.single',$post->slug)}} " class="btn btn-primary">Read More</a>

                <hr>
                @endforeach
        </div>
    </div>

    <div class="text-center">
        {{$posts->links()}}
    </div>
@endsection