@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>
        Σχόλιο για την ανάρτηση: {{$post->title}} (Από {{$post->user->name}})
    </h1>
    
<form action="" method="Post">
    @csrf
    <textarea name="comment" cols="30" rows="10" placeholder="Your text here" class="form-control"></textarea>
    <button class="btn btn-primary">Comment!</button>
</form>
</div>
@endsection
    