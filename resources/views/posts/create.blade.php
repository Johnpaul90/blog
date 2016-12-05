@extends('main')

@section('title')
    Create New Post
@endsection

@section('styles')
    {!! Html::style('src/css/parsley.css') !!}
    {!! Html::style('src/css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
           selector: 'textarea',
            plugins: 'link code lists emoticons',

        });

    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Create New Post</h2>
                </div>
                <hr>
                <div class="panel-body">
                    {!! Form::open(array('route'=>'posts.store', 'files'=>true )) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('title', 'Title:')}}
                            {{Form::text('title', null, array('class'=>'form-control'))}}
                        </div>
                        <div class="col-md-6">
                            {{Form::label('slug', 'Slug:')}}
                            {{Form::text('slug', null, array('class'=>'form-control', 'minlength'=>'5', 'maxlength'=> '255') )}}

                        </div>
                        <div class="col-md-6">
                            {{Form::label('category_id', 'Category',['class'=>'space-top'])}}
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-6">
                            {{Form::label('tags', 'Tag',['class'=>'space-top'])}}
                            <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    {{Form::label('featured_image', 'Upload Image',['class'=>'space-top'])}}
                    {{Form::file('featured_image',['class'=>'form-control'])}}

                    {{Form::label('body', 'Post Body:',['class'=>'space-top'])}}
                    {{Form::textarea('body', null, array('class'=>'form-control'))}}

                    {{Form::submit('Create Post', array('class'=>'btn btn-success ', 'style'=>'margin-top:20px'))}}


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