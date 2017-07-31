@extends('main')
@section('title',"$post->slug")
@section('stylesheet')


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        })
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>{{$post->title}}</h1>
            <p>{!!$post->body!!}</p>
            <hr>
            <p><strong>Posted In:{{$post->category->name}}</strong></p>



            <p><strong>Posted At:{{date('M j, Y h:ia',strtotime($post->created_at))}}</strong></p>
            <p><strong>Updated At:{{date('M j, Y h:ia',strtotime($post->updated_at))}}</strong></p>


        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="well text-center">All Comments</h2>
                @foreach($post->comments as $comment)
                    <strong>{{$comment->name}}</strong><p>{{$comment->created_at}}</p>

                    <p>{!!  $comment->comment!!}</p>

                    <hr>
                    @endforeach
            </div>
        </div>




    </div>
    <div class="row">
        <hr>

        <div class="col-md-8 col-md-offset-2">
            <h2 class="well text-center">Add Your Comment Here</h2>
            {!! Form::open(['route'=>['comment.store',$post->id],'method'=>'POST']) !!}
            {!! Form::label('name',"Name:") !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}

            {!! Form::label('email',"Email:") !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}

            {!! Form::label('comment',"Comment:") !!}
            {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
            <br>

            {!! Form::submit('Post Comment',['class'=>'btn btn-block btn-success']) !!}

            {!! Form::close() !!}

        </div>
    </div>
    @endsection