@extends('main')

@section('title')
    Laravel Blog - Contact me
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
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <form action="{{route('pages.contact')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" id="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                </div>

                <button class="btn btn-success" >Send Message</button>
            </form>
        </div>
    </div>
@endsection