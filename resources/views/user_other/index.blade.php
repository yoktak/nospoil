@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="{{ asset('/CSS/user_other/index.css') }}">

<div class='user_other'>
    <div class='container-fluid'>
        <div class='profile'>
            <h2>{{ $user->name }}</h2>
            <h4>{{ $user->profile }}</h4>
        </div>
        <!--フォロー機能-->
        <div class='follow'>
            <div class='follow_button'>
                @if(!isset($follow))
                    <form action="/follow" method="POST">
                    {{ csrf_field() }}
                        <input type='hidden' name='followed_id' value='{{ $user->id }}' />
                        <input type='submit' value='フォローする'>
                    </form>
                @else
                    <form action="/remove" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                        <input type='hidden' name='followed_id' value='{{ $user->id }}' />
                        <input type='submit' value='フォロー解除'>
                    </form>
                @endif
            </div>
            <div class="d-flex flex-row">
                <a class='following' href='/following_list'>
                    {{ $user->follows->count() }}
                    <p>フォロー</p>
                </a>
                <a class='followed' href='/followed_list'>
                    {{ $user->followed->count() }}
                    <p>フォロワー</p>
                </a>
            </div>
        </div>
        
        <!--ネタバレ禁止漫画-->
        <div class='nospoilcomics'>
            <h4>Nospoil Comics</h4>
        </div>
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
                @foreach($user->comics as $comic)
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
        
        <!--投稿一覧-->
        <div class='posts'>
            <h5>投稿一覧</h5>  
            @foreach($user->posts as $post)
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
                    <!--いいね機能-->
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
    </div>
</div>
@endsection
