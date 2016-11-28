<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{


    public function postCreate(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'body'=>'required'
        ]);

        //store in the database
        $post= new Post();
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        if (Session::has('errors')){
           return redirect()->back();
        }else{
            Session::flash('success','The blog post was successfully saved!');
            return redirect()->route('posts.show', $post->id);

        }

    }
    public function getCreate(){
        return view('posts.create');
    }

    public function getShow(){
        return view('posts.show');
    }
}
