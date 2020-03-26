@extends('layouts.app')

@section('content')
    <div class="card m-5 bg-info" style="width: 18rem;">
        <div class="card-body m-5">
        <h5 class="card-title border border-dark text-light">{{$post->title}}</h5>
          <h5 class="card-text border border-warning text-light">
              {{ $post->created_at}}</h5>
        </div>
      </div>
@endsection