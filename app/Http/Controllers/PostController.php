<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mews\Purifier\Facades\Purifier;
use Session;

class PostController extends Controller
{



    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required|max:255',
            'slug'=> 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'tags'=>'required',
            'featured_image'=>'sometimes|image',
            'body'=>'required'
        ]);


        $post= new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags,false);

        Session::flash('success','The blog post was successfully saved!');
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('posts', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        $categories = Category::all();
        $cats=[];
        foreach($categories as $category){
            $cats[$category->id]=$category->name;
        }
        $tags =Tag::all();
        $tgs=[];
        foreach($tags as $tag){
            $tgs[$tag->id]=$tag->name;
        }
        return view('posts.edit')->with('posts',$post)->with('categories',$cats)->with('tags',$tgs);
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
        $post = Post::find($id);
                    $this->validate($request,[
                'title'=>'required|max:255',
                'slug'=> "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category'=>'integer',
                'featured_image'=>'image',
                'body'=>'required'
            ]);

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldfilename = $post->image;
            $post->image = $filename;

            Storage::delete($oldfilename);
        }


        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags,true);
        }else{
            $post->tags()->sync([]);
        }


        Session::flash('success','Post successfully updated');
        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success', 'Post sccessfully deleted');
        return redirect()->route('posts.index');
    }
}
