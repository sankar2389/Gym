@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">


<section class="details">
    <div class="container">
          <div class="row">

          <h2>Privacy Policy</h2>
<p>
The privacy policy is applicable to the websites of Fitbeanz Fitness Company(“Alive Fitnez”) including www.alivefitnez.com, which also comprises of the mobile site, applications for iOS, Android, Windows operating system (all together referred to as “Site”).</p>
By browsing, visiting, accessing and/or using the services on this Site (or searching for any of the pages on this Site), you as customer consent and agree to our privacy policy laid out herein. You also agree that the information furnished by you is lawful, true and correct and does not violate or infringe any laws. In case of any violations, infringement, furnishing of wrongful or unauthorized information, Fitbeanz shall not be liable for the same.</p>
<p>Please note that our privacy policy is subject to change at any time without notice. Therefore, you may periodically review this page to make sure you have the latest version of the privacy policy.
When you access our Site, we collect and store your personal information which is provided by you from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth and customized experience and to give you better service. Further, your personal information is used to administer a promotion and contents on the Site. Also, to reply to queries of the various authorities in regard to your accessing of the Site and services availed by you.</p>
<p>We use data collection devices such as "cookies" on certain pages of the Site to help analyse our web page flow, measure promotional effectiveness, and promote trust and safety. "cookies" are small files placed on your hard drive that assist us in providing our services.</p>
<p>We also use cookies to allow you to enter your password less frequently during a session. Cookies can also help us provide information that is targeted to your interests. You are always free to decline our cookies if your browser permits, although in that case you may not be able to use certain features on the Site. Additionally, you may encounter "cookies" or other similar devices on certain pages of the Site that are placed by third parties. We do not control the use of cookies by third parties. 
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
