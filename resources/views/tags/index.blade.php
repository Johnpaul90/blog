@extends('main')

@section('title')
    Laravel Blog | Tags
@endsection


@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h1>Tags</h1>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <th>{{$tag->id}}</th>
                                <td><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well">
                <form action="{{route('tags.store')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name"class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create New Tag" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
