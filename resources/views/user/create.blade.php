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
        <form action="/user" method="POST">
            @csrf
            <h1>試しにネタバレされたくない漫画を登録してみよう</h1>
            <div class='name'>
                 <h2>{{Auth::user()->name}}</h2>
            </div>
            
            <div class='comics'>
                <h2>ネタバレ禁止漫画</h2>
                @foreach($comics as $comic)
                    <label>
                        {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                        <input type="radio" value="{{ $comic->id }}" name="comic_id">
                            {{ $comic->title }}
                        </input>
                    </label>
                @endforeach         
            </div>
            <div class='read_type'>
                <h2>種類選択</h2>
                <label><input type="radio"  name="type" value='0'>単行本</label>
                <label><input type="radio"  name="type" value='1'>週刊誌</label>
            </div>
            <br>
            <div class='read_episode'>
                <h2>既読巻数/話数</h2>
                <input type="text" name="episode" value="" placeholder="巻数か話数を指定">
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection