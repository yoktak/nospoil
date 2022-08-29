@extends('layouts.app')

@section('content')
<div class='post'>
    <h4 class='username'>{{$post->user->name}}</h4>
    <p class='body'>{{ $post->body }}</p>
    <div class='img'>
        @if(isset($post->image_path))
          <img src="{{ $post->image_path }}">
        @endif
    </div>
    <p class='comic'>{{ $post->comic->title }}</p>
    <p class='type'>
        @if($post->type===0)
            単行本
        @else
            雑誌
        @endif
    </p>
    <p class='episode'>{{ $post->episode }}
        @if($post->type===0)
            巻
        @else
            話
        @endif
    </p>
</div>
<div class='likes'>
    @if(!isset($like))
        <form action = "/like/{{ $post->id }}" method="POST">
            @csrf
    @else
        <form action = "/unlike/{{ $post->id }}" method='POST'>
            @csrf
            @method('PUT')
    @endif
            <input type='hidden' name='post_id' value='{{ $post->id }}'/>
            <input type='submit' name='like' value='いいね{{ $post->likes->count() }}'/>
        </form>
</div>
<div class='edit'>
    @if(Auth::id() == $post->user->id)
        <a href='/posts/{{ $post->id }}/edit'>[edit]</a>
    @endif
</div>
<div class='delete'>
    @if(Auth::id() == $post->user->id)
        <form action="/delete/{{ $post->id }}" method="post" style="display:inline">
            @csrf
            <button type="submit">delete</button> 
        </form>
    @endif
</div>
<div class='comments'>
    <a href='/posts/{{ $post->id }}/comments/create'>[comment]</a>
    @foreach ($comments as $comment)
        <div class='partition'><p>---------------------------</p></div>
        <div class='comment'>
            <div class='username'>
                <p>{{ $comment->user->name }}</p>
            </div>
            <div class='body'>
                <h5>{{ $comment->body }}</h5>
            </div>
        </div>
    @endforeach
</div>
@endsection