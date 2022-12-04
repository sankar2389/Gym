@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Change Password</h4>
                            </div>
                            <div class="content">
                                <form id='changePass' autocomplete="off" name="changePass" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                              
                                   

                                       <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                 

                                                <input type="password" autocomplete="off"  name="curPass" id="curPass" class="form-control"    placeholder="Current Password" >  


                                            </div>
                                        </div> 
                                         
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                 

                                                <input type="password" autocomplete="off" name="password" id="password" class="form-control"    placeholder="New Password" >  


                                            </div>
                                        </div>
                                         
                                    </div>


                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Re-Password</label>
                                                 

                                                <input type="password" autocomplete="off" name="confirmpassword" id="confirmpassword" class="form-control"    placeholder="Re-Password" >  


                                            </div>
                                        </div>
                                         
                                    </div>

                                    

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Change Password</button>
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


		var validator = $("#changePass").validate({
		rules: { 

       curPass:{

required: true, 

       },
              password:{required: true, minlength: 8,
                         },

			confirmpassword:{
                    required: true,
                    minlength: 8,
                      equalTo: "#password"
                   
                },

		 
		},                             
		messages: {
                curPass: {required : "Enter current password "},
               password:{ required : "Enter  password "    },


                confirmpassword:{
                 required: "Enter Confirm Password Same as Password",
                 
         },
             
	 

           

		 
		}
		});

 
//alert(validator.form());

             if(validator.form())  
             { $('#errMsg').html("");
		$.ajax({  
		type: "POST",
		url: "{{url('admin/gymUpdatePass')}}", 
		data: $("#changePass").serialize(), 
		dataType: 'HTML', 
		success: function(data) 
		{  
            
 
		  /*if(data==2)
            {

             $('#errMsg').html("<font color='green'>Password updated successfully</font>");
            }
            else if(data==1)
            {

            $('#errMsg').html("<font color='green'>Invalid current password</font>");

            }
            
              setTimeout(function(){
                    $("#errMsg").fadeOut("slow", function () {
                    $('#errMsg').text('');
                    $('#errMsg').show();
                    });
                    }, 2000);  

            */
           
          var ErrMsgs="Profile save successfully";
          var ErrType="success" ;
          if(data==2)
            { $('#curPass,#password,#confirmpassword').val("");
             ErrMsgs="Password updated successfully";
             $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 5000
            }); 
            }
            else if(data==1)
            {

               ErrMsgs="Invalid current password";
               $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 5000
            }); 
            }
            else{


                location.reload();

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
 
 
