@extends('layouts.app')
    

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 center-block">
        <a class="btn btn-success mt-5 col-6 p-3"
             href="{{route('posts.create')}}">Create Post</a>
            <table class="table m-5 ">
               <thead>
                <tr class="border border-primary">
                  <th scope="col border border-primary" colspan="2">Title</th>
                  <th scope="col border border-primary" colspan="2">Created At</th>
                  <th scope="col border border-primary" colspan="4">Posted By</th>
                  <th scope="col" colspan="4">Actions</th>
                </tr>
              </thead>
              
                <tbody class="border border-primary">
                    @foreach($posts as $post)
                 
                    <tr>
                    <td colspan="2">{{$post->title }}</td>
                    <td colspan="2" >{{$post->created_at}}</td>
                    <td colspan="4">{{ $post->user? $post->user->name : 'not exist'}}</td>
                    <td><a class="btn btn-info"
                          href="{{route('posts.show',['post' => $post->id])}}">View</a></td>
                    <td><a class="btn btn-primary"
                        href="{{route('posts.edit',['post' => $post->id])}}">Edit</a></td>
                    <td>
                        <form class="d-inline" method="post" 
                         action="{{route('posts.show',['post' => $post->id])}}">
                         @csrf
                         @method('DELETE')
                      <button type="submit"
                       onclick="return confirm('Do you want to delete this post?')" 
                       class="btn btn-danger">Delete</button>
                </form>
                </td>
                    <!-- <td><a class="btn btn-danger"
                    href="{{route('posts.destroy',['post' => $post->id])}}">Delete</a></td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


