@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">
 

<section class="details" style="height: 60vh;">
    <div class="container">
          <div class="row">

          <form id='chkout' name='chkout' method='post' action="<?php echo $postArr['formPostUrl']; ?>" >


          <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $postArr['merchantTxnId']; ?>" />
         <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $postArr['orderAmount']; ?>" />
 <input type="hidden" id="phoneNumber" name="phoneNumber" value="<?php echo $postArr['mobile']; ?>" />

         <input type="hidden" id="firstName" name="firstName" value="bala" />
         <input type="hidden" id="email" name="email" value="<?php echo $postArr['email']; ?>" />
        <input type="hidden" id="currency" name="currency" value="<?php echo $postArr['currency']; ?>" />
<input type="hidden" name="returnUrl" value="http://alivefitnez.com/paymentTestRes" />
         <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $postArr['securitySignature']; ?>" />
<h4>please wait.........</h4>
        <!--  <input type='submit' value='Submit' > -->
              </form>

          </div>
        </div>
    </div>
</section>


 
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
 


@include('user_include.footer')
 <script src="{{ asset('asset/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() { 

 
        $('#chkout').submit();  


    });
</script>  