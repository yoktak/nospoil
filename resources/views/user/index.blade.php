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
        <h2>{{Auth::user()->name}}</h2>
        <div class='profile'>
            <p>プロフィール</p>
            <p>読んでる漫画</p>
        </div>
    </body>
</html>
@endsection
