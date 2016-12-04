@extends('main')

@section('title')
    Laravel Blog | Homepage
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-12 ">
                <div class="jumbotron">
                    <h1>Welcome to my blog!</h1>
                    <p class="lead">Thank you for visiting. This is my latest test website built with laravel. Please read my latest posts.</p>
                    <p><a class="btn btn-primary btn-lg" href="{{route('posts.index')}}" role="button">Latest post</a></p>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                        <div class="post">
                            <h3>{{$post->title}}</h3>
                            <p>{{substr($post->body,0,400)}} {{strlen($post->body)>400? "...":""}}</p>
                            <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                        </div>
                        <hr>
                    @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h3>Sidebar</h3>
            </div>
        </div>
    </div>
    </div>
@endsection

