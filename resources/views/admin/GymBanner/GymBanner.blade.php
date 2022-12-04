@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Image</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" enctype="multipart/form-data" role="form"  action='{{url("admin/gymBannerAdd")}}' method="POST"  >
                                     
                                   {{ csrf_field() }}

                                  @if(Session::has('error'))
                                  <div class="alert-box success">
                                  <h4 class="title">{!! Session::get('error') !!}</h4>
                                  </div>
                                  @endif

                                 


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image*</label>
                                                 
                                                 <input type="file" name="image" class="aaaaform-control" id="kv_image" /> 

                                            </div>
                                        </div>
                                       
                                    </div>

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add Image</button>
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
 

 

	/* $(document).ready(function() { 
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
            minlength: 6,
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
                    minlength: "Mobile number must be 10 numbers!",
                     
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
 */
   
    

</script>
 
 
