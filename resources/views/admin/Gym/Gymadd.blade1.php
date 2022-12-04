@extends('admin.layouts.app_inner')

@section('content')

<div class="container spark-screen" style="width:72%;">
    <div class="row">           
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: black;">Add user </h3>
                    
                        <a style="margin-right:4px; font-weight: bold;float:right;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/users') }}"><i class="fa fa-arrow-left"></i> Back</a> 
                </div><!-- /.box-header -->
                <div class="box-body">  

                   <!--  @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                    @endif 

                    @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                    @endif -->              
             

          <form class="form-horizontal" id='frmlogin' name="frmlogin" role="form"  method="POST" action="<?php echo url('/admin/gymreg'); ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
		<div class="box-body">
		<div class="form-group" style="padding-left: 100px;width: 500px;">
		<label for="exampleInputPassword1">Gym Name:</label>
		<input type="text" name="Gym_name" id="Gym_name" class="form-control"  >  
		</div>

 	<div class="form-group" style="padding-left: 100px;width: 500px;">
	<label for="exampleInputFile">Mail Id:</label>
	<input type="email" name="mailid" id="mailid" class="form-control"  >  
	</div>
    
       <div class="col-xs-6">
                        <div class="box-footer">
                            <input type="submit"  name="submit" id="submit_frm" value="Submit" class="btn btn-primary" />&nbsp;&nbsp;
                            <input type="button" name="cancel" value="Cancel" class="btn btn-danger" />&nbsp;<span id='errMsg'> </span> 
                        </div>
     </div>
                    </form>
                </div>
            </div> <!-- /.box -->
        </div>
    </div>

<!-- <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="{{ asset('/admin/js/jquery-1.8.3.min.js') }}"></script> -->
<script src="{{ asset('/admin/js/jquery.validate.min.js') }}"></script>

<script type="text/javascript">

function check(value){

//alert(this).attr('id');

}

 /*function check(value){
  
          var prowgt=$("#pro_weight").val();
         
         // alert(prowgt);
          $.ajax({
                type:"POST",
                url :"../admin/Product_display",
               data: {username: username,  "_token": "{{ csrf_token() }}"},
                    success:function(data){
                    if(data=='true'){
                        $("#message").html("<img src='../admin/img/cross.png' />Product is already taken");
                    }
                    else{
                        $("#message").html("<img src='../admin/img/yes.png' />Product is available");
                        
                    }
                }
             }); 
    } */
</script>


  <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" /> 

  <style>

            .fstElement { font-size: 1.2em; }
            .fstToggleBtn { min-width: 16.5em; }

            
            .fstMultipleMode { display: block; }
            .fstMultipleMode .fstControls { width: 100%; }

        </style>

   <script>

                 $('.multipleSelect').fastselect();

            </script>    
   
<script language="javascript">
 

 

	$(document).ready(function() { 
         $('#errMsg').html("");

		$("#submit_frm").click(function(event) {  
                  event.preventDefault();

		var validator = $("#frmlogin").validate({
		rules: { 
                        Gym_name:{required: true,},
			mailid:{
			required: true,
			email: true
				 
			},
		
		 
		},                             
		messages: {
               Gym_name:{ required : "Please enter gym name "    }, 
		mailid:{
		required : "Please enter email id ",
                email : "Please enter valid email id ",
		 
		},
                 
		 
		}
		});
             if(validator.form())
             {$('#errMsg').html("");
		$.ajax({  
		type: "POST",
		url: "{{url('admin/gymreg')}}", 
		data: $("#frmlogin").serialize(), 
		dataType: 'HTML', 
		success: function(data) 
		{  
		  if(data==1)
            {

             $('#errMsg').html("<font color='green'>Account created successfully </font>");
            }
            else
            {

            $('#errMsg').html("<font color='red'>Account already exists!!! </font>");

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
<!-- <script type="text/javascript">

     function check(){


        var username=$("#searchname").val();
         // alert(username);
          $.ajax({
                type:"POST",
                url :"../admin/Productadd_display",
               data: {username: username,  "_token": "{{ csrf_token() }}"},
                    success:function(data){
                    if(data=='true'){
                        $("#message").html("<img src='../admin/img/cross.png' />Product is already taken");
                    }
                    else{
                        $("#message").html("<img src='../admin/img/yes.png' />Product is available");
                        
                    }
                }
             });
    }
     </script> -->
 
@endsection
