@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="post">
        <h1>{{$post->title}}</h1>
        <h1>{{$post->body}}</h1>
        @if (Auth::check() && Auth::user()->id== $post->user->id)
        <a href="{{route('post.edit',$post)}}"><button class="btn btn-primary">Edit post</button>
        <a href=""><button class="btn btn-danger">Delete post</button>
            @endif
            
    </div>
  
@endsection
    
    