@extends('main')

@section('title')
    Laravel Blog | Edit Posts
@endsection

@section('styles')
    {!! Html::style('src/css/select2.min.css') !!}
@endsection


@section('content')
    <div class="row">
        {!! Form::model($posts, ['route'=>['posts.update', $posts->id], 'method'=>'PUT']) !!}
        <div class="col-md-8">
            {{Form::label('title','Title:')}}
            {{Form::text('title',null, ["class"=>'form-control input-lg'])}}

            {{Form::label('slug','Slug:',['class'=>' form-spacing-top'])}}
            {{Form::text('slug',null, ["class"=>'form-control input-lg'])}}

            {{Form::label('category_id', 'Category',['class'=>'form-spacing-top'])}}
            {{Form::select('category_id',$categories, null,['class'=>'form-control'])}}

            {{Form::label('tags', 'Tags',['class'=>'form-spacing-top'])}}
            {{Form::select('tags[]',$tags, null,['class'=>'form-control select2-multi', 'multiple'=>'multiple'])}}


            {{Form::label('body', 'Body:',['class'=>'form-spacing-top'])}}
            {{Form::textarea('body',null, ['class'=>'form-control'])}}
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{date('M j, Y  h:iA',strtotime($posts->created_at))}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated :</label>
                    <p>{{date('M j, Y h:iA', strtotime($posts->updated_at))}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('posts.show',$posts->id)}}" class="btn btn-block btn-danger">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Save Changes',['class'=>'btn btn-block btn-success'])}}
                    </div>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    {!! Html::script('src/js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($posts->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@endsection
