<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        
        <link rel="stylesheet" href="{{ asset('/CSS/header.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                ヘッダー
            </div>
            <div class='main+sidebar'>
                @yield('content')
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>