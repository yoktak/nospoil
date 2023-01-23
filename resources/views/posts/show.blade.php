@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/posts/show.css') }}">
        <title>ユーザーページ</title>
        
    </head>
    <body>
        <div class='post'>
            <div class='edit'>
                @if(Auth::id() == $post->user->id)
                    <button onclick="location.href='/posts/{{ $post->id }}/edit'"> 編集 </button>
                @endif
            </div>
            @if(Auth::id() == $post->user->id)
            <a href='/user'>
            @else
            <a href='/user/{{ $post->user->id }}'>
            @endif
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
                    <i class="bi bi-chat-square-fill" type='button' onclick="location.href='/posts/{{ $post->id }}/comments/create'">
                        {{ $post->comments->count() }}
                    </i>
                </div>
                <like 
                    :post-id = "{{ json_encode($post->id) }}"
                    :user-id = "{{ json_encode($userAuth->id) }}"
                    :default-Liked ="{{ json_encode($defaultLiked) }}"
                    :default-Count ="{{ json_encode($defaultCount) }}"
                ></like>
                <div class='delete'>
                @if(Auth::id() == $post->user->id)
                    <form action="/delete/{{ $post->id }}" method="GET" style="display:inline">
                        @csrf
                        <i class="bi bi-trash3-fill" type='submit' onclick="location.href='/delete/{{ $post->id }}'"></i>
                    </form>
                @endif
                </div>
            </div>
        </div>
        <div class='comments'>
            @foreach ($comments as $comment)
                <div class='comment'>
                    <div class='username'>
                        @if(Auth::id() == $comment->user->id)
                        <a href='/user'>
                        @else
                        <a href='/user/{{ $comment->user->id }}'>
                        @endif
                            <p>{{ $comment->user->name }}</p>
                        </a>
                    </div>
                    <div class='body'>
                        <h5>{{ $comment->body }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection