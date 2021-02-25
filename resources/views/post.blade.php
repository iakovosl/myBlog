@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="post">
        <h1>{{$post->title}}</h1>
        <h1>{{$post->body}}</h1>
        @if (Auth::check() && Auth::user()->id== $post->user->id)
        <a href="{{route('post.edit',$post)}}"><button class="btn btn-primary">Edit post</button>
        <a href="{{route('post.delete',$post)}}"><button class="btn btn-danger">Delete post</button>
            @endif
            <hr>
            <a href="{{route('newcomment',$post)}}">Απάντηση στο Post</a>
    </div>
  Σχόλια:
  @foreach ($post->comments as $comment)
  <p class="comment">
      <strong>{{$comment->user->name}}</strong>
      {{ $comment->comment}}
  </p>
  @endforeach
</div>
@endsection
    
    
    