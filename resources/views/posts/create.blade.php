@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/posts/create.css') }}">

        <title>ユーザーページ</title>
        
    </head>
    <body>
        <div class='create'>
            <form action="/posts" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class='username'>
                    <p name='post[user_id]' value="{{ Auth::user()->id }}">{{Auth::user()->name}}</p>
                </div>
                <div class='body'>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                    <textarea name='post[body]' placeholder="しゃべりたいことを書いてみましょう" >
                        {{ old('post.body') }}
                    </textarea>
                </div>
                <div class='image'>
                    <p>画像</p>
                    <input type='file' name='image'>
                </div>
                <div class='comic'>
                    <p>投稿内容が関係する漫画の詳細情報を入力</p>
                    <div class='title'>
                        <p class="title_error" style="color:red">{{ $errors->first('post.comic_id') }}</p>
                        @foreach($comics as $comic)
                            <label>
                                <input type="radio" name="post[comic_id]" value='{{ $comic->id }}' {{ old('post.comic_id') == $comic->id ? 'checked' : '' }} />{{ $comic->title }}
                            </label>
                        @endforeach
                    </div>
                    <div class='type'>
                        <p class="type_error" style="color:red">{{ $errors->first('post.type') }}</p>
                        <label><input type="radio"  name='post[type]' id="type" value='0' {{ old('post.type') == '0' ? 'checked' : '' }} /> 単行本</label>
                        <label><input type="radio"  name='post[type]' id="type" value='1' {{ old('post.type') == '1' ? 'checked' : '' }}> 雑誌</label>
                    </div>
                    <div class='episode'>
                        <p class="episode_error" style="color:red">{{ $errors->first('post.episode') }}</p>
                        <input type="text" name='post[episode]' id="episode" value="{{ old('post.episode') }}" placeholder="巻数か話数を指定">
                    </div>
                </div>
                <input type="submit" value="投稿"/>
            </form>
        </div>
    </body>
</html>
@endsection