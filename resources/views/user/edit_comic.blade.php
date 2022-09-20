@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/CSS/user/edit_comic.css') }}">
        <title>NospoilComics 編集ページ</title>
        
    </head>
    <body>
        <div class='update_comics'>
            <div class='pagename'>
                <h2><i class="bi bi-arrow-left" onclick="location.href='/user'"></i>　Update Comics</h2>
            </div>
            <form action="/user/edit_comic" method="POST">
                @csrf
                <div class='select_comics'>
                    <h3>select comic</h3>
                    <p class="title_error" style="color:red">{{ $errors->first('comic_id') }}</p>
                    @foreach($comics as $comic)
                        <label>
                            {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                            <input type="radio"　name="comic_id" value="{{ $comic->id }}" {{ old('comic_id') ==  $comic->id ? 'checked' : '' }}>
                                {{ $comic->title }}
                            </input>
                        </label>
                    @endforeach
                </div>
                <br>
                <div class='read_type'>
                    <h3>select type</h3>
                    <p class="type_error" style="color:red">{{ $errors->first('type') }}</p>
                    <label><input type="radio"  name="type" value='0' {{ old('type') ==  '0' ? 'checked' : '' }}>単行本</label>
                    <label><input type="radio"  name="type" value='1' {{ old('type') ==  '1' ? 'checked' : '' }}>週刊誌</label>
                </div>
                <br>
                <div class='episode'>
                    <h3>already read</h3>
                    <p class="episode_error" style="color:red">{{ $errors->first('episode') }}</p>
                    <input type='text' name="episode" placeholder="巻数か話数を指定" value='{{ old('episode') }}'>
                </div>
                <br>
                <input type="submit" value="保存"/>
            </form>
        </div>
    </body>
</html>
@endsection