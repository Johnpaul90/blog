<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('pages.welcome')}}">Laravel Blog</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="{{Request::is('/') ?"active":""}} "><a href="{{route('pages.welcome')}}"> Home <span class="sr-only">(current)</span></a> </li>
                <li class="{{Request::is('blog') ?"active":""}} "><a href="{{route('blog.index')}}">Blog</a></li>
                <li class="{{Request::is('about') ?"active":""}} "><a href="{{route('pages.about')}}">About</a></li>
                <li class="{{Request::is('contact') ?"active":""}} "><a href="{{route('pages.contact')}}">Contact</a></li>
            </ul>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li> <a href="{{route('posts.index')}}">Posts</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Logout</a></li>

                            <li> <a href="#">Signup</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Signin</a></li>
                            <li role="separator" class="divider"></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container-fluid -->
</nav>
