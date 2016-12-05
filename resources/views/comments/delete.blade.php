@extends('main')

@section('title')
    Delete comment
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMMENT ?</h1>
            <p>
                <strong>Name:</strong>{{$comments->name}} <br />
                <strong>Email:</strong>{{$comments->email}}<br />
                <strong>Comment:</strong>{!! $comments->comment !!}
            </p>
            {{Form::open(['route'=>['comments.destroy',$comments->id], 'method'=>'DELETE'])}}
            {{Form::submit('YES DELETE',['class'=>'btn btn-danger'])}}

            {{Form::close()}}
        </div>
    </div>
@endsection