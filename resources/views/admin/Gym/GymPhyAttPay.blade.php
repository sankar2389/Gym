@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Physical Entry List</h4>
                            </div>
                            <div class="content">
                                <form id='offline' action='{{URL("/admin/PhyEntryList")}}'   name="offline" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                              
                                   

                                       <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Physical attendance entry</label>
                                                 

                                                <input type="text"   name="mobile" id="mobile" class="form-control"    placeholder="Mobile" >  


                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Physical attendance entry</label>
                                                 
                                             <select class="col-md-12" name='Selopt' id='Selopt' >
                                                <option value="">--Select Options</option>
                                                       <option value="1">Online</option>
                                                  <option value="2">Pay at Gym</option>
                                                </select>  
                                                


                                            </div>
                                        </div> 
                                         
                                    </div>
 

 

                                    

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Search</button>
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

                  //event.preventDefault();


		var validator = $("#offline").validate({
		rules: { 

        
                mobile:{required: true,digits: true,minlength:10,maxlength:10  },
                Selopt:{required: true},
		 
		},                             
		messages: {
               mobile:{required : "Enter mobile",digits: "Numbers only",minlength:"Invalid number",maxlength:"Invalid number"},
               Selopt:{required : "Select payment options"}
                
             
	 

           

		 
		}
		});

 
  
             if(validator.form())  
             {  
                $('#offline').submit();
             }
              


		});

       $(".btn-danger").click(function(event) {
       
       $('.form-control').val("");
       $('.error').html("");
       
        });   

	});

   
    

</script>
 
 
