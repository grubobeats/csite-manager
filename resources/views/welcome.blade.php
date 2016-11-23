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
        <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">


            @if (Auth::guest())
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @else
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </div>
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

        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('language-chooser') }}" method="post">
                    {{ csrf_field() }}
                    <select name="language" id="language">
                        <option value="en">English</option>
                        <option value="sr">Serbian</option>
                    </select>

                    <button type="submit" >Change Language</button>
                </form>
            </div>

        </div>



    </body>
</html>
