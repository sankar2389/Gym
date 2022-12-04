@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update User</h4>
                            </div>
                            <div class="content">
                                <form id='frmlogin' name="frmlogin" role="form"  method="POST" action="{{ url('/admin/gymreg') }}">

                                <?php 
                                 
                                 $GymName="";
                                 $EmailId="";
                                 foreach ($getUserDetails as $key => $UserVal) {

                                   $GymName=$UserVal->name;
                                   $EmailId=$UserVal->email;
                                   
                                 }


                                ?>
                                    
                                   {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                        <input  type='hidden' name='hid_id' id='hid_id' value='{{$id}}' >  
                                               
                                                <input type="text" value='{{$GymName}}' name="Gym_name" id="Gym_name" class="form-control"  placeholder="Name" >  


                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Email address</label>
                                              <input type="email" readonly value='{{$EmailId}}' name="mailid" placeholder="Email" id="mailid" class="form-control"  >  
                                            </div>
                                        </div>
                                    </div>

                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="typeOpt[]" multiple id="typeOpt">
                                                @foreach($GetType AS $typeVals)
                                                 @if($typeVals->childtype_id =="")
                                                   <option   value="{{$typeVals->Mtype_id}}">{{$typeVals->type_name}}</option>
                                                   @else
                                                    <option selected='true' value="{{$typeVals->Mtype_id}}">{{$typeVals->type_name}}</option>
                                                 @endif
                                                 
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
                                                 @if($catVals->childcat_id =="")
                                                   <option value="{{$catVals->Mcat_id}}">{{$catVals->cat_name}}</option>
                                                   @else
                                                    <option selected='true' value="{{$catVals->Mcat_id}}">{{$catVals->cat_name}}</option>
                                                 @endif

                                                  
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
                                                 @if($fetVals->childfe_id =="")
                                                  <option  value="{{$fetVals->Mfe_id}}">{{$fetVals->features_name}}</option>
                                                  @else
                                                   <option selected='true' value="{{$fetVals->Mfe_id}}">{{$fetVals->features_name}}</option>
                                                  @endif
                                                @endforeach
                                                </select>
                                                 <label class="error3" style='display:none'  >Please select features </label>
                                            </div>
                                        </div>
                                    </div> 


                                


                                    

                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Update User</button>
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
        var hid_ids=$('#hid_id').val();
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
//alert($('#fetOpt').val(""))

       var hIds=$('#hid_id').val() ; 
 if(validator.form() && chkTypValidation==1 && chkCatValidation==1 && chkfetOptValidation==1 && hIds !="" )
             {$('#errMsg').html("");
           $('#submit_frm').attr('disabled', true);
           //.prop('disabled', true);
        $.ajax({  
        type: "POST",
        url: "{{url('admin/gymUpdatereg')}}", 
        data: $("#frmlogin").serialize()+"&fetV="+fetOptVal+"&catV="+catOptVal+"&typV="+typVal, 
        dataType: 'HTML', 
        success: function(data) 
        { 

/*$("#example").multiselect({
   uncheckAllText: "Uncheck All"
}); */

     
       //$("#typeOpt").multiselect("uncheckAll");
       
          $('#typeOpt,#catOpt,#fetOpt,#hid_id').val("");
          $('#typeOpt,#catOpt,#fetOpt').closest('li').removeClass('selected').addClass('');    
          var ErrMsgs="";
          var ErrType="";
    
          if(data==1)
            {
 
             
             ErrMsgs="Account updated successfully";
             ErrType="success" ;
             $('#Gym_name,#mailid').val("");
            }
            else
            {

             
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
 //location.href="{{url('admin/viewreg')}}";
        }

        });

             }
             else{

                if(hIds ==""){
              location.href="{{url('admin/viewreg')}}";
               }
             } 
              


        });

       $(".btn-danger").click(function(event) {
       
       $('.form-control').val("");
       $('.error').html("");
       
        });   

    });

   
    

</script>
 
