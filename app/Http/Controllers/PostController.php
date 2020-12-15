<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   
    public function index(){
        // eager loading used here with(['user','likes']) 
        // we can use latest() instead of orderBy('created_at','desc') 
        $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(10);
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'body'=>'required'
        ]);

        $request->user()->posts()->create([
            'body'=>$request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}

//route model binding ==> laravel