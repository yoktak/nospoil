@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ユーザーページ</title>
        
    </head>
    <body>
        <div class='following'>
            <h1>Following</h1>
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
