</<!DOCTYPE html>
<html lang="en">
    <head>
        <title>4AD</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('front/css/home.css')}}"/>    
        <link rel="stylesheet" type="text/css" href="{{URL::asset('front/css/bootstrap.css')}}"/>    
        <link rel="stylesheet" type="text/css" href="{{URL::asset('front/css/bootstrap.min.css')}}"/>    

        <link href='https://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <script type="text/javascript" src="{{URL::asset('front/js/jquery-1.12.3.js')}}"></script>
        <script src="{{URL::asset('front/js/bootstrap.js')}}"></script>
        <script src="{{URL::asset('front/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('front/js/jquery.cycle.all.js')}}"></script>

        <script src="{{URL::asset('front/js/script.js')}}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
        <script src="{{ asset('/js/jquery.placepicker.js') }}"></script>
        <script>
            var app_url = "<?php echo url(''); ?>/";
            $(document).ready(function () {
                $(".placepicker").placepicker();
            });
        </script>
    </head>
    <body>
        <div class="body">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="top_header">
                            <div class="col-lg-4 col-xs-12 col-sm-4">
                                <div class="social_links">
                                    <ul>
                                        <li><a href=""><img src="front/img/fb.png"/></a></li>
                                        <li><a href=""><img src="front/img/twitter.png"/></a></li>
                                        <li><a href=""><img src="front/img/youtube.png"/></a></li>
                                    </ul>
                                </div>
                            </div>
                            @if (Auth::guest())
                            <div class="col-lg-8 col-xs-12 col-sm-8">
                                <div class="login_signup">
                                    <span><a href="{{ url('/login') }}"><img src="front/img/login.png">LOGIN</a></span>
                                    <span><a href="{{ url('/all_category') }}"><img src="front/img/signup.png">ADD LISTING</a></span>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-8 col-xs-12 col-sm-8">
                                <div class="login_signup">
                                    <span><a href="{{ url('/logout') }}"><img src="front/img/login.png">LOGOUT</a></span>
                                    <span><a href="{{ url('/home') }}"><img src="front/img/signup.png">MY PROFILE</a></span>
                                </div>
                            </div>
                            @endif
                        </div>


                        <div class="logo">
                            <a href="{{ url('') }}"><img src="front/img/logo2.png"/></a>
                        </div>
                    </div>
                </div>
            </header>

            <div  class="search_box">
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-12 col-xs-12 col-sm-12">
                            <p class="search_word">
                                Hav'nt any idea, let's explore best &amp; hot deals arround you!
                            </p>
                        </div>
                        <div class="col-lg-8 col-lg-offset-2">
                            <form role="form" class="search_form" method="" action="{{ url('/search') }}" onsubmit="return fn_search()" >
                                  {{ csrf_field() }}
                                <div class="sdiv">
                                    <input class="placepicker form-control" placeholder="Enter a location" name="location" id="location" style="height:40px;" />
                                </div>
                                <div class="sdiv">
                                    <select class="opt" name="category" id="category">
                                         <option value="">Category</option>
                                        <?php $category = App\Model\Category::select('*')->where('parent', 0)->get(); ?> 
                                        @foreach( $category as $cat )
                                        <option value="{{ $cat->id }}" style="font-weight: bold;">{{ $cat->name }}</option>
                                        <?php $subcategory = App\Model\Category::select('*')->where('parent', $cat->id)->get(); ?> 
                                        @foreach( $subcategory as $sub_cat) 
                                        <option value="{{ $sub_cat->id }}">&nbsp;&raquo;{{ $sub_cat['name'] }}</option>						
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="search">
                                    <input type="text" class="search_input" name="search_txt" id="search_txt" placeholder="Search" autocomplete="off" />
                                    <button class="search-btn"><img src="{{ asset('/front/img/search.png') }}" /></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tags">
                <div class="container">
                    <div class='row'>
                        <div class="tags_list text-center">
                            <button class="btn btn_tags ">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>
                            <button class="btn btn_tags">Lorem impus...</button>

                            <button class="btn btn_tags">Lorem impus...</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot_left">
                                <span>FIND ANY BUSINESS,FASTER!!!</span>
                                <span class="yellow">GET FREE MOBILE APP</span>
                                <span><a href=""><img src="front/img/google.png"></a>
                                    <a href=""><img src="front/img/apple.png"></a></span>

                            </div>

                            <div class="foot_right">
                                <span><a href="">General Terms and Condition</a> | &copy; 2016 <a href="">4ad.ch</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script>
            function fn_search() {
                var location_value = $("#location").val();
                var category_value = $("#category").val();
                var search_value = $("#search_txt").val(); 
                if(location_value == "" && category_value == "" && search_value == "") {
                    alert("Please enter an atleast one search criteria");
                    return false;
                }
            }
        </script>
    </body>
</html>
