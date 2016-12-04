@extends('main')

@section('title')
    Edit tags
@endsection

@section('content')
    <div class="row">

        {!! Form::model($tags, ['route'=>['tags.update', $tags->id], 'method'=>'PUT']) !!}
        <div class="col-md-6 col-md-offset-3">
            {{Form::label('name','Title:')}}
            {{Form::text('name',null, ["class"=>'form-control input-lg'])}}

            {{Form::submit('Save Changes', ['class'=>'btn btn-primary form-spacing-top'])}}

        </div>
    </div>
@endsection
