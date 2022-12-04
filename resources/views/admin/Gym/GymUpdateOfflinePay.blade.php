@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style='float: left;width: auto;'>
                            <div class="header">
                                <h4 class="title">Offline Pay List</h4>
                            </div>
                            <div class="content">
                                <form id='offline'    name="offline" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                              
                                   
                                 <table  id ="report"  class="table table-history">

<thead>
                                      <th>No</th>
                                      <th>Name</th>
                                   <!--    <th>Email</th> -->
                                       <th>Mobile</th> 
                                        <th>Pack.Name</th>  
                                      <th>Trans.Dt</th>
                                      <th>Track-id</th>
                                     <!--  <th>Bank ref-id</th> -->
                                     <!--  <th>Bank trans.-id</th> -->
                                     <th>Price</th>
                                   <!--   <th>Payment Mode</th> -->
                                      <th>Status</th>
                                      <?php  $row=0; ?>  
                                    </thead>
                                  <tbody>
                                  @foreach($GetReport as $key=>$userVal)
                                  <tr><td>{{$key+1}}</td>
                                   <td>{{$userVal->customer_name}}</td>
                                  <!--   <td>{{$userVal->user_email}}</td> -->
                                       <td>{{$userVal->user_mobile}}</td>
                                        <td>{{$userVal->pak_name}}</td> 

                                     <td>{{$userVal->req_date}}</td>
                                      <td>{{$userVal->trans_id}}</td>
                                        
                                   <!--  <td>{{$userVal->res_ref_no !="" ? $userVal->res_ref_no : '---'}}</td> -->
                                      <td>&#x20B9;{{$userVal->price}}</td>
                                      <!-- <td>
                                       <?php 
                                           // if($userVal->pay_offline==0)
                                           // {
                                           //      echo "Online";
                                           // }
                                           // else
                                           // {
                                           //    echo "Offline";
                                           // }

                                       ?>

                                       </td> -->

                                     <td>

                                     <?php 
                                           if($userVal->pay_offline==1 && $userVal->status==1)
                                           {
                                               ?>{{$userVal->pay_result}}<?php        
                                           }
                                           elseif($userVal->pay_offline==1 && $userVal->status==0)
                                           {
                                               ?>
                                                <button type="button" lang='{{$userVal->cus_pay_id}}' name="pay_{{$userVal->cus_pay_id}}" id="pay_{{$userVal->cus_pay_id}}" class="btn btn-success btn-fill has-spinner payNow">Pay now</button>





                                               <?php
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
                                      <tr><td colspan="8">No data found </td></tr>
                                      <?php
                                    }
                                  ?>
                                  </tbody>
                    
                   
               </table> 
                                     

 

                                    
 
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

@include('admin.layouts.footer')

 <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
   <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

   <link href="{{url('admin_asset/css/buttonLoader.css')}}" rel="stylesheet" type="text/css">
<script src="{{url('admin_asset/js/jquery.buttonLoader.js')}}"></script>  
   
<script language="javascript">
 

 

	$(document).ready(function() { 


        $('#report').dataTable();
         $('#errMsg').html("");


         $('#report').on('click', '.payNow', function(){


           
            var ConfirmUpdate = confirm("Are you sure want to pay this package");
        if (ConfirmUpdate == true) {

    var Rid=$(this).attr('lang');
   if(Rid>0)
   {

$('#pay_'+Rid).buttonLoader('start');

     $.ajax({  
    type: "POST",
    url: "{{url('admin/OfflineEntryListSave')}}", 
    data: $("#frmPackage").serialize()+"&rwsId="+Rid, 
    dataType: 'HTML', 
    success: function(data) 
    {  

      $('#pay_'+Rid).buttonLoader('stop');

        if(data==3)
        {
          
           $('#pay_'+Rid).html('SUCCESS');
           $('#pay_'+Rid).attr('lang','');
           $('#pay_'+Rid).attr('disabled','true');

        }
        else if(data==1)
        {

        }
        else if(data==2)
        {

        }

    }

   
    });

   }
   else{

   }


     
} else {
     
}
   
   


});

		

	});

   
    

</script>
 
 
