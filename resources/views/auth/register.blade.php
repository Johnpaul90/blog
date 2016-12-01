@extends('main')

@section('title')
    Laravel Blog | Register Page
@endsection


@section('content')
  <div class="row">
  	<div class="col-md-5 col-md-offset-3">
        <div class="panel panel-default">
            <div class=" panel-heading text-center"><h3>Register here</h3></div>
            <div class="panel-body">
                <form action="{{route('auth.register')}}" role="form" method="post">
                    {!!csrf_field()!!}
                    <div class="form-group{{$errors->has('name')? ' has-error':''}}">
                        <label for="name">Full Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{Request::old('name')? :''}}" autofocus>
                        @if($errors->has('name'))
                            <span class="help-block">
                            {{ $errors->first('name')}}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('email')? ' has-error':''}}">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{Request::old('email')? :''}}">
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

                    <div class="form-group{{$errors->has('password_confirmation')? ' has-error':''}}">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="">
                        @if($errors->has('password_confirmation'))
                            <span class="help-block">
                                {{ $errors->first('password_confirmation')}}
                            </span>
                        @endif
                    </div>
                     <div class="panel-footer">
                         <div class="form-group">
                             <button type="submit" class="btn btn-primary ">Create Account</button>
                         </div>
                     </div>
                </form>
            </div>
        </div>
        Already Registered? <a href="{{route('auth.login')}}">Login!</a>
  	</div>
  </div>
@endsection