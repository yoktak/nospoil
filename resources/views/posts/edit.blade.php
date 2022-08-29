<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>投稿編集ページ</title>
        
    </head>
    <body>
        <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class='username'>
                <p name='post[user_id]' value="{{ Auth::user()->id }}">{{Auth::user()->name}}</p>
            </div>
            <div class='body'>
                <textarea name='post[body]' value="{{ $post->body }}">{{ $post->body }}</textarea>
            </div>
            <p>もう一度漫画情報を確認して再記入しましょう</p>
            <div class='image'>
                <p>画像</p>
                <input type='file' name='image' value="{{ $post->image_path }}">
            </div>
            <div class='comic'>
                <p>投稿内容が関係する漫画を選択</p>
                @foreach($comics as $comic)
                    <label>
                        {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                        <input type="radio" value="{{ $comic->id }}" name="post[comic_id]">
                            {{ $comic->title }}
                        </input>
                    </label>
                @endforeach  
            </div>
            <div class='type'>
                <p>種類選択</p>
                <label><input type="radio"  name='post[type]' id="type" value='0' >単行本</label>
                <label><input type="radio"  name='post[type]' id="type" value='1' >週刊誌</label>
            </div>
            <br>
            <div class='episode'>
                <p>投稿内容が関係する巻数/話数</p>
                <input type="text" name='post[episode]' id="episode"  placeholder="巻数か話数を指定">
            </div>
            <input type="submit" value="再投稿"/>
        </form>
        <a href='/posts/{{ $post->id }}'>[back]</a>
    </body>
</html>