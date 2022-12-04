<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <title>Welcome to Fitbeanz</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
        <script src="{{ asset('asset/js/jquery.min.js')}}"></script>
        <script src="{{ asset('asset/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('asset/js/script.js') }}"></script>  
<script type="text/javascript" src="{{ asset('asset/js/jquery.validate.min.js') }}"></script>  

</head>
<body>
<div class="page_wrapper">
<header>
	<div class="container">
		<div class="row">

			<div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
				<a href="">
					<img src="{{ asset('asset/images/logo.png') }}" alt="First_organic" class="img-responsive">
				</a>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				    <div class="wizard">
				    	<span class="wizardline"></span>
				       <ul class="nav nav-tabs" role="tablist">

                    		<li role="presentation" class="active">
                    		    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                      			      <span class="round-tab">
                       			         1
                       			     </span>
                       			     <span class="list-tab">
                                             @if(Auth::check())
                                                
                                                 {{ 'Welcome '. ucfirst(trans(Auth::user()->name)) }}

                                             @else
                                                Welcome    
                                             @endif 
                      			    </span>
                        		</a>
                   			 </li>
 
                    		<li role="presentation" >
                    		    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                      			      <span class="round-tab">
                       			         2
                       			     </span>
                       			     <span class="list-tab">
                       			     	Choose Your Basket
                       			    </span>
                        		</a>
                   			 </li>

                    		<li role="presentation">
                    		    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                      			      <span class="round-tab">
                       			         3
                       			     </span>
                       			     <span class="list-tab">
                       			     	Checkout
                       			    </span>
                        		</a>
                   			 </li>
                   		</ul>
                   	</div>
			</div>

			<div class="col-md-2">
				<a id="menu-toggle" href="#" class=" btn-lg toggle">
				<img src="{{ asset('asset/images/menu.svg') }}">
				</a>
			</div>
		</div>
	</div>
</header>

<div id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle">X</a>
    <li class="sidebar-brand">
      <a href="#">Project name</a>
    </li>
    <li>
      <a href="#">Home</a>
    </li>
    <li>
      <a href="#about">About</a>
    </li>
    <li>
      <a href="#contact">Contact</a>
    </li>
 @if(Auth::check())
	<li>
	<a href="{{url('/logout')}}">Logout</a>
	</li>
  
@endif



  </ul>
</div>
