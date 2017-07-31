@extends('main')

@section('title','Show Post')
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
        {!! Form::model($post,array('route'=>array('posts.update',$post->id),'method'=>'PUT')) !!}
        <div class="col-md-8">
            {!! Form::label('title',"Title:") !!}
            {!! Form::text('title',null,array('class'=>'form-control')) !!}
            {!! Form::label('slug',"Url") !!}
            {!! Form::text('slug',null,['class'=>'form-control']) !!}
            {!! Form::label('category_id',"Category") !!}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>


            {!! Form::label('tags','Tag:')!!}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>


            {!! Form::label('body',"Body:") !!}
            {!! Form::textarea('body',null,array('class'=>'form-control')) !!}







        </div>
        <div class="col-md-4">
            <div class="well">

                <dl class="dl">
                    <dt>
                        Created At:
                    </dt>
                    <dd>
                        {{date('M j, Y h:ia',strtotime($post->created_at))}}
                    </dd>
                </dl>



                <dl class="dl">
                    <dt>
                        Created At:
                    </dt>
                    <dd>
                        {{date('M j, Y h:ia',strtotime($post->updated_at))}}
                    </dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form:: submit('Save Changes',array('class'=>'btn btn-success btn-block')) !!}

                    </div>
                </div>


            </div>
        </div>
        {!! Form::close() !!}

    </div>




@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();

    </script>
@endsection