@extends('layouts.app')

@section('content')
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form method="POST"class="m-5 border border-dark p-2 bg-info" 
    action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label class="m-2 bg-dark text-light rounded-pill p-2 font-weight-bold">
        Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <input type="hidden" name="created_at" value="<?php echo time(); ?>">
    </div>
    <div class="form-group">
      <label class="m-2 bg-primary bg-dark text-light rounded-pill p-2 font-weight-bold" 
      for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">

      </textarea>
    </div>
    <div class="form-group">
      <label class="m-2 bg-primary bg-dark text-light rounded-pill p-2 font-weight-bold"
       for="exampleInputPassword1">Post Creator</label>
      
      <select name="posted_by" class="form-control">
        @foreach($users as $user)  
       
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>


    <button type="submit" class="btn btn-success border border-dark font-weight-bold 
            rounded-pill p-3 m-2">
      Create</button>
  </form>
@endsection