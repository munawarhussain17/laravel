@extends('main')

@section('title','Delete Post')

@section('content')

    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p><strong>Posted By:</strong>{{$comment->name}}</p>

        <p><strong>Comment:</strong>{{$comment->comment}}</p>


        {!! Form:: open(['route'=>['comment.destroy',$comment->id],'method'=>'DELETE'])!!}
        {!! Form::submit('Delete' ,['class'=>'btn btn-danger btn-block']) !!}

    </div>
    </div>
    @endsection