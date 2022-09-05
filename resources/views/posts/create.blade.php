@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/CSS/posts/create.css') }}">

<div class='create'>
    <form action="/posts" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class='username'>
            <p name='post[user_id]' value="{{ Auth::user()->id }}">{{Auth::user()->name}}</p>
        </div>
        <div class='body'>
            <textarea name='post[body]' placeholder="しゃべりたいことを書いてみましょう"></textarea>
        </div>
        <div class='image'>
            <p>画像</p>
            <input type='file' name='image'>
        </div>
        <div class='comic'>
            <p>投稿内容が関係する漫画の詳細情報を入力</p>
            <div class='title'>
                @foreach($comics as $comic)
                    <label>
                        <input type="radio" value="{{ $comic->id }}" name="post[comic_id]">
                            {{ $comic->title }}
                        </input>
                    </label>
                @endforeach
            </div>
            <div class='type'>
                <label><input type="radio"  name='post[type]' id="type" value='0'> 単行本</label>
                <label><input type="radio"  name='post[type]' id="type" value='1'> 雑誌</label>
            </div>
            <div class='episode'>
                <input type="text" name='post[episode]' id="episode"  placeholder="巻数か話数を指定">
            </div>
        </div>
        <input type="submit" value="投稿"/>
    </form>
</div>
@endsection