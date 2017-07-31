@extends('main')
@section('title','Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td><a href="{{route('tags.show',$tag->id)}}" >{{$tag->name}}</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-md-3 ">

            <div class="row">
                <div class="well">
                    <h2 class="text-center">
                        New Tag

                    </h2>
                    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
                    {!! Form::label('name',"Name: ") !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                    <br>
                    {!! Form::submit('Create New Tag',['class'=>'btn btn-block btn-primary']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

