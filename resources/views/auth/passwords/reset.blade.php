@extends('main')

@section('title')
    Reset Passwords
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Password Reset</h3></div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'passwords.reset', 'method'=>'POST']) !!}
                        {{Form::hidden('token', $token)}}

                        {{Form::label('email', 'Email:')}}
                        {{Form::email('email', $email, ['class'=>'form-control'])}}

                        {{Form::label('password', 'New Password:')}}
                        {{Form::password('password', ['class'=>'form-control'])}}

                        {{Form::label('password_confirmation', 'Confirm New Password:')}}
                        {{Form::password('password_confirmation', ['class'=>'form-control'])}}

                        {{Form::submit('Reset Password',['class'=>'btn btn-primary form-spacing-top'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection