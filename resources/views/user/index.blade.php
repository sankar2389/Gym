<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ALIVE</title>

        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="style.css" rel="stylesheet">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
        <link href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet"/>
        <link href="{{ asset('asset/css/style.css') }}" type="text/css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:200" rel="stylesheet">
          <link href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet"/>
                <link href="{{ asset('asset/css/simplelightbox.min.css') }}" rel="stylesheet">
        <script src="{{ asset('asset/js/jquery.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('asset/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('asset/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('asset/js/simple-lightbox.min.js') }}" type="text/javascript"></script>
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
                        <div class="col-lg-2">
                            <a href="" class="logo">
                                <img src="{{ asset('asset/img/logo.png') }}" alt="" width="90" height="37">
                            </a>
                        </div>

                        <div class=" col-lg-10 hidden-xs">
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
                                    <a href="http://alivefitnez.com/admin" target="_blank"> <img src="{{ asset('asset/img/user.png') }}" alt="">    <span>Admin</span></a>
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
                                <a href="{{url('/myacc')}}">

                                    <img src="{{ asset('asset/img/user.png') }}" alt="">

                                    <span>Admin</span>

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
                                <a href="{{url('/gymListAerobics')}}">Aerobics</a>
                            </li>
                            <li>
                                <a href="{{url('/gymListYoga')}}">Yoga</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Banner -->

            <div class="banner">
                <!-- <div class="col-sm-12 col-xs-12 ">  
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

</div> -->

                <form class="search_box form-inline" id='searchFrm' name='searchFrm' method='post' action="{{url('/gymList') }}">


                    <div class="search_div">
                             <div class="col-sm-4 col-md-4 col-md-offset-0 col-xs-12 col-sm-offset-2">



                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select class="form-control text-center type" id='catType' name='catType'>

                         
                            @foreach($getType as $keyVal)
                            <option value="{{$keyVal->type_id}}">{{$keyVal->type_name}} </option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-sm-3 col-xs-12 ">
                        <input type="text" placeholder="Pincode" style="font-weight: bold;" class="search_txt"   name='pin' id='pin'>
                    </div>
                    <div class="col-sm-2 col-xs-12 ">
                        <button  type='submit' id="submit_frm" class="search_btn"> GO </button>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xs-12 " id='ErrDiv'>
                        @if(Session::has('message'))
                        <label for="pin" class="error">{{ Session::get('message') }}</label>
                        @endif 
                    </div>
                </form>


                <div class="features_wrapper_div">
                    <div class="feature_list">
                        <h4>FEATURES IN ALL ALIVE</h4>
                        <ul>
                            <li>
                                <a href="#">
                                    <span>
                                    <img src="{{asset ('img/trainer-rod.svg')}}"  align-item="center" />
                                    </span>
                                   <span>Treadmill</span> 
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/dumbbell.svg')}}" /></span>
                                   <span>Trainer</span> 
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/bicycle.svg')}}" /></span>
                                   <span>Cycling</span> 
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/knocking.svg')}}" /></span>
                                   <span>Trainer</span> 
                                </a>
                            </li>
                                       <li>
                                <!-- <a href="#">
                                    <span>
                                    <img src="{{asset ('img/trainer-rod.svg')}}"  align-item="center" />
                                    </span>
                                   <span>Treadmill</span> 
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/dumbbell.svg')}}" /></span>
                                   <span>Trainer</span> 
                                </a>
                            </li> -->
                           <!--  <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/bicycle.svg')}}" /></span>
                                   <span>Cycling</span> 
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/knocking.svg')}}" /></span>
                                   <span>Trainer</span> 
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/dumbbell.svg')}}" /></span>
                                   <span>Trainer</span> 
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="{{asset ('img/bicycle.svg')}}" /></span>
                                   <span>Cycling</span> 
                                </a>

                            </li -->>
                           
                            
                        </ul>
                    </div> 
                </div>
            </div> 

            <!-- End-banner -->
            <section class="gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <h2 class="section-heading">We Offer</h2>
                        </div>  
                    </div>

                    <div class="row">
<!--
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <a href="{{ asset('asset/img/gallery.jpg')}}" class="big"> <img src="{{ asset('asset/img/gallery.jpg') }}" alt="" class="img-responsive"></a>
                        </div>
-->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="gallery_list">
                                <a href="{{ asset('asset/img/Slide1.png')}}" class="big"><img src="{{ asset('asset/img/Slide1.png') }}" alt="" class="img-responsive"></a>
                            </div>
                            <div class="gallery_list">
                                <a href="{{ asset('asset/img/Slide2.png')}}" class="big"><img src="{{ asset('asset/img/Slide2.png') }}" alt="" class="img-responsive"></a>
                            </div>
                            <div class="gallery_list">
                                <a href="{{ asset('asset/img/Slide3.png')}}" class="big"><img src="{{ asset('asset/img/Slide3.png') }}" alt="" class="img-responsive"></a>
                            </div>
<!--
                            <div class="gallery_list">
                                <a href="{{ asset('asset/img/Slide1.png')}}" class="big"><img src="{{ asset('asset/img/Slide1.png') }}" alt="" class="img-responsive"></a>
                            </div>
-->
                        </div>
                    </div>
                </div>
            </section>

            <!-- Review -->
            <!-- <section class="review">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <h2 class="section-heading">Reviews</h2>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">
                            <div class="set">
                                <h3>Times Now</h3>
                                <p class="text">"fitness app of the year offered to Alive Fitnez"</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">
                            <div class="set">
                                <h3>Times Now</h3>
                                <p class="text">"fitness app of the year offered to Alive Fitnez"</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">
                            <div class="set">
                                <h3>Times Now</h3>
                                <p class="text">"fitness app of the year offered to Alive Fitnez"</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->
            <!-- End Review -->
            <!-- afflite -->
            <section class="afflite">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Affiliation<br><p class="text">"join the run"</p></h2>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12 about-left">
                                        <h3 class="text-right">Affiliation program </h3>
                                        <ul class="list1">
                                            <li><a href="#">Online exposure for everyone</a></li>
                                            <li> <a href="#">Use friendly revenue model</a></li>
                                            <li><a href="#">Lower marketing expenses</a></li>
                                            <li><a href="#">Increase customer base</a></li>
                                            <li><a href="#">Digital order management</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 about-right">
                                        <img src="{{ asset('asset/img/afflite.png') }}" alt="" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end afflite -->
            <footer>
                <div class="container">

                 <div class="col-md-2 col-sm-2">
                        <ul class="footerlist">
                            <!-- <li><a href="#">Partner with Alive</a></li>
                            <li> <a href="#">Business with us</a></li>
                             <li><a href="#">Facilities</a></li>   -->
                        </ul>
                    </div>  
                    <div class="col-md-2 col-sm-2">
                        <ul class="footerlist">
                            <li><a href="#">Home</a></li>
                            <li> <a href="#">Support</a></li>
                            <!-- <li><a href="#">Team</a></li>
                            <li><a href="#">Carees</a></li> -->
                            <li><a href="{{url('/aboutus')}}">About Us</a></li>
                            <!-- <li><a href="{{url('/Product')}}">Product and Service</a></li> -->
                            <li><a href="{{url('/Contact')}}">Contact Us</a></li>
                            <li><a href="#">Affiliation Program </a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2" >
                        <ul class="footerlist">
                            <li><a href="{{url('/privacy')}}">Privacy policy</a></li>
                            <li><a href="{{url('/Refund')}}">Refund Policy</a></li>
                            <li><a href="{{url('/Cancel')}}">Cancel and Return Policy</a></li>
                            <!--  <li><a href="#">Ecommerce Flow and Incorp</a></li> -->

                            <li> <a href="{{url('/termcondition')}}">Terms & Conditions</a></li>
                          <!--   <li><a href="#">Vendar policy</a></li> -->
                        </ul>
                    </div>
                    
                    <div class="col-md-2 col-sm-2">
                        <ul class="footerlist">
                            <li><a href="#">Gyms</a></li>
                            <li> <a href="#">Fitness center</a></li>
                            <li><a href="{{url('/gymListYoga')}}">Yoga center</a></li>
                            <li><a href="{{url('/gymListAerobics')}}">Aerobics</a></li>
                            <li><a href="#">Mental welness</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-2 text-right">
                        <img   width="90" height="40" src="{{ asset('asset/img/logo.png') }}" class="bg_white">
                        <p class="slung white">Fitness & more</p>
                        <ul class="social-network text-center">
                            <li><a target="_blank" href="https://www.facebook.com/Alivefitnez-1322807337813567/"><img src="{{ asset('asset/img/facebook-logo.png') }}" alt="" width="20" height="20"></a></li>
                            <li><a target="_blank" href="https://twitter.com/alivefitnez"><img src="{{ asset('asset/img/twitter-logo.png') }}" alt="" width="20" height="20"></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/alivefitnez/"><img src="{{ asset('asset/img/instagram-logo.png') }}" alt="" width="20" height="20"></a></li>
                        </ul><br/>
                        <div class="col-sm-12">
                            <p class="white"> (&copy;) Fitbeanz Fitness Company </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

<style>
    #searchFrm .error {
        color: #FFF;

    }
</style>
<script language="javascript">




    $(document).ready(function() { 


        $("#catType").change(function() {

            $('#ErrDiv').html("");

        });

        $("#submit_frm").click(function(event) {  




            var validator = $("#searchFrm").validate({
                rules: { 
                    catType:{required: true},
                    pin:{required: true, number: true}, 

                },                             
                messages: {
                    catType:{ required : "Select type"},
                    pin:{required: "Enter pincode", number:"Enter number only"}, 

                }
            });

            if(validator.form()){

                $( "#searchFrm").submit();

            }

        });

    });

    $('a.big').simpleLightbox();

</script> 
