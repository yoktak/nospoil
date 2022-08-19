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
            <a href='create'>[新規投稿]</a>
        </div>
        <div class='posts'>
            @foreach ($posts as $post)
                @foreach (auth()->user()->comics as $comic)
                    @if($comic->id===$post->comic->id &&
                        $comic->pivot->type===$post->type &&
                        $comic->pivot->episode>=$post->episode)
                        <div class='partition'>---------------------------</div>
                        <div class='post'>
                            <h4 class='username'>{{$post->user->name}}</h4>
                            <p class='body'>{{ $post->body }}</p>
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
                    @endif
                @endforeach
            @endforeach
        </div>
    </body>
</html>
@endsection