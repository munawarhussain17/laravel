@extends('main')
@section('title','Categories')

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
                    @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-md-3 ">

                <div class="row">
                    <div class="well">
                        <h2 class="text-center">
                            New Category

                        </h2>
                        {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                            {!! Form::label('name',"Name: ") !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        <br>
                        {!! Form::submit('Create New Category',['class'=>'btn btn-block btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    @endsection

