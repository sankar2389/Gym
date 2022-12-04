@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">


<section class="details">
    <div class="container">
          <div class="row">

          <h2>About us</h2>
<p>
Welcome to Alive Fitnez, the right place for all your fitness needs. 
Now you can look for the best fitness deals in your locality. Travelling to a new town, get a hourly package from a near by fitness center. Never miss your workout.
Our team of fitness enthusiasts are committed to deliver the best user experience by planning & designing great short and long term fitness packages for each customers
Our verified vendors help every customer to experience the best in his fitness routine.
We offer hourly/monthly/yearly fitness packages for the diverse needs of the customers.
All this in one single application at affordable prices.
Why wait? Plan your fitness today.

Download our app in the Play store & iOS.
Also visit www.alivefitnez.com
</p>
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
           



       
 $( ".payBtn" ).on( "click", function(event) {

        
                  event.preventDefault();

 var validator = $("#chkout").validate({
        rules: { 
                        
            emailid:{
            required: true,
            email: true
                 
            },
            mobile:{required: true,digits: true,minlength:10,maxlength:10  },
             
        
         
        },                             
         
        emailid:{
        required : "Please enter email id ",
                email : "Please enter valid email id ",
         
        },
          mobile:{required : "Enter price",digits: "Numbers only",minlength:"Invalid number",maxlength:"Invalid number"}         
         
        
        });

 if(validator.form()){ 

$("#chkout").submit();
 }

  
     


 
  
  
  

 /* <input type="text" name="hidGid" id="hidGid" >
                            <input type="text" name="hidRw" id="hidRw" >   */ 

 });

    });
</script>  
