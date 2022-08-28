@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/CSS/user/index.css') }}">

        <title>ユーザーページ</title>
        
    </head>
    <body>
        <div class='profile'>
            <h2>{{Auth::user()->name}}</h2>
            <p>プロフィール</p>
            <h4>{{ Auth::user()->profile }}</h4>
        </div>
        <div class='follow'>
            <a class='following' href='/following_list'>[フォロー]</a>
            <a class='followed' href='/followed_list'>[フォロワー]</a>
        </div>
        <div class='edit'>
            <a href='user/edit_profile'>[プロフィール編集]</a>
            <a href='user/edit_comic'>[漫画追加/更新]</a>
            <a href='/posts'>[投稿一覧]</a>
        </div>
        <div class='comics'>
            @foreach(auth()->user()->comics as $comic)
                <div class='comic'>
                    <li class='name'>
                        <p>好きな漫画</p>
                        <h3>{{ $comic->title }}</h3>
                    </li>
                    <li class='read_type'>
                        <p>単行本or雑誌</p>
                        @if($comic->pivot->type===0)
                            <h3>単行本</h3>
                        @else
                            <h3>雑誌</h3>
                        @endif
                    </li>
                    <li class='read_episode'>
                        <p>既読巻数/話数</p>
                        <h3>
                        {{ $comic->pivot->episode }}
                        @if($comic->pivot->type===0)巻
                        @else話
                        @endif
                        </h3>
                    </li>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection
