<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ URL::to('/css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>


    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Construction Manager</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('global.choose-language') <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('language', ['lang'=>'en']) }}">English</a></li>
                            <li><a href="{{ route('language', ['lang'=>'sr']) }}">Srpski</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">@lang('global.login')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('global.register')</a></li>
                    @else
                        <li><a href="{{ url('/dashboard') }}">@lang('global.dashboard')</a></li>
                        <li><a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                        </li>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        {{ trans('landing.welcome') }}
                    </div>
                    <div class="links">
                        <a href="#">{{ trans('landing.about') }}</a>
                        <a href="#">{{ trans('landing.what_it_does') }}</a>
                        <a href="#">{{ trans('landing.try') }}</a>
                        <a href="#">{{ trans('landing.pro') }}</a>
                    </div>
                </div>
                <br>

        </div>


    <script src="{{ URL::to('/js/app.js') }}"></script>
    </body>
</html>
