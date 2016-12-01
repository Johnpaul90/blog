@extends('main')

@section('title')
    Laravel Blog | Login Page
@endsection


@section('content')
  <div class="row">
  	<div class="col-md-5 col-md-offset-3">
        <div class="panel panel-default">
            <div class=" panel-heading text-center"><h3>Login here</h3></div>
            <div class="panel-body">
                <form action="{{route('auth.login')}}" role="form" method="post">
                    {!!csrf_field()!!}
                    <div class="form-group{{$errors->has('email')? ' has-error':''}}">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" value="" autofocus>
                        @if($errors->has('email'))
                            <span class="help-block">
                        {{ $errors->first('email')}}
                    </span>
                        @endif

                    </div>

                    <div class="form-group{{$errors->has('password')? ' has-error':''}}">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" value="">
                        @if($errors->has('password'))
                            <span class="help-block">
                        {{ $errors->first('password')}}
                    </span>
                        @endif
                    </div>

                    <div class="checkbox">
                        <label for="checkbox">
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Log In</button>
                        </div>
                    </div>
                    <p><a href="{{route('passwords.email')}}">Forgot My Password?</a></p>
                </form>
            </div>
        </div>
        Yet to register ? <a href="{{route('auth.register')}}">Register</a>
  	</div>
  </div>
@endsection