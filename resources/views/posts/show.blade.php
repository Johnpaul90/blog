@extends('main')

@section('title')
   Laravel blog | View Post
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
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
                </div>
            </div>
            <div class="tags">
                @foreach($posts->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                @endforeach
            </div>
            <div id="backend-comments">
                <h3>Comments <small>{{$posts->comments()->count()}} total</small></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($posts->comments as $comment)
                        <tr>
                            <td>{{$comment->name}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{!! $comment->comment !!}</td>
                            <td><a href="{{route('comments.edit', $comment->id)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{route('blog.single',$posts->slug)}}">{{route('blog.single',$posts->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{$posts->category->name}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created at:</label>
                    <p>{{date('M j, Y  h:iA',strtotime($posts->created_at))}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated :</label>
                    <p>{{date('M j, Y h:iA', strtotime($posts->updated_at))}}</p>
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
                <div class="row">
                    <div class="col-md-12">
                        {{Html::linkRoute('posts.index', '<< See all Posts',[],['class'=>'btn btn-default btn-block btn-h1-spacing'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection