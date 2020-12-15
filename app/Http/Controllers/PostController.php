<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   
    public function index(){
        // eager loading used here with(['user','likes']) 
        $posts = Post::with(['user','likes'])->paginate(10);
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
}
