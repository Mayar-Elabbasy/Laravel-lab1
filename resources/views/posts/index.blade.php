@extends('layouts.app')
    

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 center-block">
        <a class="btn btn-success m-5 col-4 p-3 font-weight-bold float-left"
             href="{{route('posts.create')}}">Create Post</a>
            <table class="table m-5 bg-light">
          
               <thead class="bg-info">
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
                    <td colspan="2" class="font-weight-bold border border-primary">
                        {{$post->title }}</td>
                    <td colspan="2" class="border border-primary">
                        {{$post->created_at}}</td>
                    <td colspan="4" class="border border-primary">
                        {{ $post->user? $post->user->name : 'not exist'}}</td>
                    <td class="border border-primary">
                        <a class="btn btn-info font-weight-bold border border-primary"
                          href="{{route('posts.show',['post' => $post->id])}}">View</a></td>
                    <td class="border border-primary">
                        <a class="btn btn-primary font-weight-bold border border-primary"
                        href="{{route('posts.edit',['post' => $post->id])}}">Edit</a></td>
                    <td class="border border-primary">
                        <form class="d-inline" method="post" 
                         action="{{route('posts.show',['post' => $post->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            onclick="return confirm('Do you want to delete this post?')" 
                            class="btn btn-danger font-weight-bold border border-primary">
                            Delete</button>
                        </form>
                    </td>
                 </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


