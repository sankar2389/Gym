@include('admin.layouts.sidebar')
         
          <?php 
           if(isset($GetProfileCnt) && isset($GetWrkHrCnt) && isset($GetBannerCnt))
           {

             ?>
                <div class="content">
                        <div class="row">
                              <div class="col-md-6">
                                <h5>Notification states</h5>
                                <?php 
                                 


                                        if( $GetProfileCnt ==1)
                                        { ?>
                                          <div class="alert alert-success">
                                           
                                            <span><b> Success - </b> Successfully filled Gym profile. </span>
                                        </div>
                                        <?php
                                        }
                                        else
                                        { ?>
                                          <div class="alert alert-warning">
                                            
                                            <span><b> Warning - </b> Need to fill Gym profile.</span>
                                        </div>
                                      
                                        <?php
                                        }

                                         if( $GetWrkHrCnt ==1)
                                        { ?>
                                          <div class="alert alert-success">
                                           
                                            <span><b> Success - </b> Successfully filled Gym Working Hour. </span>
                                        </div>
                                        <?php
                                        }
                                        else
                                        { ?>
                                          <div class="alert alert-warning">
                                            
                                            <span><b> Warning - </b> Need to fill Gym Working Hour.</span>
                                        </div>
                                      
                                        <?php
                                        }

                                        if( $GetBannerCnt >0)
                                        { ?>
                                          <div class="alert alert-success">
                                           
                                            <span><b> Success - </b> Successfully upload Gym image. </span>
                                        </div>
                                        <?php
                                        }
                                        else
                                        { ?>
                                          <div class="alert alert-warning">
                                            
                                            <span><b> Warning - </b> Need to upload Gym image.</span>
                                        </div>
                                      
                                        <?php
                                        }
                                          
                                 


                                  


                                
                                 
                                ?>



                           </div>
                         </div>
                    </div>




             <?php
           }
           else
           {
               

              ?>

             <div class="content">
                        <div class="container-fluid">




                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                  <div class="row">

                                  <div class="col-sm-7 text-center">
                                  <img src="https://cdn4.iconfinder.com/data/icons/simplicio/128x128/message.png" width="60"/>
                                  </div>
                                  <div class="col-sm-5">
                                  <p class="cat_name">Revenue</p>
                                  <h2 class="cat_rating">&#x20B9;{{$GetReportPrice}}</h2>
                                  </div>  

                                  </div>
                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>


                                 <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                  <div class="row">

                                  <div class="col-sm-7 text-center">
                                  <img src="https://cdn4.iconfinder.com/data/icons/simplicio/128x128/message.png" width="60"/>
                                  </div>
                                  <div class="col-sm-5">
                                  <p class="cat_name">Orders</p>
                                  <h2 class="cat_rating">&#x20B9;{{$getWKRevenueCnt}}</h2>
                                  </div>  

                                  </div>
                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>
                               <?php  if(auth()->guard('admin')->user()->id==1){ ?>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                  <div class="row">

                                  <div class="col-sm-7 text-center">
                                  <img src="https://cdn4.iconfinder.com/data/icons/simplicio/128x128/message.png" width="60"/>
                                  </div>
                                  <div class="col-sm-5">
                                  <p class="cat_name">Customer</p>
                                  <h2 class="cat_rating">{{$getWKOrdersCnt}}</h2>
                                  </div>  

                                  </div>

                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>
                                 <?php } ?>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                  <div class="row">

                                  <div class="col-sm-7 text-center">
                                  <img src="https://cdn4.iconfinder.com/data/icons/simplicio/128x128/message.png" width="60"/>
                                  </div>
                                  <div class="col-sm-5">
                                  <p class="cat_name">Pay Gym Request</p>
                                  <h2 class="cat_rating">&#x20B9;{{$getTotOfflineReq}}</h2>
                                  </div>  

                                  </div>
                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>

                               


                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Welcome Fitbeanz</h4>
                                         </div>
                                        <div class="content">
                                            <div id="chartHours" class="ct-chart"></div>
                                            <div class="footer">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Open
                                                    <i class="fa fa-circle text-danger"></i> Click
                                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                 </div>

              <?php
           }

             ?>
   <style> 

   </style>      
        
 @include('admin.layouts.footer')
 


