@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ユーザーページ</title>
        
    </head>
    <body>
        <form action="/user" method="POST">
            @csrf
            @method('PUT')
            <div class='name'>
                <h2>ユーザーネーム</h2>
                <input type="text" name="user[name]" placehplder="username" />
            </div>
            <br>
            <div class='add_comics'>
                <h2>ネタバレ禁止漫画追加</h2>
                @foreach($comics as $comic)
                    <label>
                        {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                        <input type="radio" value="{{ $comic->id }}" name="comic_id">
                            {{ $comic->title }}
                        </input>
                    </label>
                @endforeach
            </div>
            <br>
            <div class='read_type'>
                <h2>種類選択</h2>
                <label><input type="radio"  name="type" value='0'>単行本</label>
                <label><input type="radio"  name="type" value='1'>週刊誌</label>
            </div>
            <br>
            <div class='episode'>
                <h2>既読巻数/話数</h2>
                <input type='text' name="episode" placeholder="巻数か話数を指定">
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        
        <div class='comics'>
            @foreach(auth()->user()->comics as $comic)
            <div class='partition'>---------------------------</div>
            <div class='name'>
                <p>好きな漫画</p>
                <h3>{{ $comic->title }}</h3>
            </div>
            <div class='read_type'>
                <p>単行本or雑誌</p>
                @if($comic->pivot->type===0)
                    <h3>単行本</h3>
                @else
                    <h3>雑誌</h3>
                @endif
            </div>
            <div class='read_episode'>
                <p>既読巻数/話数</p>
                <h3>
                {{ $comic->pivot->episode }}
                @if($comic->pivot->type===0)巻
                @else話
                @endif
                </h3>
            </div>
            @endforeach
        </div>
    </body>
</html>
@endsection