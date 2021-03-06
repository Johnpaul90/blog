@extends('main')

@section('title')
    Blog
@endsection

@section('content')
            <div class="row">
                        <div class="col-md-12 text-center" >
                            <h1>Blog</h1>
                        </div>
                    </div>
                    @foreach($posts as $post)
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-heading text-center">
                                                <h2>{{$post->title}}</h2>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <h5>Published: {{date('M j,Y', strtotime($post->created_at))}} at {{date('h:i A', strtotime($post->created_at))}} </h5>
                                                <p>{{substr(strip_tags($post->body),0,400)}} {{strlen(strip_tags($post->body))>400? "...":""}}</p>
                                                <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>

@endsection