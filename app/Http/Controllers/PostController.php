<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
   public function index(){
       $posts= Post::all();
    //    dd($posts[0]->user);
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

    public function create(){
        $users = User::all();
        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store(){
        $request = request();
        Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'posted_by' =>  $request->posted_by,
        ]);
        return redirect()->route('posts.index');
    }

    public function edit(){
        $users = User::all();
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        return view('posts.edit',[
            'post' => $post,
            'users'=>$users,
        ]);
    }

    
 

    public function destroy(){
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');
    }
   

    public function update($postId){
        $request = request();
        $postId = $request->post;
        Post::where('id', $postId)
            ->update([
                'title' => $request->title,
                'description' =>  $request->description,
                'posted_by' =>  $request->posted_by,
            ]);
        return redirect()->route('posts.index');
    }

}



   

