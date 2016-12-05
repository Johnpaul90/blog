@extends('main')

@section('title', "$posts->title")
@section('styles')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link',
            menubar: 'false'
        });
    </script>
@endsection


@section('content')
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel-body">
                    <img src="{{asset('images/'. $posts->image)}}" alt="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>{{$posts->title}}</h1>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body" style="background-color:lightgray">
                                    <p>{!! $posts->body !!}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center space-top2">
                                <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span> {{$posts->comments()->count()}} Comments </h3>
                            </div>
                            <div class="row">
                                <div id="comment-form" class="col-md-8 col-md-offset-2">
                                    {{Form::open(['route'=>['comments.store',$posts->id],'method'=>'POST'])}}
                                    <div class="row">
                                        <div class="col-md-6" >
                                            {{Form::label('name', 'Name:')}}
                                            {{Form::text('name', null,['class'=>'form-control'])}}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label('email', 'Email:')}}
                                            {{Form::text('email', null,['class'=>'form-control', 'rows'=>'5'])}}
                                        </div>
                                        <div class="col-md-12">
                                            {{Form::label('comment', 'Comment:',['class'=>'space-top'])}}
                                            {{Form::textarea('comment', null,['class'=>'form-control'])}}
                                            {{Form::submit('Add Comment',['class'=>'btn btn-success', 'style'=>'margin-top:20px'])}}
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 ">
                                @foreach($posts->comments as $comment)
                                    <div class="comment">
                                        <div class="author-info">
                                            <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=retro"}}"class="author-image">
                                            <div class="author-name">
                                                <h4> {{$comment->name}}</h4>
                                                <p class="author-time">{{date('h:iA, M jS, Y',strtotime($comment->created_at))}}  <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                                    <a href="{{route('comments.delete',[$comment->id]) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></p>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            {!! $comment->comment !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="tags">
                                @foreach($posts->tags as $tag)
                                    <span class="label label-default">{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection