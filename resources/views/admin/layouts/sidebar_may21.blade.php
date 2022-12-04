<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Alivefitnez</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('admin_asset/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('admin_asset/assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('admin_asset/assets/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('admin_asset/assets/css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('admin_asset/assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                     <img src="{{ asset('/admin_asset/img/adminlogo.png') }}" style="width:120px;" >
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                 <?php      

            if(auth()->guard('admin')->check())
            {


		    if(auth()->guard('admin')->user()->id==1)
		    {
		         ?>

                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Gym Account</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymreg') }}">Account Creation</a></li>
                                <li><a href="{{ url('/admin/viewreg') }}">View account's holder</a></li>
                              </ul>
                        </li>


                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Category</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymcat') }}">Add Category</a></li>
                                <li><a href="{{ url('/admin/gymcatView') }}">View/Edit Category</a></li> 
                              </ul>
                        </li>

                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Features</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymFeaturesAdd') }}">Add Features</a></li>
                              </li>
                               <li><a href="{{ url('/admin/updateFatu') }}">View/Edit Features</a></li>  
                              </ul>
                    </li>

                     <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Type</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymTypeAdd') }}">Add Type</a></li>
                              </li>
                               <li><a href="{{ url('/admin/updateType') }}">View/Edit Type</a></li>  
                              </ul>
                    </li>

                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Report</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/Adminreport') }}">View Report</a></li>
                              </li>
                                
                              </ul>
                    </li>

                     <li>
                            <a href="{{url('/admin/logout') }}">
                                <p>Log out ({{auth()->guard('admin')->user()->name}})</p>
                            </a>
                        </li>
		        <?php

		     }
             else
             {
                 ?>

                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Add Profile</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymProfAdd') }}">Add/Update profile</a></li>
                                 
                              </ul>
                    </li>

                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Package</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('admin/gymPackageAdd') }}">Add Package</a></li>
                                <li><a href="{{ url('admin/gymPackageView') }}">View Package</a></li>
                                
                              </ul>
                    </li>

                    
                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Add Working Hour</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymWrkHrAdd') }}">Add Working Hour</a></li>
                              <li><a href="{{ url('/admin/gymWrkHrView') }}">View Working Hour</a></li>
                              </ul>
                    </li>

                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Add Banner</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymBannerAdd') }}">Add Banner</a></li>
                                
                                <li><a href="{{ url('/admin/gymBannerView') }}">List of Banners</a></li>
                                
                              </ul>
                    </li>


                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Pay at Gym</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymPayat') }}">Pay Offline  Entry</a></li>
                                  <li><a href="{{ url('/admin/gymPhyPayat') }}">Physical Attendance Entry</a></li>
                              </ul>
                               
                    </li>

                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Change Password</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/gymChangePass') }}">Change Password</a></li>
                              </ul>
                    </li>
                     
                     <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Pay at Gym</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/report') }}">Update offline  Report</a></li>
                              </li> -->

                     <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Report</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/report') }}">View Report</a></li>
                              </li>
                                
                              </ul>
                    </li>


                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Refund</span>
                                    <p class="hidden-lg hidden-md">
                                        
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="{{ url('/admin/RefundList') }}">Refund List</a></li>
                              </li>
                                
                              </ul>
                    </li>





                
                
                    <li>
                            <a href="{{url('/admin/logout') }}">
                                <p>Log out ({{auth()->guard('admin')->user()->name}})</p>
                            </a>
                        </li>

                  <?php


             }
              }
                ?>

               <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Profile</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>


                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li> -->
		
            </ul> 
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <!--   mobile menu       -->
                <div class="collapse navbar-collapse">
                    <!-- <ul class="nav navbar-nav navbar-left"> -->
                        <!--<li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li> -->
                                 <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">Profile</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu submenu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm "></b>
                                    <span class="notification hidden-sm ">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> --> 
                       <!-- <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li> 
                    </ul>-->

                      <!-- <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>  
                        <li>
                            <a href="{{url('/admin/logout') }}">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>  -->
                </div>
            </div>
        </nav>
 <style>
  @media(max-width:768px){
  .dropdown ul li {float:left; width:100%;}
  .navbar-nav > li{float:left !important; width:100% !important;color:#fff;}
  .navbar-nav > li > a{color:#fff !important;}
  .dropdown-menu.submenu li a{color:#fff !important;}
   p b.caret {display:none;}
  }
  </style>