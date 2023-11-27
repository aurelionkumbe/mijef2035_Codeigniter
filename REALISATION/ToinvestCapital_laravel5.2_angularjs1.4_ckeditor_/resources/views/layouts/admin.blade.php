<!DOCTYPE html>
<html lang="en" ng-app="ToInvestCapital">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Back Office | ToInvestCapital</title>

    <!-- Loading Bootstrap -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/css/w3/w3.css')}}" rel="stylesheet">
    <link href="{{asset('/css/w3/w3-theme-purple.css')}}" rel="stylesheet">

    <!-- Loading Login screen style -->
    <link href="{{ asset('lib/bootstrap-data-table/css/jquery.bdt.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/jConfirm/jConfirm-v2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">
        <!--
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    -->
    <!-- Loading Website Icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">
    <!-- Styles -->
    {{-- < link href = "{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ToInvestCapital | Back Office</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="hidden dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question-circle"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong></strong>
                                        </h5>
                                        <p class=" hidden small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#"><i class="fa fa-remove"></i> Remove all</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown hidden">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user w3-large w3-theme w3-circle w3-padding-4"></i>&nbsp;&nbsp;
                        <?php echo session('user.email').'('.session('user.name').')' ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="width: 200px;">
                            <li hidden="">
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li hidden="">
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li hidden="">
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/dashboard/logout') }}" class="w3-red w3-large"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav w3-border-right w3-theme-l3">
                        <li>
                            <a href="{{url('dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-book"></i> Article <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a class="btn w3-btn w3-blue w3-hover-blue-grey btn-default" onclick="document.getElementById('add-article-form').style.display = 'block'"
                                    href="#"><i class="fa fa-fw fa-plus-square"></i> Add new</a>
                                </li>
                                <li>
                                    <a href="{{url('dashboard/articles/bulletins')}}"><i class="fa fa-fw fa-newspaper-o"></i> Weekly Bulletin</a>
                                </li>
                                <li>
                                    <a href="{{url('dashboard/articles/faq')}}"><i class="fa fa-fw fa-question"></i> FAQ</a>
                                </li>
                                <li class="hidden">
                                    <a href="{{url('dashboard/articles/services')}}"><i class="fa fa-fw fa-lightbulb-o"></i> Service</a>
                                </li>
                                <li class="hidden">
                                    <a href="{{url('dashboard/articles/activities')}}"><i class="fa fa-fw fa-lightbulb-o"></i> Activies
                                    </a>
                                </li>
                                <li class="divider"></li>

                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{url('dashboard/articles/documents')}}"><i class="fa fa-fw fa-file-pdf-o"></i> Document</a>
                        </li>
                        <li>
                            <a href="{{url('dashboard/articles/videos')}}"><i class="fa fa-fw fa-video-camera"></i> Videos</a>
                        </li>


                        <li class="divider"></li>

                        <li>
                            <a href="{{url('dashboard/slides')}}"><i class="fa fa-fw fa-image"></i> Slides</a>
                        </li>
                        <li class="hidden">
                            <a href="{{url('dashboard/articles/unpublished')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Unpublished</a>
                        </li>
                        <li class="hidden">
                            <a href="{{url('dashboard/articles/trash')}}"><i class="fa fa-fw fa-trash"></i> Trash</a>
                        </li>
                        <li class="hidden">
                            <a href="{{url('dashboard/articles/complements')}}"><i class="fa fa-fw fa-edit"></i> Assets</a>
                        </li>
                        <li class="hidden">
                            <a href="{{url('dashboard/configuration')}}"><i class="fa fa-fw fa-wrench"></i> Parameter</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!--
                            <h1 class="page-header">
                                Blank Page
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Blank Page
                                </li>
                            </ol>
                        -->
                        @yield('header')
                        @yield('content')
                        @yield('footer')


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            @include('admin.modals')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->





    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/notify.min.js')}}"></script>
    <script src="{{ asset('lib/bootstrap-data-table/js/vendor/jquery.sortelements.js')}}"></script>
    <script src="{{ asset('lib/bootstrap-data-table/js/jquery.bdt.min.js')}}"></script>
    <script src="{{ asset('lib/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('lib/jConfirm/jConfirm-v2.min.js')}}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/config.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>


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
    <script src="{{ asset('app/app.js')}}"></script>
-->


<!-- JavaScripts -->
        <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    -->
    {{-- < script src = "{{ elixir('js/app.js') }}"></script> --}}


    <?php if (isset($_SESSION['flashAlert'])): ?>
        <script>
            var msg = "<?= $_SESSION['flashAlert']['message'] ?>";
            var type = "<?= $_SESSION['flashAlert']['type'] ?>";
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

    @yield('script')

</body>
</html>
