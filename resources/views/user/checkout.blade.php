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

                    $KeyVal=$secret_key;
                    $totPriceInPaise="";
                    $user_name="";
                    $user_email="";
                    $user_mobile="";
                    $trackIds="";
                    $tot_price="";
                    $pakName="";
                    $packCat="";
                    $PackTypeDesc="";
                    $gymName="";
                   foreach ($sendValue as $key => $value) 
                   {
                     $totPriceInPaise=($value->price*100);
                     $user_email=$value->user_email;
                     $user_mobile=$value->user_mobile;
                     $trackIds=$value->trans_id;
                     $tot_price=$value->price;
                     $user_name=$value->customer_name;

                      $pakName=$value->pak_name;
                      $packCat=$value->cat_name;
                      $PackTypeDesc=$value->pack_desc;
                      $gymName=$passGymName;
                    ?>
                      <tr>  
                           <td>Gym Name</td>
                           <td>{{$passGymName}}</td>
                       </tr>
                      <tr>  
                           <td>Package Name</td>
                           <td>{{$value->pak_name}} </td>
                       </tr>
                       <tr>  
                           <td>Package Category</td>
                           <td>{{$value->cat_name}} </td>
                       </tr>
                       <tr>  
                           <td>Package Type</td>
                           <td>{{$value->pack_desc}} </td>
                       </tr>
                       <tr>  
                           <td>Package Price</td>
                           <td>&#x20B9; {{$value->price}}</td>
                       </tr>
                        <tr>  
                           <td>Name</td>
                           <td>{{$value->customer_name}}</td>
                       </tr>

                       <tr>  
                           <td>Gender</td>
                           <td>{{$value->gender}} </td>
                       </tr>

                       <tr>  
                           <td>Email id</td>
                           <td>{{$value->user_email}} </td>
                       </tr>
                       <tr>  
                           <td>Mobile No</td>
                           <td>{{$value->user_mobile}} </td>
                       </tr>

                       <tr>  <td> </td>
                           <td><button type="button" id="btnCancel" name='btnCancel' class="btn btn-xl btn-primary">CANCEL</button>   <button type="button" id="rzp-button1" name='rzp-button1' class="btn btn-xl btn-primary">CHECKOUT</button>&nbsp<span id='errMsg' style="display: none">Please wait... </span></td>
                       </tr>


                    <?php 
                        
                      }

                    ?>
                   
       
                       
                   </tbody>
               </table> 
              </form>

              <form id='resultId' name='resultId' method='post' action='{{url("/payRazorShowResult")}}'   >
        <input type='hidden' name='hidsuccId' id='hidsuccId' value='' >
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
    #errMsg{

      color: #34A853;
      font-size: 18px;
      font-weight: bold;
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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <!--   <script src="admin/admin_temp/plugins/jquery-validation/jquery.validate.js"></script> -->
   <script type="text/javascript">
   var options = {
    "key": "<?php echo $KeyVal; ?>",
    "amount": "<?php echo $totPriceInPaise ; ?>",
    "name": "<?php echo $user_name; ?>",
    "description": "Gym Package Booking",
    "image": "img/small-logo.png",
    "handler": function (response){ 
$('#errMsg').show();
         $.ajax({
            type: "POST",
               url : '{{url("/paymentRazorRes")}}',
               data :{'razorpay_payment_id':response.razorpay_payment_id,'mode':'CheckoutResponse','trackIds':"<?php echo $trackIds; ?>"},
               dataType: 'JSON',
               success:function(data)
               { 

                if(data.error==0)
                {
 
                  alert(data.result);
                  location.href='{{url("/home")}}';

                }
                else if(data.error==1 && data.result=='success')
                {

                 $('#hidsuccId').val(data.key);
                  $('#resultId').submit();

                }
                else
                {
 
                  alert("Please try again");
                  location.href='{{url("/home")}}';

                }
 
               $('#errMsg').hide();
                

               }
           });
     },
    "modal": {
        "ondismiss": function(){ location.href="{{url('/')}}" },
        //"escape":function(){ alert('escap')},
    },
    "prefill": {
        "name": "<?php echo $user_name; ?>",
        "email": "<?php echo $user_email; ?>",
        "contact":"<?php echo $user_mobile; ?>"
    },
    "notes": {
        "trackId": "<?php echo $trackIds; ?>",
        "totPrice":"<?php echo $tot_price; ?>",
        "name": "<?php echo $user_name; ?>",
        "email": "<?php echo $user_email; ?>",
        "contact":"<?php echo $user_mobile; ?>",
        "PakName":"<?php echo $pakName; ?>",
        "PakCat":"<?php echo $packCat; ?>",
        "PakDesc":"<?php echo $PackTypeDesc; ?>",
        "GymName":"<?php echo $gymName; ?>" 
        
    },
    "theme": {
        "color": "#F37254"
    }
};


var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){

$('#errMsg').hide();
$.ajax({
        type: "POST",
        url: "{{url('/finalPayCheck')}}",
        data :{'trackIds':"<?php echo $trackIds; ?>"},
        dataType: 'HTML',
        success: function(data)
        {
  

           
            if(data==0)
            {
               alert("Please try again");
              location.href='{{url("/home")}}' ;
            }
            else if(data==1)
            {
            $('#rzp-button1,#btnCancel').attr('disabled',true);
            rzp1.open();
            $('#hidsuccId').val("");
            e.preventDefault();
            }

        }

        });

 // $('#rzp-button1,#btnCancel').attr('disabled',true);
 //  rzp1.open();
 //  $('#hidsuccId').val("");
 //  e.preventDefault();
}


 $(document).ready(function(){

$( "#btnCancel" ).click(function( event ) {

  location.href='{{url("/home")}}' ;
});

});
    </script>


@include('user_include.footer')
   
