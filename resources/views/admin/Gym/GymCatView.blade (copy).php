@extends('admin.layouts.app_inner')

@section('content')

<div class="container spark-screen" style="width:72%;">
    <div class="row">           
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: black;">View Category </h3>
                    
                        
                </div><!-- /.box-header -->


                <form class="form-horizontal" id='frmUpdate' name="frmUpdate" role="form"  method="POST"   enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
        <div class="form-group" style="padding-left: 100px;width: 500px;">
        <label for="exampleInputPassword1">Gym Category Name:</label>
        <input type="text" name="cat_name" id="cat_name" class="form-control"  >  
        </div>
 
       <div class="col-xs-6">
                        <div class="box-footer">
                            <input type="button"  name="submit_frm" lang='' id="submit_frm" value="Update" class="btn btn-primary" />&nbsp;&nbsp;
                            <input type="button" name="cancel"  value="Cancel" class="btn btn-danger" />&nbsp;<span id='errMsg'> </span> &nbsp;&nbsp;<span style="display:none;"id='LoaderImg' ><img src="{{url('admin/img/loadingImg.gif')}}"> </span>
                        </div>
     </div>
                    </form>
                </div><br>
<br><br>
                <div class="box-body">  

                <table class="table table-bordered">


    <thead> 
     
      <tr>
        <th>Sl.No</th>
        <th>Category Name</th>
        <th>Edit</th> 
        <th>Mode</th> 
        
       </tr>
    </thead>
    <tbody>
    <form method='post' name='frmedit' id='frmedit' >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach($GetCatValue as $key=>$cat_nameVal)
      <tr>
        <td>{{ $key+1 }}</td>
        <td><span id='catSpan_{{$cat_nameVal->cat_id}}' >{{$cat_nameVal->cat_name}}</span></td>
         
        <td><input type='button'  lang='{{$cat_nameVal->cat_id}}' class="btn btn-primary getEdVal" id="edit_{{$cat_nameVal->cat_id}}" name="" value="Edit">  </td> 
       <td>
       @if($cat_nameVal->active ==1)
         <span id="btnStay_{{$cat_nameVal->cat_id}}"><button type="button" lang='{{$cat_nameVal->cat_id}}' id='acti_{{$cat_nameVal->cat_id}}' class="btn btn-primary btnacti">Active</button> </span> 
       @else
         <span id="btnStay_{{$cat_nameVal->cat_id}}"> <button type="button" lang='{{$cat_nameVal->cat_id}}' id='acti_{{$cat_nameVal->cat_id}}' class="btn btn-primary btnacti">Deactive</button> </span>
       @endif
       </td>  
      </tr>       
    @endforeach 
    </form>
    </tbody> 
    
  </table>       
             

        

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

     $('#LoaderImg').hide();
      $('#errMsg').html("");
      $('.error').html("");
      $( ".getEdVal" ).live( "click", function() {
        $('#errMsg').html("");
        $('.error').html("");
        var GetViewData=$(this).attr('lang');
         $('#submit_frm').attr('lang','') ;
         $('#cat_name').val("");
         $('#LoaderImg').show();
        $.ajax({  
            type: "POST",
            url: "{{url('admin/editviewCatreg')}}", 
            data: $("#frmedit").serialize()+"&ids="+GetViewData, 
            dataType: 'HTML', 
            success: function(data) 
            {  $('#LoaderImg').hide();
 
                $('#cat_name').val(data);
                $('#submit_frm').attr('lang',GetViewData) ;
                 
                 
            }

            });



      });
       
        $( ".btnacti" ).live( "click", function() {
            $('#errMsg').html("");
             $('.error').html("");
             $('#LoaderImg').show();
            $('#submit_frm').attr('lang','') ;
            $('#cat_name').val("");
            var Ids=$(this).attr('lang');
            $.ajax({  
            type: "POST",
            url: "{{url('admin/actviewCatreg')}}", 
            data: $("#frmedit").serialize()+"&ids="+Ids, 
            dataType: 'HTML', 
            success: function(data) 
            {  
                $('#LoaderImg').hide();
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

          
		 
      $("#submit_frm").click(function(event) { 
          $('#errMsg').html("");
         var catIds=$('#submit_frm').attr('lang');

                  event.preventDefault();

        var validator = $("#frmUpdate").validate({
        rules: { 
                        cat_name:{required: true,},
             
         
        },                             
        messages: {
               cat_name:{ required : "Enter gym category name "    }, 
         
                 
         
        }
        });
             if(validator.form())
             {
               if(catIds !="" && catIds>0) {
                $('#errMsg').html("");
                $('#LoaderImg').show();
                $.ajax({  
                type: "POST",
                url: "{{url('admin/updateCat')}}", 
                data: $("#frmUpdate").serialize()+"&ids="+catIds, 
                dataType: 'HTML', 
                success: function(data) 
                {   //alert(data);
                     $('#LoaderImg').hide();
                    if(data==0)
                    {

                       $('#errMsg').html("<font color='red'>Category already exists!!!</font>");


                    }
                    else
                    {
                     $('#catSpan_'+catIds).html(data);
                     $('#errMsg').html("<font color='green'>Category updated successfully!!!</font>");
                    $('#submit_frm').attr('lang','') ;
                    $('#cat_name').val(""); 
                    setTimeout(function(){
                    $("#errMsg").fadeOut("slow", function () {
                    $('#errMsg').text('');
                    $('#errMsg').show();
                    });
                    }, 2000);
                    }

                }

                });

             }
             else
             {

               $('#errMsg').html("<font color='red'>Update category only!!! </font>");  
             }
           }

              


        });

       $(".btn-danger").click(function(event) {
       
       $('.form-control').val("");
       $('#errMsg').html("");
       $('.error').html("");
       $('#submit_frm').attr('lang','') ;
       $('#LoaderImg').hide();
       
        });   

	});

   
    

</script>
 
 
@endsection
