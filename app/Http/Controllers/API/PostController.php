<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserCollection;



class PostController extends Controller
{
    public function index(){
        // $posts =  Post::all();
        return PostResource::collection(Post::with('user')->paginate(5)); 
    }

    public function show(){
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        //check if the post does not exist in the database
        if(is_null($post)){
            return response()->json(["Error"=>"Record not found in the datatabase!! Enter a valid id ^_^"],404);
        }
        return new PostResource(Post::find(request()->post));
    }
    public function store(){
        $request = request();

        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:posts',
            'description' => 'required|min:10',
        ],[
            'title.min' => 'The Title has minimum of 3 chars',
            'title.required' => 'Title is required, you have to fill it!',
            'title.unique' => 'Title is unique, you have to choose a different title!',
            'description.min' => 'The Description has minimum of 10 chars',
            'description.required' => 'Description is required, you have to fill it!',
        ]);

        Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'posted_by' =>  $request->posted_by,
        ]);
        
    }

}
