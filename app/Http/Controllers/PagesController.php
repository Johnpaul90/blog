<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mews\Purifier\Facades\Purifier;
use Session;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('page.welcome')->with('posts',$posts);
    }
    public function getAbout(){
        $first= 'JohnPaul';
        $last = 'Okeke';

        $fullname = $first." ".$last;
        $email ='okeke.jp@yahoo.com';
        $data = [];
        $data['email']= $email;
        $data['fullname'] = $fullname;

        return view('page.about')->with('data', $data);
    }
    public function getContact(){
        return view('page.contact');
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $data =[
            'email'=> $request->email,
            'subject'=> $request->subject,
            'bodyMessage'=> Purifier::clean($request->message)
        ];

        Mail::send('emails.contact', $data, function($message)use($data){
            $message->from($data['email']);
            $message->to('okeke.jp@example.com');
            $message->subject($data['subject']);

        });

        Session::flash('success','Your mail was sent!');

        return redirect()->back();

    }
}
