@extends('layouts.app')

@section('content')
<form method="POST">
    @csrf
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Created At</label>
      <input type="hidden" name="created_at" value="<?php echo time(); ?>">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection