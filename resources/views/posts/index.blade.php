@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <!--cssファイル-->
        <link rel="stylesheet" href="{{ asset('/CSS/posts/index.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>投稿一覧ページ</title>
        
    </head>
    <body>
        <div class='posts'>
            @foreach ($posts as $post)
                @foreach (auth()->user()->comics as $comic)
                    @if($comic->id===$post->comic->id &&
                        $comic->pivot->type===$post->type &&
                        $comic->pivot->episode>=$post->episode)
                        <div class='post'>
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
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </body>
</html>
@endsection