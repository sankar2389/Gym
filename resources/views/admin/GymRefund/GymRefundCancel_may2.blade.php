@include('admin.layouts.sidebar')

<div class="content">
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Paid Customer List</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form method='post' name='frmedit' id='frmedit' >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="table table-hover table-striped">
                                <input type='hidden' name='Selmode' id='Selmode' value='{{$Selmodes}}' >

                                   <thead>
                                      <th>Sl.No</th>
                                        <th>Name</th>
                                          <th>Mobile</th>
                                            <th>Pack.</th>
                                              <th>Track.Id</th>
                                                <th>Trans.Dt</th>
                                                    
                                                    @if($Selmodes==1)   
                                                       <th>Bank.RefId</th>
                                                      @endif
                                                  
                                                    
                                                    <th>Pay.Mode</th>
                                                     <th>Price</th>
                                                      <th>Status</th>
                                                        <th>Action</th>
                                    </thead>
                                    <tbody><?php $totCnt=0; ?>
                                    @foreach($GetReport as $key=>$vals)
                                                                        
                                      <tr>
                                      
                                       <td>{{$key+1}} </td>
                                        <td>{{$vals->customer_name}} </td>
                                         <td>{{$vals->user_mobile}} </td>
                                          <td>{{$vals->pak_name}} </td>
                                           
                                           <td>{{$vals->trans_id}}</td>

                                            <td>@if($vals->pay_offline==0)
                                              {{ $vals->req_date}}
                                            @else
                                              {{ $vals->payed_offline_dt}}
                                            @endif </td>

                                            @if($Selmodes==1)   
                                             <td> {{ $vals->res_ref_no }}</td>
                                            @endif
                                              <td>@if($vals->pay_offline==0)
                                              {{ 'Online'}}
                                            @else
                                              {{ 'PayAtGym'}}
                                            @endif  </td> 
                                            <td>&#x20b9;{{$vals->price}} </td> 
                                             <td>{{$vals->pay_result}} </td>
                                             
                                              <td><button type="button" lang='{{$vals->cus_pay_id}}' name="pay_{{$vals->cus_pay_id}}" id="pay_{{$vals->cus_pay_id}}" class="btn btn-success btn-fill has-spinner RefundNow" >Refund now</button></td>
                                               

                                        <?php $totCnt++; ?>


                                      </tr>

                                     
                                    @endforeach


                                    <?php if($totCnt==0)
                                    {
                                      ?>
                                      <tr><td colspan='10'>No data found!!! </td> </tr>
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
<link href="{{url('admin_asset/css/buttonLoader.css')}}" rel="stylesheet" type="text/css">
<script src="{{url('admin_asset/js/jquery.buttonLoader.js')}}"></script>
<script language="javascript">
$(document).ready(function() {

     $('#LoaderImg').hide();
      $('#errMsg').html("");
      $('.error').html("");
      $( ".RefundNow" ).on( "click", function() {

         var ConfirmUpdate = confirm("Are you sure want to refund this package");
        if (ConfirmUpdate == true) {


        var GetViewData=$(this).attr('lang');
         $('#pay_'+GetViewData).buttonLoader('start');
        if(GetViewData>0)
        {
  
        $.ajax({  
            type: "POST",
            url: "{{url('admin/RefundResult')}}", 
            data: $("#frmedit").serialize()+"&ids="+GetViewData, 
            dataType: 'HTML', 
            success: function(data) 
            {  

              
                $('#pay_'+GetViewData).buttonLoader('stop');
              var SpData=data.split('#$#');
              if(SpData[0]==1)
              {
                $('#pay_'+GetViewData).text("Refunded");
                $('#pay_'+GetViewData).attr("lang",'');
                $('#pay_'+GetViewData).attr("disabled",'true');
              }
              else
              {
                alert(SpData[1]);
              }
                 
            }

            });


      }
      else
      {  
         location.href="{{URL('/admin/RefundList')}}";
        
      }
}
      });
       
         

	});

   
    

</script>
 
 
