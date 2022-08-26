@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>投稿一覧ページ</title>
        
    </head>
    <body>
        <h1>語り部屋</h1>
        <div class='mypage'>
            <a href='/user'>[MyPage]</a>
        </div>
        <div class='create'>
            <a href='/posts/create'>[新規投稿]</a>
        </div>
        <div class='posts'>
            @foreach ($posts as $post)
                @foreach (auth()->user()->comics as $comic)
                    @if($comic->id===$post->comic->id &&
                        $comic->pivot->type===$post->type &&
                        $comic->pivot->episode>=$post->episode)
                        <div class='partition'>---------------------------</div>
                        <div class='post'>
                            <a href='/user/{{ $post->user->id }}'>
                                <h4 class='username'>{{$post->user->name}}</h4>
                            </a>
                            <a href="/posts/{{ $post->id }}">
                                <p class='body'>{{ $post->body }}</p>
                            </a>
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
                            @if($post->likes()->where('user_id', Auth::id())->where('post_id', $post->id)->exists())
                                <form action = "/posts/unlike/{{ $post->id }}" method='POST'>
                                @csrf
                                @method('PUT')
                            @else
                                <form action = "/posts/like/{{ $post->id }}" method="POST">
                                @csrf
                            @endif
                                    <input type='hidden' name='post_id' value='{{ $post->id }}'/>
                                    <input type='submit' name='like' value='いいね{{ $post->likes->count() }}'/>
                                </form>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </body>
</html>
@endsection