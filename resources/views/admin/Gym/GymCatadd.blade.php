@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Category</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" role="form"  method="POST" action="{{ url('/admin/gymreg') }}">


                                     
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                 

                                                <input type="text" name="cat_name" id="cat_name" class="form-control"  placeholder="Category Name" >  


                                            </div>
                                        </div>
                                         
                                    </div>

                               

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add Category</button>
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
                        cat_name:{required: true,},
             
         
        },                             
        messages: {
               cat_name:{ required : "Please enter category name "    }, 
         
                 
         
        }
        });
             if(validator.form())
             {$('#errMsg').html("");
        $.ajax({  
        type: "POST",
        url: "{{url('admin/gymcat')}}", 
        data: $("#frmlogin").serialize(), 
        dataType: 'HTML', 
        success: function(data) 
        {   


          var ErrMsgs="";
          var ErrType="";
  
          if(data==1)
            {
 
             
             ErrMsgs="Category created successfully";
             ErrType="success" ;
             $('#cat_name').val("");
            }
            else
            {

             
               ErrMsgs="Category already exists!!!";
               ErrType="warning" ;
            }

             $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 1000
            });


          if(data==1)
            {

             $('#errMsg').html("<font color='green'> </font>");
            }
            else
            {

            $('#errMsg').html("<font color='red'> </font>");

            }

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
 
