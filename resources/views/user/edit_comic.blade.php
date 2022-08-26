@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>漫画登録画面</title>
        
    </head>
    <body>
        <form action="/user/edit_comic" method="POST">
            @csrf
            <div class='add_comics'>
                <h2>ネタバレ禁止漫画追加/更新</h2>
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
                <h2>種類選択</h2>
                <label><input type="radio"  name="type" value='0'>単行本</label>
                <label><input type="radio"  name="type" value='1'>週刊誌</label>
            </div>
            <br>
            <div class='episode'>
                <h2>既読巻数/話数</h2>
                <input type='text' name="episode" placeholder="巻数か話数を指定">
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection