@extends('main')

@section('title')
    Laravel Blog
@endsection
@section('content')
         <div class="row">
             <div class="col-md-12 ">
                 <div class="jumbotron">
                     <h1>Welcome to my blog!</h1>
                     <p class="lead">Thank you for visiting. This is my latest test website built with laravel. Please read my latest posts.</p>
                     <p><a class="btn btn-primary btn-lg" href="#" role="button">Latest post</a></p>
                </div>
             </div>
         </div>
     <div class="row">
         <div class="col-md-8">
             <div class="post">
                 <h3>Post Title</h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, neque rerum? A, culpa cumque dolore
                     et exercitationem expedita illo libero maiores nulla praesentium quis recusandae, saepe tempora ut vel veniam...</p>
                 <a href="" class="btn btn-primary">Read More</a>
             </div>
              <hr>
             <div class="post">
                 <h3>Post Title</h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, neque rerum? A, culpa cumque dolore
                     et exercitationem expedita illo libero maiores nulla praesentium quis recusandae, saepe tempora ut vel veniam...</p>
                 <a href="" class="btn btn-primary">Read More</a>
             </div>
             <hr>
             <div class="post">
                 <h3>Post Title</h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, neque rerum? A, culpa cumque dolore
                     et exercitationem expedita illo libero maiores nulla praesentium quis recusandae, saepe tempora ut vel veniam...</p>
                 <a href="" class="btn btn-primary">Read More</a>
             </div>
             <hr>
             <div class="post">
                 <h3>Post Title</h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, neque rerum? A, culpa cumque dolore
                     et exercitationem expedita illo libero maiores nulla praesentium quis recusandae, saepe tempora ut vel veniam...</p>
                 <a href="" class="btn btn-primary">Read More</a>
             </div>
         </div>

         <div class="col-md-3 col-md-offset-1">
          <h3>Sidebar</h3>
         </div>
     </div>
 @endsection

