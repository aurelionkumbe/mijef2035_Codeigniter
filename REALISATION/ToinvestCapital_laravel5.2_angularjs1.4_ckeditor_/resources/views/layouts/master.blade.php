<!DOCTYPE html>
<html lang="en" ng-app="ToInvestCapital">
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


        <!-- Loading Website Icon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">
        <!-- Styles -->
        {{-- < link href = "{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <link href="{{asset('/css/utility.css')}}" rel="stylesheet">
        <style>
            #cke_1_top, #cke_1_bottom{
                display: none !important;
            }
            #cke_1_contents{
                width: 100% !important;
                height: 700px !important;
            }
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
                    <a class="navbar-brand" href="{{ url('/')}}">
                        ToInvestCapital
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home')}}">My Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login')}}">Login</a></li>
                        <li><a href="{{ url('/register')}}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
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
        <footer class="col-md-12 center white">
            <p class="text-center">&nbsp;</p>
            <div class="col-md-7">
                <div class="col-md-6 w3-card-2 text-center " style="padding-top: 15px; padding-bottom: 15px; ">
                    <div class="col-md-12 text-center bold" style="color: #000\9 ">
                        Your are an Investor
                    </div>
                    <div class="col-md-12 text-center w3-text-black text-justify " style="background: #eaeaea; padding-bottom: 7px; padding-top: 7px">
                        You have money and you want to invest on a new Business, New Branch of activity, New Market ? Find ready projects awaiting Investment
                    </div>
                </div>
                <div class="col-md-6 w3-card-2 text-center " style="padding-top: 15px; padding-bottom: 15px; ">
                    <div class="col-md-12 text-center bold" style="color: #000\9 ">
                        Looking for Starting capital
                    </div>
                    <div class="col-md-12 text-center w3-text-black text-justify " style="background: #eaeaea; padding-bottom: 7px; padding-top: 7px">
                        You have a Business Idea and You are looking for Funds? Come and meet Big investors. Opportunities of business and Partnership set up for you
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div id="contact" class="col-md-12  text-center white" style="float: right; background: #7f3e98; padding-top: 5px; padding-bottom: 5px; box-shadow: 2px 7px 7px 2px rgba(0,0,0,0.5)">
                    Douala, rue du pasteur lottin SAME / BP:10164<br>
                    infos@toinvestcapital.com / www.toinvestcapital.com
                </div>
                <div class="col-md-12 w3-white patners">

                    <div class="col-md-2 w3-padding-4" style="background-color: #95969A;">
                        <img src="{{asset('images/partners.png')}}" alt=""/>
                    </div>
                    <div class="col-md-10 patner-items">
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png" alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"  alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                        <div class="col-md-2 text-center patner-item"> 
                            <img src="images/logo.png"   alt="Image" />
                        </div>
                    </div>
                </div>
            </div>
            <p class="w3-text-amber text-center">
                &copy 2016 By <a href="http://digit-experts.com"> Digit Experts </a>
            </p>
        </footer>  


        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <!--
        <script src="{{ asset('lib/ckeditor/ckeditor.js')}}"></script>
        -->
        <script src="{{ asset('js/script.js')}}"></script>



        <!-- jQuery (necessary for Angular-JS JavaScript plugins) -->
        <!--
        <script src="{{ asset('js/angular/angular.min.js')}}"></script>
        <script src="{{ asset('js/angular/angular-animate.min.js')}}"></script>
        <script src="{{ asset('js/angular/angular-sanitize.min.js')}}"></script>
        <script src="{{ asset('js/angular/angular-resource.min.js')}}"></script>
        <script src="{{ asset('js/angular-ui/angular-ui-router.min.js')}}"></script>
        <script src="{{ asset('app/values.js')}}"></script>
        <script src="{{ asset('app/controllers.js')}}"></script>
        <script src="{{ asset('app/services.js')}}"></script>
        <script src="{{ asset('app/app.js')}}"></script>>
        -->
        <!-- JavaScripts -->
        <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        -->
        <?php if (isset($error)): dd($error) ?>
            <script>
                        var msg = "{{$error['message']}}";
                        var type = "{{$error['type']}}";
    <?php unset($_SESSION['flashAlert']); ?>

                switch (type){
                case "success":
                        $.notify(msg, "success");
                        break;
                        case "info":
                        $.notify(msg, "info");
                        break;
                        case "warning":
                        $.notify(msg, "warn");
                        break;
                        default:
                        $.notify(msg, "error");
                        break;
                }

            </script>
        <?php endif; ?>
    </body>
</html>
