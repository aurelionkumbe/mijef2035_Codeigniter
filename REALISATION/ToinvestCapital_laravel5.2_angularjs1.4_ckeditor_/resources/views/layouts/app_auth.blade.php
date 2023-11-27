<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToInvestCapital</title>

        <!-- Loading Bootstrap -->
        <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('/css/w3/w3.css')}}" rel="stylesheet">
        <link href="{{asset('/css/w3/w3-theme-purple.css')}}" rel="stylesheet">

        <!-- Loading Login screen style -->
        <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/main.css')}}" rel="stylesheet">

        <!-- Loading Website Icon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">
        <!-- Styles -->
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <link href="{{asset('/css/utility.css')}}" rel="stylesheet">
        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
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
                        ToInvestCapital
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/dashboard/login') }}">Login</a></li>
                        <li><a href="{{ url('/dashboard/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('header')
        @yield('content')
        @yield('footer')

        <p>&nbsp;</p>
        <p>&nbsp;</p>


        <div class="col-md-12">
            <div id="contact" class="col-md-6 col-md-offset-3  text-center white" style="background: #7f3e98; padding-top: 5px; padding-bottom: 5px; box-shadow: 2px 7px 7px 2px rgba(0,0,0,0.5)">
                Douala, rue du pasteur lottin SAME / BP:10164<br>
                infos@toinvestcapital.com / www.toinvestcapital.com
                <p class="w3-text-amber text-center">
                    &copy 2016 By <a href="http://digit-experts.com"> Digit Experts </a>
                </p>
            </div>

        </div>





        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        <script src="{{ asset('js/angular.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/script.js') }}"></script>

        <!-- JavaScripts -->
        <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        -->
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
