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
       

        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:posts',
            'description' => 'required|min:10',
            'posted_by' => 'required|exists:users,id',
        ],[
            'title.min' => 'The Title has minimum of 3 chars',
            'title.required' => 'Title is required, you have to fill it!',
            'title.unique' => 'Title is unique, you have to choose a different title!',
            'description.min' => 'The Description has minimum of 10 chars',
            'description.required' => 'Description is required, you have to fill it!',
            'posted_by.exists'=>'This Post Creator doesn\'t exist in the database!!!!', 
        ]);

        Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'posted_by' =>  $request->posted_by,
        ]);
        $request->only('title','description','posted_by');
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
        // @dd($request->posted_by);
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'posted_by' => 'required|exists:users,id',
        ],[
            'title.min' => 'The Title has minimum of 3 chars',
            'title.required' => 'Title is required, you have to fill it!',
            'title.unique' => 'Title is unique, you have to choose a different title!',
            'description.min' => 'The Description has minimum of 10 chars',
            'description.required' => 'Description is required, you have to fill it!',
            'posted_by.exists'=>'This Post Creator doesn\'t exist in the database!!!!', 

        ]);

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



   

