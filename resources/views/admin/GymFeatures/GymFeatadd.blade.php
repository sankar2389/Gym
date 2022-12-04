@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Features</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" role="form"  method="POST" action="{{ url('/admin/gymreg') }}">


                                     
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Features</label>
                                                 

                                                <input type="text" name="feat_name" id="feat_name" class="form-control"  placeholder="Features Name" >  


                                            </div>
                                        </div>
                                         
                                    </div>

                               

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add Features</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

@include('admin.layouts.footer')

<script language="javascript">
    $(document).ready(function() { 
         $('#errMsg').html("");

        $("#submit_frm").click(function(event) {  
                  event.preventDefault();

        var validator = $("#frmlogin").validate({
        rules: { 
                        feat_name:{required: true,},
             
         
        },                             
        messages: {
               feat_name:{ required : "Enter features name "    }, 
         
                 
         
        }
        });
        if(validator.form())
        {$('#errMsg').html("");
        $.ajax({  
        type: "POST",
        url: "{{url('admin/gymFeaturesAdd')}}", 
        data: $("#frmlogin").serialize(), 
        dataType: 'HTML', 
        success: function(data) 
        {   
 
          var ErrMsgs="";
          var ErrType="";
  
          if(data==1)
            {
 
             
             ErrMsgs="Features added successfully";
             ErrType="success" ;
             $('#feat_name').val("");
            }
            else
            {

             
               ErrMsgs="Features already exists!!!";
               ErrType="warning" ;
            }

             $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 1000
            });

        }

        });

             }
              


        });

       $(".btn-danger").click(function(event) {
       
       $('.form-control').val("");
       $('.error').html("");
       
        });   

    });

 </script>
 
