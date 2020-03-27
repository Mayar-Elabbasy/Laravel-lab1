@extends('layouts.app')

@section('content')

    <div class="bg-info p-2 m-4">
        <table class="table">
            <thead>
                <tr class="border border-primary">
                <h3 border border-dark text-light>Post Info</h3>
                </tr>
            </thead>
            <tbody class="border border-primary">
              <tr>
              <th class=" border border-dark text-light">Title:</th>
                  <td class=" border border-dark text-light">
                      {{$post->title}}</td>
              </tr>
              <tr>
              <th class=" border border-dark text-light">Created AT:</th>
                  <td class=" border border-dark text-light">
                              {{ $post->created_at}}</td>
              </tr>
              <tr>
              <th class=" border border-dark text-light">Description:</th>
                    <td class=" border border-dark text-light">{{$post->description}}</td>
              </tr>
     
      </table>
      </div>



      <div class="bg-info p-2 m-4">
        <table class="table">
            <thead>
                <tr class="border border-primary">
                <h3 border border-dark text-light>Post Creator Info</h3>
                </tr>
            </thead>
            <tbody class="border border-primary">
              <tr>
              <th class=" border border-dark text-light">Name:</th>
                  <td class=" border border-dark text-light">
                      {{$post->user->name}}</td>
              </tr>
              <tr>
              <th class=" border border-dark text-light">Created AT:</th>
                  <td class=" border border-dark text-light">
                              {{ $post->created_at}}</td>
              </tr>
              <tr>
              <th class=" border border-dark text-light">Email:</th>
                    <td class=" border border-dark text-light">{{$post->user->email}}</td>
              </tr>
     
      </table>
      </div>
@endsection