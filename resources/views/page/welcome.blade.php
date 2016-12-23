@extends('main')

@section('title')
    Laravel Blog | Homepage
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12 ">
                <div class="jumbotron">
                    <h1>Welcome to my blog!</h1>
                    <p class="lead" id="news">Thank you for visiting. This is my latest test website built with laravel. Please read my latest posts.</p>
                    <p><a class="btn btn-primary btn-lg" href="{{route('posts.index')}}" role="button">Latest post</a></p>
                    <div id="fine_print">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut commodi, consequuntur dolorem nulla quisquam! Ab aspernatur dolorem est impedit ipsam magnam maxime odit, quae quaerat sit? Provident, quia ut!</p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, est harum nam obcaecati odio pariatur provident repellendus, sequi tempora totam veritatis voluptatibus. Aspernatur dolor eligendi nemo nobis quidem velit!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto aut, autem consectetur cum, deleniti dolor ex fugiat hic incidunt minus non nostrum quia quibusdam repellendus rerum similique voluptas voluptatum?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias labore natus neque nihil obcaecati. Aperiam commodi ea fugiat quisquam vero. Aliquam dolore error fugit hic officia sapiente sint veniam vitae.
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        @foreach($posts as $post)
                            <div class="post">
                                <div id="title">
                                   <h3>{{$post->title}}</h3>
                                   <div id="body">
                                   <p>{{substr(strip_tags($post->body),0,400)}} {{strlen(strip_tags($post->body))>400? "...":""}}</p>
                                   <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                                 </div>
                            </div>
                        </div>
                       <div class="hr"><hr></div>
                       @endforeach
                       </div>
                    </div>
               </div>
        </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::to('src/js/jquery.easing.1.3.js')}}"></script>
@endsection

