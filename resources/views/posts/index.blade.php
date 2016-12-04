@extends('main')

@section('title')
    Laravel Blog | All Posts

@endsection

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="col-md-10">
                <h1>All Posts</h1>
            </div>
            <div class="col-md-2">
                <a href="{{route('posts.create')}}" class="btn-primary btn btn-block btn-lg btn-h1-spacing">Create New Post</a>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{$post->id}}</th>
                                        <td>{{substr($post->title,0,35)}} {{strlen($post->title)>35 ? "...":""}}</td>
                                        <td>{{substr($post->body,0,50)}} {{strlen($post->body)>50? "...":""}}</td>
                                        <td>{{date('M j, Y h:iA',strtotime($post->created_at))}}</td>
                                        <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">View</a>
                                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection