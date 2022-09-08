@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/posts/edit.css') }}">
        <title>投稿編集ページ</title>
        
    </head>
    <body>
        <div class='edit'>
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class='username'>
                    <p name='post[user_id]' value="{{ Auth::user()->id }}">{{Auth::user()->name}}</p>
                </div>
                <div class='body'>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                    <textarea name='post[body]' value="{{ $post->body }}">{{ $post->body }}</textarea>
                </div>
                <div class='image'>
                    <p>画像</p>
                    <input type='file' name='image' value="{{ $post->image_path }}">
                </div>
                <div class='title'>
                    <p>投稿内容が関係する漫画を選択</p>
                    <p class="title_error" style="color:red">{{ $errors->first('post.comic_id') }}</p>
                    @foreach($comics as $comic)
                        <label>
                            <input type="radio" name="post[comic_id]" value="{{ $comic->id }}" {{ $post->comic_id == $comic->id ? 'checked' : '' }}>
                                {{ $comic->title }}
                            </input>
                        </label>
                    @endforeach 
                </div>
                <div class='type'>
                    <p>種類選択</p>
                    <p class="type_error" style="color:red">{{ $errors->first('post.type') }}</p>
                    <label><input type="radio"  name='post[type]' id="type" value='0' {{ $post->type == '0' ? 'checked' : '' }} >単行本</label>
                    <label><input type="radio"  name='post[type]' id="type" value='1' {{ $post->type == '1' ? 'checked' : '' }} >週刊誌</label>
                </div>
                <div class='episode'>
                    <p>投稿内容が関係する巻数/話数</p>
                    <p class="episode_error" style="color:red">{{ $errors->first('post.episode') }}</p>
                    <input type="text" name='post[episode]' id="episode"  placeholder="巻数か話数を指定"value='{{ $post->episode }}' >
                </div>
                <input type="submit" value="再投稿"/>
            </form>
            <button><a href='/posts/{{ $post->id }}'>back</a></button>
        </div>
    </body>
</html>
@endsection