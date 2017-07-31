@extends('main')
@section('title',"$tag->name Tag")
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tag: {{$tag->name}}<small> Used In:{{$tag->posts->count()}} Posts</small></h1>
        </div>
        <div class="col-md-2 ">
            <br>
            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-block">Edit</a>
        </div>
        <div class="col-md-2">
            <br>
            {{Form::open(['route'=>['tags.destroy',$tag->id], 'method'=>'DELETE'])}}
            {{Form::submit('Delete',['class'=>'btn btn-danger btn-block'])}}
            {{Form::close()}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class=" table table-default">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Posts</th>
                    <th>Tags</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($tag->posts as $post)
                    <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>  @foreach($post->tags as $tag)
                           <span class="label label-default">{{$tag->name}}</span>

                        @endforeach
                           </td>
                        <td ><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-xm">View</a></td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection