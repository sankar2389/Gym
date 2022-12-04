@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style='float: left;width: auto;'>
                            <div class="header">
                                <h4 class="title">View Report</h4>
                                 
                            </div>
                            <div class="content">
                                <table id ="report" class="table table-hover table-striped">
                                    <thead>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Mobile</th>
                                      <th>Trans.Dt</th>
                                      <th>Track-id</th>
                                      <th>Bank ref-id</th>
                                      <th>Bank trans.-id</th>
                                      <th>Pay.Mode</th>
                                      <th>Price</th>
                                      <th>Status</th>
                                      <?php  $row=0; ?>  
                                    </thead>
                                  <tbody>
                                  @foreach($GetReport as $key=>$userVal)
                                  <tr><td>{{$key+1}}</td>
                                    <td>{{$userVal->customer_name}}</td>
                                    <td>{{$userVal->user_email}}</td>
                                    <td>{{$userVal->user_mobile}}</td>
                                    <td>{{$userVal->req_date}}</td>
                                    <td>{{$userVal->trans_id}}</td>
                                    <td>
                                    @if($userVal->res_trans_id !="")
                                    {{$userVal->res_trans_id}}
                                    @else
                                    {{'---'}}
                                    @endif
                                    </td>
                                    <td>
                                    @if($userVal->res_ref_no !="")
                                    {{$userVal->res_ref_no}}
                                    @else
                                    {{'---'}}
                                    @endif
                                    </td>
                                    <td>
                                    @if($userVal->pay_offline==0)
                                    {{'Online'}}
                                    @else
                                    {{'Offline'}}
                                    @endif
                                    </td>
                                    <td>&#x20b9;{{$userVal->price}} </td>
                                    <td>
                                    @if($userVal->pay_result!="")
                                    {{$userVal->pay_result}}
                                    @else
                                    {{'---'}}
                                    @endif
                                    </td>
                                    <?php  $row++; ?> 
                                    </tr>
                                  @endforeach
                                  <?php 
                                    if($row==0)
                                    {
                                      ?>
                                      <tr><td colspan="10">No data found </td></tr>
                                      <?php
                                    }
                                  ?>
                                  </tbody>
                                </table>

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

  });
</script>
    

 
 