<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>投稿ページ</title>
        
    </head>
    <body>
        <h1>語り部屋</h1>
        <form action="/posts" method="POST">
            {{ csrf_field() }}
            
    </body>
</html>
