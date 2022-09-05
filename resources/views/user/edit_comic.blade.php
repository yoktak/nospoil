@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/CSS/user/edit_comic.css') }}">
        <title>プロフィール編集画面</title>
        
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
                    @foreach($comics as $comic)
                        <label>
                            {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                            <input type="radio" value="{{ $comic->id }}" name="comic_id">
                                {{ $comic->title }}
                            </input>
                        </label>
                    @endforeach
                </div>
                <br>
                <div class='read_type'>
                    <h3>select type</h3>
                    <label><input type="radio"  name="type" value='0'>単行本</label>
                    <label><input type="radio"  name="type" value='1'>週刊誌</label>
                </div>
                <br>
                <div class='episode'>
                    <h3>already read</h3>
                    <input type='text' name="episode" placeholder="巻数か話数を指定">
                </div>
                <br>
                <input type="submit" value="保存"/>
            </form>
        </div>
    </body>
</html>
@endsection