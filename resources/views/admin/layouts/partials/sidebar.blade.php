   <aside class="main-sidebar">
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu"> 

            <?php      

            if(auth()->guard('admin')->check())
            {


            if(auth()->guard('admin')->user()->id==1)
            {
                 ?>

                 <li class="active">
                      <a class="" href="{{ url('/admin/home') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard </span>
                      </a>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Gym Account</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('/admin/gymreg') }}">Account Creation</a></li>
                           <li><a class="" href="{{ url('/admin/viewreg') }}">View account's holder</a></li> 
                      </ul>
                  </li>

                 <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Gym Category</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('/admin/gymcat') }}">Add Category</a></li>
                           <li><a class="" href="{{ url('/admin/gymcatView') }}">View/Edit Category</a></li> 
                      </ul>
                  </li>


                 <!-- <li>
                      <a class="" href="{{ url('/admin/gymreg') }}">
                          <i class="icon_genius"></i>
                          <span>Gym Account Create</span>
                      </a>
                  </li> 

                  <li>
                      <a class="" href="{{ url('/admin/Product_add') }}">
                          <i class="icon_genius"></i>
                          <span>Product</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{ url('/admin/Product_itemadd') }}">
                          <i class="icon_genius"></i>
                          <span>Product Item</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{ url('/admin/neworders') }}">
                          <i class="icon_genius"></i>
                          <span>New Orders</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>OBasket</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">General</a></li>
                          <li><a class="" href="buttons.html">Buttons</a></li>
                          <li><a class="" href="grids.html">Grids</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>OChef</span>
                      </a>
                  </li>
                  <li class="sub-menu">                     
                      <a href="javascript:;" class="">
                          <i class="icon_piechart"></i>
                          <span>ORetail</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="chart-chartjs.html">ChartJs</a></li>
                      </ul>                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>OAuction</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_component.html">Form Components</a></li>                          
                          <li><a class="" href="form_validation.html">Form Validation</a></li>
                      </ul>
                  </li>                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>OMerchant</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Campaign</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li>-->

                 <?php


            }
            else
            {

                ?>

                <li class="active">
                      <a class="" href="{{ url('/admin/home') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard </span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Profile</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('/admin/gymProfAdd') }}">Add/Update profile</a></li>
                      </ul>

                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Package</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{url('/admin/gymPackageAdd')}}">Add Package</a></li>
                           
                      </ul>
                  </li>

                <?php

            }



            }



            ?>    
  

           
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>