<!doctype html>
<html lang="en">
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
    {{--  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">  --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('sufeeadmin/assets/js/main.js') }}"></script>
    {{--  <script src="{{ asset('js/example.js') }}"></script>  --}}
    {{--  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>  --}}
</body>

</html>
