@extends('main')
@section('title','| New Post')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

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
<h1>Create New Post</h1>
<hr>
{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'' ]) !!}
    {{Form::label('title','Title:')}}
    {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}

    {{Form::label('slug','Slug:')}}
    {{Form::text('slug',null,array('class'=>'form-control','required'=>'','munlength:5','maxlength'=>'255'))}}


    {{Form::label('category_id','Category:')}}
    <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
    </select>


    {{Form::label('tags','Tag:')}}
    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>
    {{Form::label('body','Post Body:')}}
    {{Form::textarea('body',null,array('class'=>'form-control'))}}




    {{Form::submit('Submit New Post',array('class'=> 'btn btn-lg btn-success btn-block' ,'style'=>'margin-top:20px '))}}
{!! Form::close() !!}
</div>
</div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection
