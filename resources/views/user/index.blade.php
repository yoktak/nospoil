@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/user/index.css') }}">

        <title>ユーザーページ</title>
        
    </head>
    <body>
        <div class='container-fluid'>
            <div class='profile'>
                <div class='edit_profile'>
                    <button onclick="location.href='/user/edit_profile'"> 編集 </button>
                </div>
                <h2>{{ Auth::user()->name }}</h2>
                <h4>{{ Auth::user()->profile }}</h4>
            </div>
            <div class='follow'>
                <div class="d-flex flex-row">
                    <a class='following' href='/following_list'>
                        {{ Auth::user()->follows->count() }}
                        <p>フォロー</p>
                    </a>
                    <a class='followed' href='/followed_list'>
                        {{ Auth::user()->followed->count() }}
                        <p>フォロワー</p>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class='nospoilcomics'>
                    <h4>Nospoil Comics</h4>
                </div>
                <div class='edit_comic'>
                    <button onclick="location.href='user/edit_comic'">追加・更新</button>
                </div>
            </div>
            <!--漫画登録-->
            <div class='comics'>  
                <table class="table">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>単行本/雑誌</th>
                            <th>既読巻数/話数</th>
                        </tr>    
                    </thead>
                    <tbody class='comic'>
                    @foreach(auth()->user()->comics as $comic)
                        <tr>
                            <td class='name'>{{ $comic->title }}</td>
                            <td class='read_type'>
                            @if($comic->pivot->type===0)
                                単行本
                            @else
                                雑誌
                            @endif
                            <td class='read_episode'>
                                {{ $comic->pivot->episode }}
                                @if($comic->pivot->type===0)巻
                                @else話
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 
            <!--漫画登録　終-->
        </div>
        <div class='posts'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-6'>
                        <!--自分の投稿-->
                        <div class='myposts'>
                            <h5>投稿一覧</h5>  
                            @foreach($posts as $post)
                                @if(auth()->user()->id == $post->user->id)
                                    <div class='post'>
                                        <a href='/user/{{ $post->user->id }}'>
                                            <p class='username'>{{$post->user->name}}</p>
                                        </a>
                                        <a href="/posts/{{ $post->id }}">
                                            <h6 class='body'>{{ $post->body }}</h6>
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
                                @endif
                            @endforeach
                        </div>
                        <!--自分の投稿　終-->
                    </div>
                    <div class='col-6'>
                        <!--いいねした投稿-->
                        <div class='likeposts'>
                            <h5>いいね</h5>
                            @foreach($likeposts as $post)
                                <div class='post'>
                                    <a href='/user/{{ $post->user->id }}'>
                                        <p class='username'>{{$post->user->name}}</p>
                                    </a>
                                    <a href="/posts/{{ $post->id }}">
                                        <h6 class='body'>{{ $post->body }}</h6>
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
                            @endforeach
                        </div>
                        <!--いいねした投稿　終-->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
