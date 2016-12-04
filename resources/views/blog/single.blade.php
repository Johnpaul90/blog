@extends('main')

@section('title', "$posts->title")

@section('content')
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>{{$posts->title}}</h1>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body" style="background-color:lightgray">
                                    <p>{{$posts->body}}</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>Post Comments here</h3>
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
                                            {{Form::label('comment', 'Comment:')}}
                                            {{Form::textarea('comment', null,['class'=>'form-control'])}}
                                            {{Form::submit('Add Comment',['class'=>'btn btn-success', 'style'=>'margin-top:20px'])}}
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>

                        @foreach($posts->comments as $comment)
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{$comment->comment}} <br /><br /><br />
                                                <div class="panel-footer col-md-12">
                                                    (<strong>Posted by:</strong> {{$comment->name}})
                                                    (<strong>At:</strong>  {{date('h:iA, M j, Y',strtotime($comment->created_at))}})
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endforeach
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
             </div>
        </div>
@endsection