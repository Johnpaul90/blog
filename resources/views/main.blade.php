<!Doctype html>
<html>
<div id="content">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" >
        <link rel="stylesheet" href="{{URL::to('src/css/jquery-ui.min.css')}}" media="screen">
        <link rel="stylesheet" href="{{URL::to('src/css/style.css')}}" media="screen">
        <link rel="stylesheet" href="{{URL::to('src/css/jquery.jscrollpane.css')}}" media="screen">

        @yield('styles')
    </head>

    <body>
    @include('partials.header')
    @include('partials.message')
    <div class="container">
        @yield('content')
        <a href="#">Top of page</a>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{URL::to('src/js/jquery-ui.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::to('src/js/jquery.jscrollpane.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('src/js/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('src/js/jquery.scrollTo.js')}}"charset="utf-8"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{URL::to('src/js/script.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('scripts')
    <hr>
    <div class="panel-footer footer">
        <div class="text-center ">
            &copy;  Copyright Johnpaul, All right reserved.
        </div>
    </div>

    </body>
</div>
</html>


