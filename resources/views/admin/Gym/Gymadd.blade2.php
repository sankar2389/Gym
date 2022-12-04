@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add User</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" role="form"  method="POST" action="{{ url('/admin/gymreg') }}">
                                    
                                   {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                 

                                                <input type="text" name="Gym_name" id="Gym_name" class="form-control"  placeholder="Name" >  


                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Email address</label>
                                              <input type="email" name="mailid" placeholder="Email" id="mailid" class="form-control"  >  
                                            </div>
                                        </div>
                                    </div>

                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="typeOpt[]" multiple id="typeOpt">
                                                @foreach($GetType AS $typeVals)
                                                  <option value="{{$typeVals->type_id}}">{{$typeVals->type_name}}</option>
                                                @endforeach
                                                </select>
                                                 <label class="error1" style='display:none'  >Please select type </label>
                                            </div>
                                           
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Category Type</label>
                                                <select name="catOpt[]" multiple id="catOpt">
                                                @foreach($CategoryType AS $catVals)
                                                  <option value="{{$catVals->cat_id}}">{{$catVals->cat_name}}</option>
                                                @endforeach
                                                </select>
                                                 <label class="error2" style='display:none'  >Please select category </label>
                                            </div>
                                        </div>
                                    </div> 
 
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Features</label>
                                                <select name="fetOpt[]" multiple id="fetOpt">
                                                @foreach($Getfeatures AS $fetVals)
                                                  <option value="{{$fetVals->fe_id}}">{{$fetVals->features_name}}</option>
                                                @endforeach
                                                </select>
                                                 <label class="error3" style='display:none'  >Please select features </label>
                                            </div>
                                        </div>
                                    </div> 


                                


                                    

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add User</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

@include('admin.layouts.footer')
<link href="{{ asset('admin_asset/assets/css/jquery.multiselect.css') }}" rel="stylesheet" type="text/css">
<style>
 
ul,li { margin:0; padding:0; list-style:none;}
 
</style>
<script src="{{ asset('admin_asset/assets/js/jquery.multiselect.js') }} "></script>
<script language="javascript">
 
 

 

    $(document).ready(function() { 
         $('#errMsg').html("");
 $("#example").multiselect();
  $('#typeOpt').multiselect({
   // noneSelectedText: 'Select Something (required)',
    columns: 1,
    placeholder: 'Select Type',
    search: true,

});
 
  $('#catOpt').multiselect({
    //noneSelectedText: 'Select Something (required)',
    columns: 1,
    placeholder: 'Select Category',
    search: true,
});

$('#fetOpt').multiselect({
    //noneSelectedText: 'Select Something (required)',
    columns: 1,
    placeholder: 'Select Features',
    search: true,
});

  

 /* $.validator.addMethod("needsSelection", function(value, element) {
        return $(element).multiselect("getChecked").length > 0;
    });

    $.validator.messages.needsSelection = 'You gotta pick something.';

 */
        $("#submit_frm").click(function(event) {  
                  event.preventDefault();

        var validator = $("#frmlogin").validate({
        rules: { 
                        Gym_name:{required: true,},
            mailid:{
            required: true,
            email: true
                 
            },
             typeOpt: "required needsSelection",
        
         
        },                             
        messages: {
               Gym_name:{ required : "Please enter gym name "    }, 
        mailid:{
        required : "Please enter email id ",
                email : "Please enter valid email id ",
         
        },
                 
         
        }
        });

        var typVal=$('#typeOpt').val();
        var catOptVal=$('#catOpt').val();
        var fetOptVal=$('#fetOpt').val();
        var chkTypValidation=0; 
        var chkCatValidation=0;
        var chkfetOptValidation=0;

        if(typVal==null)
        {
            $('.error1').show();
            
        }
        else
        {
           $('.error1').hide();
           chkTypValidation=1;
           
        }

        if(catOptVal==null)
        {
            $('.error2').show();
        }
        else
        {
           $('.error2').hide();
           chkCatValidation=1; 
        }

        if(fetOptVal==null)
        {
            $('.error3').show();
        }
        else
        {
           $('.error3').hide();
           chkfetOptValidation=1; 
        }

        
             if(validator.form() && chkTypValidation==1 && chkCatValidation==1 && chkfetOptValidation==1)
             {$('#errMsg').html("");
        $.ajax({  
        type: "POST",
        url: "{{url('admin/gymreg')}}", 
        data: $("#frmlogin").serialize(), 
        dataType: 'HTML', 
        success: function(data) 
        { 

/*$("#example").multiselect({
   uncheckAllText: "Uncheck All"
}); */

     
       //$("#typeOpt").multiselect("uncheckAll");
       

        $('#typeOpt,#catOpt,#fetOpt').val("");
          $('#typeOpt,#catOpt,#fetOpt').closest('li').removeClass('selected').addClass('');    
          var ErrMsgs="";
          var ErrType="";
   
          if(data==1)
            {
 
             //$('#errMsg').html("<font color='green'>Account created successfully </font>");
             ErrMsgs="Account created successfully";
             ErrType="success" ;
             $('#Gym_name,#mailid').val("");
            }
            else
            {

            //$('#errMsg').html("<font color='red'>Account already exists!!! </font>");
               ErrMsgs="Account already exists!!!";
               ErrType="warning" ;
            }

            $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 5000
            });  
               location.reload();

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
 
