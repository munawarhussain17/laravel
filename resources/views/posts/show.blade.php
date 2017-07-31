@extends('main')

@section('title','Show Post')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p class="lead">{!!  $post->body!!}</p>
            <hr>
            <p ><strong>Tags:</strong></p>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                    @endforeach
            </div>
            <br>
            <h2 class="well text-center">Comments</h2>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($post->comments as $comment)
                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{!!  $comment->comment!!}</td>
                        <td>
                            <a href="{{route('comment.edit',$comment->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{route('comment.delete',$comment->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

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
                        Updated At:
                    </dt>
                    <dd>
                        {{date('M j, Y h:ia',strtotime($post->updated_at))}}
                    </dd>
                </dl>
<hr>
            <dl class="dl">
                <dt>
                    Category:
                </dt>
                <dd>
                    {{$post->category->name}}
                </dd>
            </dl>




            <hr>
            <dl class="dl">
                <dt>
                    Url:
                </dt>

                <dd>
                    <a href=" {{route('slug.single',$post->slug)}}">{{route('slug.single',$post->slug) }}</a>
                </dd>
            </dl>
<hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form:: open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
                    {!! Form::submit('Delete' ,['class'=>'btn btn-danger btn-block']) !!}

                </div>
            </div>
            <div class="row">
<br>
                <div class="col-sm-12">
                    {!! Html::linkRoute('posts.index',"All Posts>>",[],['class'=>'btn btn-default btn-block ']) !!}
                </div>
            </div>


        </div>
        </div>
        </div>




    @endsection
