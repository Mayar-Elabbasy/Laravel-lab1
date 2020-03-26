<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
   public function index(){
       $posts= Post::all();
       return view('posts.index',[
           'posts' => $posts, 
       ]);
   }

   public function show(){
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        return view('posts.show',[
            'post' => $post,
        ]);
    }

   


   
}
