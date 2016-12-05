@extends('main')

@section('title')
    Edit the comment
@endsection
@section('styles')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menu :{
                view:{title: 'Edit', items:'cut, copy, paste'}
            }
        });
    </script>
@endsection


@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                          <h2 class="text-center space-bottom">Edit Comment</h2>
                        {{Form::model($comments,['route'=>['comments.update',$comments->id], 'method'=>'PUT'])}}
                      <div class="row">
                          <div class="col-md-6">
                              {{Form::label('name','Name')}}
                              {{Form::text('name', null,['class'=>'form-control','disabled'=>''])}}
                          </div>
                          <div class="col-md-6">
                              {{Form::label('email','Email')}}
                              {{Form::text('email', null,['class'=>'form-control', 'disabled'=>''])}}

                          </div>
                           <div class="col-md-12">
                               {{Form::label('comment','Comment',['class'=>'space-top'])}}
                               {{Form::textarea('comment', null,['class'=>'form-control'])}}

                               {{Form::submit('Edit Comment',['class'=>'btn btn-primary space-top'])}}
                           </div>
                      </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection