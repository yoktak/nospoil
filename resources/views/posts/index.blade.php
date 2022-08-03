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
        <div class='posts'>
             @foreach ($posts as $post)
                <div class='post'>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection
