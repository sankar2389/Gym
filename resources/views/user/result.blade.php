@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">


<section class="details">
    <div class="container">
          <div class="row">
           <table class="table table-history" align="center">
            <tbody>
           
            <tr>
            <td>Gym Name</td><td><?php echo $ResultArr[0]->name ; ?></td>
            </tr>

            
            <tr>
            <td>Package Name</td><td><?php echo $ResultArr[0]->pak_name.'('.$ResultArr[0]->cat_name.'-'.$ResultArr[0]->pack_desc.') '; ?></td>
            </tr>

            <tr>
            <td>Result</td><td><?php echo $ResultArr[0]->pay_result; ?></td>
            </tr>

            <tr>
            <td>Name/Gender</td><td><?php echo ucfirst($ResultArr[0]->customer_name); ?>/<?php echo $ResultArr[0]->gender; ?></td>
            </tr>

            
            <tr>
            <td>Mobile</td><td><?php echo $ResultArr[0]->user_mobile; ?></td>
            </tr>
        
            <tr>
            <td>Email</td><td><?php echo $ResultArr[0]->user_email; ?></td>
            </tr>
 
            <tr>
            <td>Amount</td><td>&#x20B9;<?php echo $ResultArr[0]->price; ?></td>
            </tr>

            <tr>
            <td>Date</td><td><?php echo date('d-m-Y', strtotime($ResultArr[0]->req_date)); ?></td>
            </tr>


             <tr>
             
            </tr>
            </tbody>
           </table>
          
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

     $('#dealsId').hide();//css('display','hidden'); 
     $('footer').css({'position':'absolute','bottom':'0'});
    });
</script>  