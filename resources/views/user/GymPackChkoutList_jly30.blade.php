@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">


<section class="details">
    <div class="container">
          <div class="row">

          <form id='chkout' name='chkout' method='post' >
           <table class="table table-history">
                    
                   <tbody>

              <?php 
 
                 foreach ($chkPriceRwValid as $key => $value) {

                  if($value->price>0 && $value->pack_desc !="" &&  $value->GymName !="" && $value->UserID>0 && $value->PakName !="" &&  $value->Category !=""  ){


                    ?>
                      <tr> <input type='hidden' name='hidrows' id='hidrows' value='<?php  echo $value->pak_price_id; ?>' > 
                           <td>Gym Name</td>
                           <td>{{$value->GymName}} </td>
                       </tr>
                      <tr>  
                           <td>Package Name</td>
                           <td>{{$value->PakName}} </td>
                       </tr>
                       <tr>  
                           <td>Package Category</td>
                           <td>{{$value->Category}} </td>
                       </tr>
                       <tr>  
                           <td>Package Type</td>
                           <td>{{$value->pack_desc}} </td>
                       </tr>
                       <tr>  
                           <td>Package Price</td>
                           <td>&#x20B9;{{$value->price}}.00 </td>
                       </tr>
                        <tr>  
                           <td>Name*</td>
                           <td><input type='text' name='cname' id='cname' > </td>
                       </tr>

                       <tr>  
                           <td>Gender*</td>
                           <td><input type="radio" name="gender" value="Male" checked> Male 
                            <input type="radio" name="gender" value="Female"> Female </td>
                       </tr>

                       


                       <tr>  
                           <td>Email id*</td>
                           <td><input type='text' name='emailid' id='emailid' > </td>
                       </tr>
                       <tr>  
                           <td>Mobile No*</td>
                           <td><input type='text' name='mobile' id='mobile' > </td>
                       </tr>

                       <tr>  
                           <td> </td>
                           <td><button  type='button' lang='<?php echo $value->pak_price_id;  ?>' class="btn btn-dark    btn-sm payBtn">
                                    Checkout
                                    </button>&nbsp;<button  type='button' lang='<?php echo $value->pak_price_id;  ?>' class="btn btn-dark btn-sm payLaterBtn">
                                    Pay at Gym
                                    </button></td>
                       </tr>


                    <?php


                  }


                   
                 }
           ?>

                       <!-- <tr>  
                           <td>Gym Name</td>
                           <td> </td>
                       </tr>
                      <tr>  
                           <td>Package Name</td>
                           <td> </td>
                       </tr>
                       <tr>  
                           <td>Package Category</td>
                           <td> </td>
                       </tr>
                       <tr>  
                           <td>Package Type</td>
                           <td> </td>
                       </tr>
                       <tr>  
                           <td>Package Price</td>
                           <td> </td>
                       </tr>
                       <tr>  
                           <td>Email id</td>
                           <td> </td>
                       </tr>
                       <tr>  
                           <td>Mobile No</td>
                           <td> </td>
                       </tr>

                       <tr>  
                           <td> </td>
                           <td><span class="label label-info">Check Out</span></td>
                       </tr> -->
                   </tbody>
               </table> 
              </form>

          </div>
        </div>
    </div>
</section>


<script src="{{asset('asset/js/jquery.scrolling-tabs.js')}}"></script>
<style> 

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
</style>
<script type="text/javascript">
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

</script>


@include('user_include.footer')
 <script src="{{ asset('asset/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() { 

 
        $(".se-pre-con").show()
        $(".se-pre-con").fadeOut("slow"); 
           

 


$( ".payLaterBtn" ).on( "click", function(event) {

        
                  event.preventDefault();

 var validator = $("#chkout").validate({
        rules: { 
             cname: {required:true},          
            emailid:{
            required: true,
            email: true
                 
            },
            mobile:{required: true,digits: true,minlength:10,maxlength:10  },
             
        
         
        },                             
        cname: {required:'Please enter name'}, 
        emailid:{
        required : "Please enter email id ",
                email : "Please enter valid email id ",
         
        },
          mobile:{required : "Enter price",digits: "Numbers only",minlength:"Invalid number",maxlength:"Invalid number"}         
         
        
        });

 if(validator.form()){


    $('#chkout').attr('action',"{{url('/paymentOffChkOut')}}") 
    $("#chkout").submit();
 }

 });

       
 $( ".payBtn" ).on( "click", function(event) {

        
                  event.preventDefault();

 var validator = $("#chkout").validate({
        rules: { 
             cname: {required:true},          
            emailid:{
            required: true,
            email: true
                 
            },
            mobile:{required: true,digits: true,minlength:10,maxlength:10  },
             
        
         
        },                             
        cname: {required:'Please enter name'}, 
        emailid:{
        required : "Please enter email id ",
                email : "Please enter valid email id ",
         
        },
          mobile:{required : "Enter price",digits: "Numbers only",minlength:"Invalid number",maxlength:"Invalid number"}         
         
        
        });

 if(validator.form()){


    $('#chkout').attr('action',"{{url('/paymentChkOutfinal')}}") 
    $("#chkout").submit();
 }

 });

    });
</script>  
