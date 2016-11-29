@extends('main')

@section('title', "$posts->title")

@section('content')
    <div class="row">
        <div class="col md-6 col-md-offset-5">
            <h1>{{$posts->title}}</h1>
            <p>{{$posts->body}}</p>
        </div>
    </div>

@endsection