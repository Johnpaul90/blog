@extends('main')

@section('title')
    Create New Post
@endsection

@section('styles')
    {!! Html::style('src/css/parsley.css') !!}
    {!! Html::style('src/css/select2.min.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Create New Post</h2>
                </div>
                <hr>
                <div class="panel-body">
                    {!! Form::open(array('route'=>'posts.store', )) !!}

                    {{Form::label('title', 'Title:')}}
                    {{Form::text('title', null, array('class'=>'form-control'))}}

                    {{Form::label('slug', 'Slug:')}}
                    {{Form::text('slug', null, array('class'=>'form-control', 'minlength'=>'5', 'maxlength'=> '255') )}}

                    {{Form::label('category_id', 'Category')}}
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    {{Form::label('tags', 'Tag')}}
                    <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    {{Form::label('body', 'Post Body:')}}
                    {{Form::textarea('body', null, array('class'=>'form-control'))}}

                    {{Form::submit('Create Post', array('class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px'))}}


                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('src/js/parsley.min.js') !!}
    {!! Html::script('src/js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection