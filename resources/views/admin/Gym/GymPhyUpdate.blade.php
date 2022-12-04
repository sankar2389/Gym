@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style='float: left;width: auto;'>
                            <div class="header">
                                <h4 class="title">Physical Attendance List</h4>
                            </div>
                            <div class="content">
                                <form id='offline'    name="offline" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                              
                                   
                                 <table  id ="report"  class="table table-history">

<thead>  <input type='hidden' name='hidonoff' id='hidonoff' value='{{$Selopt}}' >
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Mobile</th> 
                                      <th>Pack.Name</th>  
                                      <th>Trans.Dt</th>
                                      <th>Track-id</th>
                                      <th>Price</th>
                                      <th>Status</th>
                                      <th>Phycal attendance</th>
                                      <?php  $row=0; ?>  
                                    </thead>
                                  <tbody>
                                  @foreach($GetReport as $key=>$userVal)
                                  <tr><td>{{$key+1}}</td>
                                   <td>{{$userVal->customer_name}}</td>
                                   <td>{{$userVal->user_mobile}}</td>
                                   <td>{{$userVal->pak_name}}</td> 
                                   <td>{{$userVal->req_date}}</td>
                                   <td>{{$userVal->trans_id}}</td>
                                   <td>&#x20B9;{{$userVal->price}}</td>
                                      

                                     <td>

                                     <?php 
                                       
                                        if($Selopt==1) //online
                                        {
                                            
                                               ?>{{$userVal->pay_result}}<?php        
                                            
                                           
                                         }
                                         elseif($Selopt==2)
                                         {  
                                               ?>{{$userVal->pay_result}}<?php        
                                         }


                                       ?>

                                     </td>
                                     <td> 
                                      <?php 
                                        if($userVal->physical_att==0)
                                        {

                                          ?>

                                         <button id="acti_{{$userVal->cus_pay_id}}" class="btn btn-danger btn-simple btn-xs btnactiPack" type="button" rel="tooltip" title="" data-original-title="" lang="{{$userVal->cus_pay_id}}">
<i id="Icn_{{$userVal->cus_pay_id}}" class="fa fa-times" style="font-size: 20px;"></i>
</button>
                                          <?php

                                        }
                                        else
                                        {

                                          ?>
                                           <button id="acti_{{$userVal->cus_pay_id}}" class="btn btn-success btn-simple btn-xs" type="button" rel="tooltip" title="" data-original-title="" >
<i id="Icn_{{$userVal->cus_pay_id}}" class="fa fa-check" style="font-size: 20px;"></i>
</button>

                                          <?php

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
   
<script language="javascript">
 

 

	$(document).ready(function() { 


        $('#report').dataTable();
         $('#errMsg').html("");


         $('#report').on('click', '.btnactiPack', function(){


            var ConfirmUpdate = confirm("Are you sure want to set physical attendance now");
        if (ConfirmUpdate == true) {

    var Rid=$(this).attr('lang');
     
   if(Rid>0)
   {



     $.ajax({  
    type: "POST",
    url: "{{url('admin/PhyEntrySaveList')}}", 
    data: $("#offline").serialize()+"&rwsId="+Rid, 
    dataType: 'HTML', 
    success: function(data) 
    {  
 
       var Splarr=data.split('$#$');
        var Langval="#acti_"+Rid;
        
       if(Splarr[0]==2)
       {

          $( "#Icn_"+Rid ).removeClass( "fa  fa-times" ).addClass( "fa  fa-check" );
          $(Langval).removeClass("btn btn-danger btn-simple btn-xs btnactiPack" ).addClass("btn btn-success btn-simple btn-xs");  
          $(Langval).attr('lang','');

       


       }
       else
       {
           alert(Splarr[1]);
       }

    }

   
    });

   }
   else{

    location.href="{{URL('/admin/gymPhyPayat')}}";

   }


     
} else {


     
}
   
   


});

		

	});

   
    

</script>
 
 
