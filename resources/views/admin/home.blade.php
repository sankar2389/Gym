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
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                  <div class="card card-stats" style="background: #767171;color: #fff;">
                                  <div style="display:flex; height:120px;">

                                  <div style="flex:1 40%; padding:30px 0px 0px; text-align:center;">
                                  <img src="{{asset('asset/img/icon-1.png')}}" width="60"/>
                                  </div>
                                  <div style="flex:1 60%; text-align:right; padding:0px 15px;">
                                  <h2 style="font-weight:900;" class="cat_rating">&#x20B9;{{$GetReportPrice}}</h2>
                                       <p class="cat_name">Revenue</p>
                                  </div>  

                                  </div>
                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>


                                 <div class="col-lg-4 col-md-4 col-sm-6">
                                  <div class="card card-stats" style="background: #767171;color: #fff;">
                                  <div style="display:flex; height:120px;">

                                  <div style="flex:1 40%; padding:30px 0px 0px; text-align:center;">
                                  <img src="{{asset('asset/img/task-complete.png')}}" width="60"/>
                                  </div>
                                  <div style="flex:1 60%; text-align:right; padding:0px 15px;">
                                 
                                  <h2 style="font-weight:900;" class="cat_rating">&#x20B9;{{$getWKRevenueCnt}}</h2>
                                       <p class="cat_name">Orders</p>
                                  </div>  

                                  </div>
                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>
                               <?php  if(auth()->guard('admin')->user()->id==1){ ?>
<!--
                                <div class="col-lg-4 col-md-4 col-sm-6">
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

                                   <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> 
                                  </div>
                                </div>
-->
                                 <?php } ?>

                                <div class="col-lg-4 col-md-4 col-sm-6">
                                  <div class="card card-stats" style="background: #767171;color: #fff;">
                                  <div style="display:flex; height:120px;">

                                  <div style="flex:1 40%; padding:30px 0px 0px; text-align:center;">
                                  <img src="{{asset('asset/img/rupee-indian.png')}}" width="60"/>
                                  </div>
                                  <div style="flex:1 60%; text-align:right; padding:0px 15px;">
                                 
                                  <h2 style="font-weight:900;" class="cat_rating">&#x20B9;{{$getTotOfflineReq}}</h2>
                                       <p class="cat_name">Pending Order</p>
                                  </div>  

                                  </div>
                                  <!-- <div class="bottom">

                                  <i class="material-icons pull-left">date_range</i> Last 24 Hours

                                  </div> -->
                                  </div>
                                </div>

                               


                                <div class="col-md-12" >
                                    <div class="card" style='float: left;width: auto;'>
                                        <div class="header">
                                            <h4 class="title">Welcome Fitbeanz</h4>
                                         </div>
                                        <div class="content">

                                        <?php //echo "<pre>"; print_r($showRecentSuccessList); ?>


                                        <table id ="report" class="table table-hover table-striped">
                                    <thead>
                                      <th>No</th>
                                      <th>Name</th>
                                  <!--     <th>Email</th> -->
                                      <th>Mobile</th>
                                      <th>Trans.Dt</th>
                                      <th>Track-id</th>
                                      <th>Bank ref-id</th>
                                      <th>Bank trans.-id</th>
                                      <th>Pay.Mode</th>
                                      <th>Price</th>
                                     <!--  <th>Status</th> -->
                                      <?php  $row=0; ?>  
                                    </thead>
                                  <tbody>
                                  @foreach($showRecentSuccessList as $key=>$userVal)
                                  <tr><td>{{$key+1}}</td>
                                    <td>{{$userVal->customer_name}}</td>
                               <!--      <td>{{$userVal->user_email}}</td> -->
                                    <td>{{$userVal->user_mobile}}</td>
                                    <td>{{$userVal->req_date}}</td>
                                    <td>{{$userVal->trans_id}}</td>
                                    <td>
                                    @if($userVal->res_trans_id !="")
                                    {{$userVal->res_trans_id}}
                                    @else
                                    {{'---'}}
                                    @endif
                                    </td>
                                    <td>
                                    @if($userVal->res_ref_no !="")
                                    {{$userVal->res_ref_no}}
                                    @else
                                    {{'---'}}
                                    @endif
                                    </td>
                                    <td>
                                    @if($userVal->pay_offline==0)
                                    {{'Online'}}
                                    @else
                                    {{'Offline'}}
                                    @endif
                                    </td>
                                    <td>&#x20b9;{{$userVal->price}} </td>
                                    <!-- <td>
                                    @if($userVal->pay_result!="")
                                    {{$userVal->pay_result}}
                                    @else
                                    {{'---'}}
                                    @endif
                                    </td> -->
                                    <?php  $row++; ?> 
                                    </tr>
                                  @endforeach
                                  <?php 
                                    if($row==0)
                                    {
                                      ?>
                                      <tr><td colspan="9">No data found </td></tr>
                                      <?php
                                    }
                                  ?>
                                  </tbody>
                                </table>
                                           <!--  <div id="chartHours" class="ct-chart"></div>
                                            <div class="footer">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Open
                                                    <i class="fa fa-circle text-danger"></i> Click
                                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                                </div>
                                                <hr>
                                            </div> -->
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
 


