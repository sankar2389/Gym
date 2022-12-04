@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">


<section class="details">
    <div class="container">
          <div class="row">

          <form id='chkout2' name='chkout2'  method='post'   >
           <table  id ="report"  class="table table-history">

<thead>
                                      <th>Sl.No</th>
                                      <th>Name</th>
                                   <!--    <th>Email</th> -->
                                    <!--   <th>Mobile</th> -->
                                      <th>Trans.Dt</th>
                                      <th>Track-id</th>
                                      <th>Bank ref-id</th>
                                     <!--  <th>Bank trans.-id</th> -->
                                     <th>Price</th>
                                     <th>Payment Mode</th>
                                      <th>Status</th>
                                      <?php  $row=0; ?>  
                                    </thead>
                                  <tbody>
                                  @foreach($GetReport as $key=>$userVal)
                                  <tr><td>{{$key+1}}</td>
                                   <td>{{$userVal->customer_name}}</td>
                                  <!--   <td>{{$userVal->user_email}}</td> -->
                                   <!--   <td>{{$userVal->user_mobile}}</td> -->
                                     <td>{{$userVal->req_date}}</td>
                                      <td>{{$userVal->trans_id}}</td>
                                       <td>{{ $userVal->res_trans_id !="" ? $userVal->res_trans_id : '---'  }}</td>
                                   <!--  <td>{{$userVal->res_ref_no !="" ? $userVal->res_ref_no : '---'}}</td> -->
                                      <td>&#x20B9;{{$userVal->price}}</td>
                                      <td>
                                       <?php 
                                           if($userVal->pay_offline==0)
                                           {
                                                echo "Online";
                                           }
                                           else
                                           {
                                              echo "Offline";
                                           }

                                       ?>

                                       </td>

                                     <td>

                                     <?php 
                                           if($userVal->pay_offline==0 && $userVal->cancel_status==0)
                                           {
                                                ?>
                                                {{$userVal->pay_result !="" ? $userVal->pay_result: 'NO RESULT' }}
                                                <?php
                                           }
                                           elseif($userVal->pay_offline==1 && $userVal->status==1)
                                           {
                                               ?>{{$userVal->pay_result}}<?php        
                                           }
                                           elseif($userVal->pay_offline==1 && $userVal->status==0)
                                           {
                                              echo "Yet not to pay";
                                           }
                                           else
                                           {
                                              echo "---";
                                           }

                                       ?>

                                     </td>
                                     <?php  $row++; ?> 
                                      </tr>
                                  @endforeach
                                  <?php 
                                    if($row==0)
                                    {
                                      ?>
                                      <td colspan="9">No data found </td>
                                      <?php
                                    }
                                  ?>
                                  </tbody>
                    
                   
               </table> 
              </form>

          </div>
        </div>
    </div>
</section>

 <!--  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>   -->
  <!-- <link href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />
  -->
   <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> 


   <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <!--  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
 
   

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> 
<!-- <script src="{{asset('asset/js/jquery.scrolling-tabs.js')}}"></script> -->
<!-- <style> 

    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;

        background: url(images/loading.gif) center no-repeat #fff;
    }
</style> -->
<!-- <script type="text/javascript">
    ;(function() {
        'use strict';


        $(activate);


        function activate() {

            $('.nav-tabs')
                .scrollingTabs()
                .on('ready.scrtabs', function() {
                $('.tab-content').show();
            });

        }
    }());

</script> -->


@include('user_include.footer')
 <script src="{{ asset('asset/js/jquery.validate.min.js') }}" type="text/javascript"></script>



<script type="text/javascript">
    $(document).ready(function() { 


$('#report').dataTable();
 
        // $(".se-pre-con").show()
        // $(".se-pre-con").fadeOut("slow"); 
           



       
 $( ".payBtn" ).on( "click", function(event) {

        
                  event.preventDefault();

 var validator = $("#chkout").validate({
         rules: { 
                        
        //     emailid:{
        //     required: true,
        //     email: true
                 
        //     },
            mobile:{required: true,digits: true,minlength:10,maxlength:10  },
             
        
         
        },                             
         
        // emailid:{
        // required : "Please enter email id ",
        //         email : "Please enter valid email id ",
         
        // },
          mobile:{required : "Enter price",digits: "Numbers only",minlength:"Invalid number",maxlength:"Invalid number"}         
         
        
        });

 if(validator.form()){ 

//$("#chkout").submit();
 }

  
     


 
  
  
  

 /* <input type="text" name="hidGid" id="hidGid" >
                            <input type="text" name="hidRw" id="hidRw" >   */ 

 });

    });
</script>  
