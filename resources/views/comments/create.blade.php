<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>投稿ページ</title>
        
    </head>
    <body>
        <form action="/posts/{{ $post->id }}/comments" method="POST">
        {{ csrf_field() }}
            <div class='recipient'>
                <h8>送信先：{{ $post->user->name }}</h8>
                <input type='hidden' name='comment[post_id]' value='{{ $post->id }}' />
            </div>
            <div class='username'>
                <p>{{Auth::user()->name}}</p>
            </div>
            <div class='body'>
                <textarea name='comment[body]'></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
    </body>
</html>
