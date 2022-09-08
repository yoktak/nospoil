<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="sidebar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 sticky-top vh-100 side">
                            <div class='sidebar_fixed'>
                                <a href=''>
                                    <div class="m-ms-5">
                                        <h2><i class="bi bi-book-fill">　Nospoil</i></h2>
                                    </div>
                                </a>
                                <a href='/posts'>
                                    <div class="m-ms-5">
                                        <i class="bi bi-house-door">　Home</i>
                                    </div>
                                </a>
                                <a href='/user'>
                                    <div class="m-ms-5">
                                        <i class="bi bi-person-fill">　Profile</i>
                                    </div>
                                </a>
                                <a href=''>
                                    <div class="m-ms-5">
                                        <i class="bi bi-person-plus">　NewAccount</i>
                                    </div>
                                </a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <div class="m-ms-5">
                                        <i class="bi bi-arrow-counterclockwise">　logout</i>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href='/posts/create'>
                                    <div class="m-ms-5">
                                        <i class="bi bi-plus-square">　NewPost</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class='main'>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
</body>
</html>
