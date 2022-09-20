@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/comments/create.css') }}">
        <title>投稿編集ページ</title>
        
    </head>
    <body>
        <div class='create'>
            <form action="/posts/{{ $post->id }}/comments" method="POST">
            {{ csrf_field() }}
                <div class='recipient'>
                    <h8>送信先：{{ $post->user->name }}</h8>
                    <input type='hidden' name='comment[post_id]' value='{{ $post->id }}' />
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
                </div>
                <div class='username'>
                    <p>{{Auth::user()->name}}</p>
                </div>
                <div class='body'>
                    <div class='careful'>
                    <p>上記の投稿者の漫画詳細を再度確認してコメントしましょう</p>
                    </div>
                    <p class="body_error" style="color:red">{{ $errors->first('comment.body') }}</p>
                    <textarea name='comment[body]'></textarea>
                </div>
                <input type="submit" value="コメント"/>
            </form>
        </div>
    </body>
</html>
@endsection
