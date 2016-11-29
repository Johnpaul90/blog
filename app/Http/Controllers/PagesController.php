<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('page.welcome')->with('posts',$posts);
    }
    public function getAbout(){
        return view('page.about');
    }
    public function getContact(){
        return view('page.contact');
    }
}
