@extends('main')
@section('stylesheet')


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        })
    </script>
@endsection
@section('title','Edit Comment')
    @section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Editing Comments</h1>

                <hr>


                {!! Form::model($comment,['route'=>['comment.update',$comment->id],'method'=>'PUT']) !!}


                {!! Form::label('name',"Name:") !!}
                {!! Form::text('name',null,['class'=>'form-control ','disabled'=>'disabled']) !!}

                {!! Form::label('email',"Email:") !!}
                {!! Form::text('email',null,['class'=>'form-control ','disabled'=>'disabled']) !!}

                {!! Form::label('comment',"Comment:") !!}
                {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
<br>

                {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @endsection