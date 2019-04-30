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

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('sufeeadmin/vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{  asset('sufeeadmin/assets/css/style.css') }}">

    <link href="{{ asset('sufeeadmin/assets/css/font.css') }}' rel='stylesheet' type='text/css'">

</head>

<body>

    <div id="app">
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/admindashboard"><img src="{{ asset('sufeeadmin/images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="/admindashboard"><img src="{{ asset('sufeeadmin/images/logo2.png') }}" alt="Logo"></a>
            </div>
                <h3 class="menu-title">Master</h3>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <router-link to="/employeedashboard"> <i class="menu-icon fa fa-dashboard"></i>Employee Dashboard </router-link>
                    </li>
                    <li class="active">
                        <router-link to="/employee"> <i class="menu-icon fa fa-laptop"></i> Register Employee </router-link>
                </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('sufeeadmin/images/admin.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                          <i class="fa fa-power-off"></i>
                                          {{ __('Logout') }}
                             </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>

                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">




            <!--/.col-->


            <!--/.col-->
<div class="col-md-12 col-lg-12 col-sm-12">
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
</div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->
</div>
    <!-- Right Panel -->

    {{-- <script src="http://code.jquery.com/jquery-3.3.1.js"></script> --}}
    <script src="/js/app.js"></script>
    <script src="{{ asset('sufeeadmin/assets/js/main.js') }}"></script>
    {{--  <script src="{{ asset('sufeeadmin/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('sufeeadmin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('sufeeadmin/assets/js/widgets.js') }}"></script>
    <script src="{{ asset('sufeeadmin/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('sufeeadmin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('sufeeadmin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>  --}}

</body>

</html>

