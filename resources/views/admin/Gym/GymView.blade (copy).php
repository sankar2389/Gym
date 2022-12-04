@extends('admin.layouts.app_inner')

@section('content')

<div class="container spark-screen" style="width:72%;">
    <div class="row">           
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: black;">View user </h3>
                    
                        <a style="margin-right:4px; font-weight: bold;float:right;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/users') }}"><i class="fa fa-arrow-left"></i> Back</a> 
                </div><!-- /.box-header -->
                

                <div class="box-body">  

                <table class="table table-bordered">


    <thead> 
     
      <tr>
        <th>Sl.No</th>
        <th>Name</th>
        <th>Email-id</th>
        <th>Date</th>
         
        
       </tr>
    </thead>
    <tbody>
    <form method='post' name='frmedit' id='frmedit' >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach($GetAllusers as $key=>$User)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$User->name}}</td>
        <td>{{$User->email}}</td>
         
       <td>
       @if($User->active ==1)
         <span id="btnStay_{{$User->id}}"><button type="button" lang='{{$User->id}}' id='acti_{{$User->id}}' class="btn btn-primary btnacti">Active</button> </span> 
       @else
         <span id="btnStay_{{$User->id}}"> <button type="button" lang='{{$User->id}}' id='acti_{{$User->id}}' class="btn btn-primary btnacti">Deactive</button> </span>
       @endif
       </td>  
      </tr>       
    @endforeach 
    </form>
    </tbody> 
    
  </table>       
             

         <!-- <form class="form-horizontal" id='frmlogin' name="frmlogin" role="form"  method="POST" action="<?php echo url('/admin/gymreg'); ?>" enctype="multipart/form-data">
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
                    </form> -->
                </div>

            </div> <!-- /.box -->
        </div>
    </div>

 
<script src="{{ asset('/admin/js/jquery.validate.min.js') }}"></script>
 


  <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" /> 

  <style>

            .fstElement { font-size: 1.2em; }
            .fstToggleBtn { min-width: 16.5em; }

            
            .fstMultipleMode { display: block; }
            .fstMultipleMode .fstControls { width: 100%; }

        </style>

    
   
<script language="javascript">
 

 

	$(document).ready(function() {



       //$(".").click(function(event) { 
$( ".btnacti" ).live( "click", function() {
            var Ids=$(this).attr('lang');
            $.ajax({  
            type: "POST",
            url: "{{url('admin/actviewreg')}}", 
            data: $("#frmedit").serialize()+"&ids="+Ids, 
            dataType: 'HTML', 
            success: function(data) 
            {  

                alert(data);
                  var Langval="acti_"+Ids;
                if(data==0)
                { 
                
                $('#btnStay_'+Ids).html('<button type="button" id='+Langval+' lang=' +Ids+ '  class="btn btn-primary btnacti">Deactive</button>');
                }
                else
                {

               $('#btnStay_'+Ids).html('<button type="button" id='+Langval+' lang=' +Ids+ '  class="btn btn-primary btnacti">Active</button>');
                }  

            }

            }); 


 
        });

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
 
 
@endsection
