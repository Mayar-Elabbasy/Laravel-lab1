@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <input type="hidden" name="created_at" value="<?php echo time(); ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">

      </textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Users</label>
      
      <select name="posted_by" class="form-control">
        @foreach($users as $user)  
       
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection