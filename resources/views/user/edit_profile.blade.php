@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/user/edit_profile.css') }}">
        <title>マイページ　編集ページ</title>
        
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
                <p class="name_error" style="color:red">{{ $errors->first('user.name') }}</p>
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