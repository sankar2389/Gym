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
         
        
 @include('admin.layouts.footer')
 


