@extends('layout.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/user/followed.css') }}">
        <title>フォロワー一覧</title>
        
    </head>
    <body>
        <div class='followed'>
            <h1>Followed</h1>
        </div>
        <div class='lists'>
            @foreach(auth()->user()->followed as $followed)
            <li>
                <a href='/user/{{ $followed->id }}'>{{ $followed->name }}</a>
            </li>
        @endforeach
        </div>
    </body>
</html>
@endsection
