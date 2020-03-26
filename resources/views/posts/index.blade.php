@extends('layouts.app')
    

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 center-block">
        <a class="btn btn-success mt-5 col-6 p-3">Create Post</a>
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
                    <td colspan="2">{{ $post->title }}</td>
                    <td colspan="2" >{{ $post->created_at}}</td>
                    <td colspan="4">{{ $post->user ? $post->user->name : 'no data'}}</td>
                    <td><a class="btn btn-info"
                          href="{{route('posts.show',['post' => $post->id])}}">View</a></td>
                    <td><a class="btn btn-primary">Edit</a></td>
                    <td><a class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


