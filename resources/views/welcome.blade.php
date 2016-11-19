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
                <a href="{{ url('/home') }}">Dashboard</a>
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
                        Construction Manager
                    </div>
                    <div class="links">
                        <a href="#">About</a>
                        <a href="#">What is does?</a>
                        <a href="#">Try for free!</a>
                        <a href="#">Pro version</a>
                    </div>
                </div>
        </div>




    </body>
</html>
