@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <!--cssファイル-->
        <link rel="stylesheet" href="{{ asset('/CSS/comics/index.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>漫画一覧</title>
        
    </head>
    <body>
        <div class='comics'>
            @foreach($comics as $comic)
            <div class='comic'>
                <div class='title'>
                    {{ $comic->title }}
                </div>
                <div class='info'>
                    <div class='author'>
                        {{ $comic->author }}
                    </div>
                    <div class='magazine'>
                        {{ $comic->magazine }}
                    </div>
                </div>
                <div class='img'>
                    
                </div>
            </div>
            @endforeach
        </div>
    </body>
</html>
@endsection