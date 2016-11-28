@extends('main')

@section('title')
    Create New Post
@endsection

@section('styles')
    {!! Html::style('src/css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <h2>Create New Post</h2>
            <hr>
            {!! Form::open(array('route'=>'posts.create', )) !!}

                {{Form::label('title', 'Title:')}}
                {{Form::text('title', null, array('class'=>'form-control'))}}

                {{Form::label('body', 'Post Body:')}}
                {{Form::textarea('body', null, array('class'=>'form-control'))}}

                {{Form::submit('Create Post', array('class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px'))}}


            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('src/js/parsley.min.js') !!}
@endsection