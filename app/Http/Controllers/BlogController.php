<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug','=', $slug)->first();
        return view('blog.single')->with('posts',$post);

    }
    public function getIndex(){
        $post = Post::paginate(6);
        return view('blog.index')->with('posts',$post);
    }
}
