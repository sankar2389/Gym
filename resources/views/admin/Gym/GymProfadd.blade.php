@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add/Update Profile</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gym Name*</label>
                                                 

                                     <input type="text" name="Gym_name" id="Gym_name" class="form-control" value="<?php   echo isset($GymName[0]) ? $GymName[0]->name :''; ?>" readonly placeholder="Name" >  


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Pincode*</label>
                                              <input type="text" name="pin" placeholder="Pincode" id="pin" class="form-control" value="<?php  echo isset($getValue[0]) ? $getValue[0]['pincode']:''; ?>"  >  
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location*</label>
                                                 

                                                <input type="text" name="location" id="location" class="form-control"  placeholder="Location" value="<?php  echo isset($getValue[0]) ? $getValue[0]['area_location']:''; ?>" >  


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Address*</label>
                                              <input type="text" name="add1" placeholder="Address" id="add1"  value="<?php  echo isset($getValue[0]) ? $getValue[0]['address1']:''; ?>" class="form-control"  >  
                                            </div>  
                                        </div>
                                    </div>

                                       <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Land mark</label>
                                                 

                                                <input type="text" name="landmark" id="landmark" class="form-control" value="<?php  echo isset($getValue[0]) ? $getValue[0]['land_mark']:''; ?>"  placeholder="landmark" >  


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Mobile*</label>
                                              <input type="text" name="mobile" placeholder="Mobile" id="mobile" class="form-control" value="<?php  echo isset($getValue[0]) ? $getValue[0]['cell_no']:''; ?>"  >  
                                            </div>  
                                        </div>
                                    </div>

                                    

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add/Update profile</button>
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
                        Gym_name:{required: true,},
			pin:{
                    required: true,
                    minlength: 6,
                    
                    digits: true
                },
            location:{
                required: true,
                lettersonly: true 

            },
          add1:{

           required: true,

          },
          mobile:{
            required: true,
            minlength: 10,
            maxlength: 10,
            digits: true
          },

		
		 
		},                             
		messages: {
               Gym_name:{ required : "Enter gym name "    }, 
		pin: {
                    required: "Enter your postal code!",
                    minlength: "Postal code must be 6 numbers!",
                     
                    digits: "Postal code must be 6 numbers!"
                },

         location:{
                 required: "Enter your location!",
                 lettersonly: "Enter letters only!", 
         },
          add1:{
                 required: "Enter your address!",
            },
            mobile: {
                    required: "Enter your mobile number!",
                    minlength: "Mobile number must be 10 numbers only!",
                    maxlength: "Mobile number must be 10 numbers only!" ,
                    digits: "Mobile number must be 10 numbers!"
                },     

		 
		}
		});

        $.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters");


             if(validator.form())
             {$('#errMsg').html("");
		$.ajax({  
		type: "POST",
		url: "{{url('admin/gymProfSave')}}", 
		data: $("#frmlogin").serialize(), 
		dataType: 'HTML', 
		success: function(data) 
		{  
            

		  /* if(data==1)
            {

             $('#errMsg').html("<font color='green'>Profile updated successfully </font>");
            }
            else
            {

            $('#errMsg').html("<font color='green'>Profile save successfully </font>");

            }

              setTimeout(function(){
                    $("#errMsg").fadeOut("slow", function () {
                    $('#errMsg').text('');
                    $('#errMsg').show();
                    });
                    }, 2000); */


          var ErrMsgs="Profile save successfully";
          var ErrType="success" ;
          if(data==1)
            {
             ErrMsgs="Profile updated successfully";
            }
             

             $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 5000
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
 
 
