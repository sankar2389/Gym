@include('admin.layouts.sidebar')
<style>
    .ui-datepicker-year,.ui-datepicker-month{color: #333 !important;}
</style>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Report</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" role="form"  method="POST" action="{{ url('/admin/AdminreportList') }}">


                                     
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>From </label>
                                                 
                              <input type="text" autocomplete="off" name="fdate" id="fdate"  class="form-control" />
                                                


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>To</label>
                                                 
<input type="text" name="todate" id="todate" autocomplete="off"  class="form-control" />
                                                 

                                            </div>
                                        </div>
                                         
                                    </div>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Gym Users*</label>
                                                <select name='Seluser' class="col-md-12" id='Seluser' >
                                                <option value="">--Select Category</option>
                                                 @foreach($getUserList as $userKey=>$userVal)
                                                  <option value="{{$userVal->id}}">{{$userVal->name}}</option>
                                                 @endforeach
                                                </select>  
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Payment Options*</label>
                                                
                                               <select class="col-md-12" name='Selopt' id='Selopt' >
                                                <option value="">--Select Options</option>
                                                
                                                  <option value="1">Success</option>
                                                  <option value="2">Cancel by user</option>
                                                  <option value="4">Pay at gym</option>
                                                  <option value="5">Re-fund</option>
                                                  <option value="3">Attempt</option>
                                                 
                                                </select>  
                                            </div>
                                        </div>
                                        
                                         
                                    </div>

                               

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Get Report</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>





@include('admin.layouts.footer')
<link type="text/css" href="{{ asset('admin_asset/date_js/jquery-ui.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('admin_asset/date_js/jquery-ui.js') }}"></script>

<script language="javascript">
    $(document).ready(function() { 
         $('#errMsg').html("");

      $( "#fdate" ).datepicker({
      changeMonth: true, 
      changeYear: true  ,
      dateFormat: 'dd-mm-yy',
      onSelect: function(selected) {
          $("#todate").datepicker("option","minDate", selected)
        }
    });

$("#todate").datepicker({
      changeMonth: true, 
      changeYear: true  ,
      dateFormat: 'dd-mm-yy',
               
    });

        $("#submit_frm").click(function(event) {  
                //  event.preventDefault();

        var validator = $("#frmlogin").validate({
        rules: { 
          fdate:{required: true,},
          todate:{required: true,}, 
          Seluser:{required: true,},
          Selopt:{required: true,},
        },                             
        messages: {
               fdate:{ required : "Chose from date"}, 
               todate:{ required : "Chose to date"}, 
               Seluser:{required: "Select User",},
               Selopt:{required: "Select option",},
        }
        });
        if(validator.form())
        {  
           $('#frmlogin').submit();
             }
              


        });

       $(".btn-danger").click(function(event) {
       
       $('.form-control').val("");
       $('.error').html("");
       
        });   

    });

 </script>
 
