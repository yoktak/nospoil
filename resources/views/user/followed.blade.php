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
        @foreach(auth()->user()->followed as $followed)
            <li>
                <a href='/user/{{ $followed->id }}'>{{ $followed->name }}</a>
            </li>
        @endforeach
    </body>
</html>
@endsection
