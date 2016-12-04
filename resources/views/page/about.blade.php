@extends('main')

@section('title')
    Laravel Blog - About me
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>About Me</h1>
         <p>Name:   {{$data['fullname']}}</p>
        <p>Email: {{$data['email']}}</p>
        </div>
    </div>
@endsection
