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
  
                         <tr>  
                           <td>Gym Name</td>
                           <td><?php echo $postArr['gymName']; ?> </td>
                       </tr>
                      <tr>  
                           <td>Package Name</td>
                           <td><?php echo $postArr['PakName'].' ('.$postArr['pack_desc'].')'; ?> </td>
                       </tr>
                       <tr>  
                           <td>Package Category</td>
                           <td><?php echo $postArr['cat_name']; ?> </td>
                       </tr>
                         <tr>  
                           <td>Name</td>
                           <td><?php  echo $postArr['cname']; ?> </td>
                       </tr> 

                       <tr>  
                           <td>Gender</td>
                           <td><?php  echo $postArr['gender']; ?> </td>
                       </tr> 
                       

                       <tr>  
                           <td>Transaction id</td>
                           <td><?php  echo $postArr['merchantTxnId']; ?> </td>
                       </tr> 
                       <tr>  
                           <td>Package Price</td>
                           <td>&#x20B9;<?php echo $postArr['orderAmount'].'.00'; ?> </td>
                       </tr>
                       <tr>  
                           <td>Email id</td>
                           <td><?php echo $postArr['email']; ?> </td>
                       </tr>
                       <tr>  
                           <td>Mobile No</td>
                           <td><?php echo $postArr['mobile']; ?> </td>
                       </tr>

                       <tr>  
                           <td colspan="2"><span style="color:#666;font-style:italic;">
The booking is valid only for seven days. Please visit the Gym within seven days to avail your services. 

                           </span></td>
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
 


@include('user_include.footer')
 <script src="{{ asset('asset/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() { 

      $('#dealsId').hide();

 
        });
</script>  
