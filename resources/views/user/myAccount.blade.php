@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">


<section class="details">
    <div class="container">
          <div class="row">

          <form id='chkout' name='chkout' method='post' action="{{url('/MyAccHistory')}}" >
           <table class="table table-history">
                    
                   <tbody>

           
  
                       
                       <tr>  
                           <td>Mobile No*</td>
                           <td><input type='text' name='mobile' id='mobile' > </td>
                       </tr>

                       <tr>  
                           <td> </td>
                           <td><button  type='button' lang='' class="btn btn-info btn-sm payBtn">
                                    Submit
                                    </button></td>
                       </tr>


                    


                   

                      
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
           



       
       
 $( ".payBtn" ).on( "click", function(event) {

        
                  event.preventDefault();

 var validator = $("#chkout").validate({
         rules: { 
                        
         
            mobile:{required: true,digits: true,minlength:10,maxlength:10  },
             
        
         
        }, 

         
        messages: {
          mobile:{required : "Enter mobile",
                   digits: "Numbers only",
                    minlength:"Invalid number",
                    maxlength:"Invalid number"} ,

         }
        
        });

 if(validator.form()){ 

$("#chkout").submit();
 }

  
     


 
  
  
  

 /* <input type="text" name="hidGid" id="hidGid" >
                            <input type="text" name="hidRw" id="hidRw" >   */ 

 });

    });
</script>  
