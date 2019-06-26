<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
           <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('sufeeadmin/vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{  asset('sufeeadmin/assets/css/style.css') }}">

    <link href="{{ asset('sufeeadmin/assets/css/font.css') }}' rel='stylesheet' type='text/css'">
    <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                         <router-link to="/signin">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    </ul>
                </div>
        </nav>
        <div id="app">
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <b class="title">
                        <b>File Management System</b>
                    </b>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    <script src="/js/app.js"></script>
    <script src="{{ asset('public/sufeeadmin/assets/js/main.js') }}"></script>
    </body>
</html>
