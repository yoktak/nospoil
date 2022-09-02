@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="{{ asset('/CSS/posts/show.css') }}">

<div class='post'>
    <div class='edit'>
        @if(Auth::id() == $post->user->id)
            <button onclick="location.href='/posts/{{ $post->id }}/edit'"> 編集 </button>
        @endif
    </div>
    <a href='/user/{{ $post->user->id }}'>
        <p class='username'>{{$post->user->name}}</p>
    </a>
    <a href="/posts/{{ $post->id }}">
        <h4 class='body'>{{ $post->body }}</h4>
    </a>
    <div class='img'>
        @if(isset($post->image_path))
          <img src="{{ $post->image_path }}">
        @endif
    </div>
    <div class='comic'>
        <div class="d-flex flex-row">
            <div class='px-2'>
                {{ $post->comic->title }}
            </div>
            <div class='px-2'>
                @if($post->type===0)
                    単行本
                @else
                    雑誌
                @endif
            </div>
            <div class='px-2'>
                {{ $post->episode }}
                @if($post->type===0)
                    巻
                @else
                    話
                @endif
            </div>
        </div>
    </div>
    <div class='d-flex flex-row'>
        <div class='create_comment'>
            <button onclick="location.href='/posts/{{ $post->id }}/comments/create'">
                <i class="bi bi-chat-square"></i>
                <h11>{{ $post->comments->count() }}</h11>
            </button>
        </div>
        <div class='likes'>
        @if($post->likes()->where('user_id', Auth::id())->where('post_id', $post->id)->exists())
            <form action = "/posts/unlike/{{ $post->id }}" method='POST'>
            @csrf
            @method('PUT')
        @else
            <form action = "/posts/like/{{ $post->id }}" method="POST">
            @csrf
        @endif
                <input type='hidden' name='post_id' value='{{ $post->id }}'/>
                <button type='submit' name='like' value='{{ $post->likes->count() }}'>
                    <i class="bi bi-heart" ></i>
                    <h11>{{ $post->likes->count() }}</h11>
                </button>
            </form>
        </div>
        <div class='delete'>
            @if(Auth::id() == $post->user->id)
                <form action="/delete/{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    <button type="submit">
                        <i class="bi bi-trash"></i>
                    </button> 
                </form>
            @endif
        </div>
    </div>
</div>
<div class='comments'>
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