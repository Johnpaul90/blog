<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        $this->validate($request,[
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'comment'=> 'required|min:10'
        ]);
        $posts = Post::find($post_id);
        $comment = new Comment();
        $comment->name =$request->name;
        $comment->email = $request->email;
        $comment->comment =Purifier::clean($request->comment);
        $comment->approved =true;
        $comment->post()->associate($posts);

        $comment->save();

        //Session::flash('success','Comment created!');
        return redirect()->route('blog.single', [$posts->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->with('comments',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment->comment = Purifier::clean($request->comment);
        $comment->save();

        return redirect()->route('blog.single',[$comment->post->slug]);
    }

     public function delete($id){
         $comment = Comment::find($id);
         return view('comments.delete')->with('comments', $comment);
     }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id =$comment->post->id;
        $comment->delete();

        return redirect()->route('posts.show',$post_id);
    }
}
