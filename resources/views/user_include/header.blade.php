<!--<html>
<head>
<meta charset="UTF-8">
<title>Fitbeanz</title>
<link href="{{ asset('asset/css/bootstrap.css') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('asset/css/style.css') }}" type="text/css" rel="stylesheet"/>

<script src="{{ asset('asset/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset/js/script.js') }}" type="text/javascript"></script>
</head>
<body> -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ALIVE</title>
        <!-- Bootstrap_StyleSheet -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet"/>
        <!-- Custom css -->
        <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

<!--        <link href="{{ asset('asset/css/owl.theme.css') }}" rel="stylesheet">-->
<!--        <link href="{{ asset('asset/css/owl.carousel.css') }}" rel="stylesheet">-->
        <!-- Fontawsom -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">

        <!-- JS Script -->
        <script src="{{ asset('asset/js/jquery.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Js -->
        <script src="{{ asset('asset/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--        <script src="{{ asset('asset/js/owl.carousel.min.js') }}" type="text/javascript"></script>-->
    </head>
    <body>
        <div class="main">

            <!-- HEADER -->
            <header>
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="container">
                        <div class="col-lg-3">
                            <a href="" class="logo">
                                <img src="{{ asset('asset/img/logo.png')}}" alt="" width="100" height="40">
                            </a>
                        </div>

                        <div class=" col-lg-9 text-right hidden-xs">
                            <ul class="list2">
                                 <li>
                                    <a href="#"><img src="{{ asset('asset/img/google.png') }}"  height="34px" alt=""></a>
                                </li>
                                 <li>
                                    <a href="#"><img src="{{ asset('asset/img/ios.png') }}" height="34px" alt=""></a>
                                </li>
                                <li>
                                    <a href="{{url('/myacc')}}"> <img src="{{ asset('asset/img/user.png') }}" alt="">    <span>My Account</span></a>
                                </li>
                                <li>
                                    <a href="http://alivefitnez.com/admin"  target="_blank"> <img src="{{ asset('asset/img/user.png') }}" alt="">    <span>Admin</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav visible-xs">
                            <li>
                                <a href="#"><img src="{{ asset('asset/img/google.png') }}" alt=""></a>
                            </li>
                            <li>
                                <a href="{{url('/myacc')}}">

                                    <img src="{{ asset('asset/img/user.png') }}" alt="">

                                    <span>My Account</span>

                                </a>
                            </li>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Location<strong class="caret"></strong></a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Second Mneu -->
                <nav class="navbar navbar-default hidden-xs">
                    <div class="container">
                        <ul class="nav navbar-nav ">
                            <li></li>
                            <li>
                                <a href="{{url('/home')}}">Home</a>
                            </li>
                             <li class="dropdown dropdown-large">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Gyms <b class="caret"></b></a>

                                <ul class="dropdown-menu dropdown-menu-large row">
                                    <li class="col-sm-3">
                                        <ul>
                                            <li class="dropdown-header">Glyphicons</li>
                                            <li><a href="#">Available glyphs</a></li>
                                            <li class="disabled"><a href="#">How to use</a></li>
                                            <li><a href="#">Examples</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">Dropdowns</li>
                                            <li><a href="#">Example</a></li>
                                            <li><a href="#">Aligninment options</a></li>
                                            <li><a href="#">Headers</a></li>
                                            <li><a href="#">Disabled menu items</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-3">
                                        <ul>
                                            <li class="dropdown-header">Button groups</li>
                                            <li><a href="#">Basic example</a></li>
                                            <li><a href="#">Button toolbar</a></li>
                                            <li><a href="#">Sizing</a></li>
                                            <li><a href="#">Nesting</a></li>
                                            <li><a href="#">Vertical variation</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">Button dropdowns</li>
                                            <li><a href="#">Single button dropdowns</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-3">
                                        <ul>
                                            <li class="dropdown-header">Input groups</li>
                                            <li><a href="#">Basic example</a></li>
                                            <li><a href="#">Sizing</a></li>
                                            <li><a href="#">Checkboxes and radio addons</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">Navs</li>
                                            <li><a href="#">Tabs</a></li>
                                            <li><a href="#">Pills</a></li>
                                            <li><a href="#">Justified</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-3">
                                        <ul>
                                            <li class="dropdown-header">Navbar</li>
                                            <li><a href="#">Default navbar</a></li>
                                            <li><a href="#">Buttons</a></li>
                                            <li><a href="#">Text</a></li>
                                            <li><a href="#">Non-nav links</a></li>
                                            <li><a href="#">Component alignment</a></li>
                                            <li><a href="#">Fixed to top</a></li>
                                            <li><a href="#">Fixed to bottom</a></li>
                                            <li><a href="#">Static top</a></li>
                                            <li><a href="#">Inverted navbar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Fitness Centers</a>
                            </li>
                            <li>
                                <a href="{{url('/gymListAerobics')}}">Aerobics </a>
                            </li>
                            <li>
                                <a href="{{url('/gymListYoga')}}">Yoga</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>


