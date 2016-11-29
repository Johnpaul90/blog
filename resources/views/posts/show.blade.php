@extends('main')

@section('title')
   Larravel blog | View Post
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{$posts->title}}</h1>
            <p class="lead">{{$posts->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{date('M j, Y  h:iA',strtotime($posts->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated :</dt>
                    <dd>{{date('M j, Y h:iA', strtotime($posts->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('posts.edit',$posts->id)}}" class="btn btn-block btn-primary">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['posts.destroy',$posts->id],'method'=>'DELETE']) !!}
                            {{Form::submit('Delete',['class'=>'btn btn-block btn-danger'])}}
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection