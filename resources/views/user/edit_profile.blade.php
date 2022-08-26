@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>プロフィール編集画面</title>
        
    </head>
    <body>
        <form action="/user/edit_profile" method="POST">
            @csrf
            @method('PUT')
            <div class='name'>
                <h2>ユーザーネーム</h2>
                <input type="text" name="user[name]" value="{{ Auth::user()->name }}" placehplder="username" />
            </div>
            <div class='profile'>
                <h2>プロフィール</h2>
                <textarea name="user[profile]" placeholder="ご自由にお書きください">{{ Auth::user()->profile }}</textarea>
            </div>
            
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection