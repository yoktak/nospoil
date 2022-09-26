@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/user/following.css') }}">
        <title>フォロー一覧</title>
        
    </head>
    <body>
        <div class='following'>
            <div class='pagename'>
                <h2><i class="bi bi-arrow-left" onclick="location.href='/user'"></i>　Following</h2>
            </div>
        </div>
        <div class='lists'>
            @foreach(auth()->user()->follows as $follow)
                <li>
                    <a href='/user/{{ $follow->id }}'>{{ $follow->name }}</a>
                </li>
            @endforeach
        </div>
    </body>
</html>
@endsection
