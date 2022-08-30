@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/CSS/user/edit_profile.css') }}">

        <title>プロフィール編集画面</title>
        
    </head>
    <body>
        <div class='pagename'>
            <h2><i class="bi bi-arrow-left" onclick="location.href='/user'"></i>　Update Profile</h2>
        </div>
        <form action="/user/edit_profile" method="POST">
            @csrf
            @method('PUT')
            <div class='name'>
                <h3>User Name</h3>
                <input type="text" name="user[name]" value="{{ Auth::user()->name }}" placehplder="username" />
            </div>
            <div class='profile'>
                <h3>Who are you doing?</h3>
                <textarea name="user[profile]" placeholder="ご自由にお書きください">{{ Auth::user()->profile }}</textarea>
            </div>
            
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection