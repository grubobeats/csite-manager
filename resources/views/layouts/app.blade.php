<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ URL::to('/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/css/custom.css') }}" rel="stylesheet">



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        var rootPath = "{{ URL::to('/') }}";

    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Construction Manager
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest())
                            <li><a href="{{ url('/dashboard') }}">Construction Sites</a></li>
                            <li class="disabled"><a href="#">Workers</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('global.choose-language') <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('language', ['lang'=>'en']) }}">English</a></li>
                                    <li><a href="{{ route('language', ['lang'=>'sr']) }}">Srpski</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="username-holder">
                                    {{ Auth::user()->name }} {{ Auth::user()->lastname }} <span class="caret"></span>
                                    @if(Auth::user()->donated)
                                        <span class="fa-stack">
                                            <i class="fa fa-circle fa-stack-2x text-info" ></i>
                                            <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse" aria-hidden="true" title="You donated and helped us. Thank you!"></i>
                                        </span>
                                    @endif

                                    @if(Auth::user()->subscribed('main'))
                                        <span class="fa-stack">
                                            <i class="fa fa-circle fa-stack-2x text-info"></i>
                                            <i class="fa fa-handshake-o fa-stack-1x fa-inverse" aria-hidden="true" title="You are subscribed"></i>
                                        </span>
                                    @endif
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('billing') }}">Account</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


    @extends('layouts.footer')
