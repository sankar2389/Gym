@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Type</h4>
                            </div>
                            <div class="content">
                                <form   id='frmUpdate' name="frmUpdate" role="form"  method="POST"   enctype="multipart/form-data">

                                     
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>type</label>
                                                 

                                                <input type="text" name="type_name" id="type_name" class="form-control"  placeholder="Type Name" >  


                                            </div>
                                        </div>
                                         
                                    </div>

                               
<div class="pull-right">
                                    <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill ">Update</button> &nbsp;&nbsp;&nbsp;

<button type="submit" name="cancel" id="submit_can"   class="btn btn-info btn-fill ">Cancel</button>
</div>


                                    <div class="clearfix"></div>

                                </form>
                            </div>



                        </div>
                    </div>
                    

                </div>
            </div>

<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of Type</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form method='post' name='frmedit' id='frmedit' >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Sl.No</th>
                                        <th>type</th>
                                        <th>Edit</th>
                                        <th>Active/Deactive</th>
                                    </thead>
                                    <tbody>
                                      @foreach($GetTypeValue as $key=>$type_nameVal)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><span id='catSpan_{{$type_nameVal->type_id}}' >{{$type_nameVal->type_name}}</span></td>

                                        
                                        <td class="td-actions text-left">
                                                    <button type="button" lang='{{$type_nameVal->type_id}}'  rel="tooltip" id="edit_{{$type_nameVal->type_id}}"  title="Edit Task" class="btn btn-info btn-simple btn-xs getEdVal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                     
                                                

                                          </td> 
                                        <td>
                                        @if($type_nameVal->active ==1)
                                        
                                        <button class="btn btn-success btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" lang='{{$type_nameVal->type_id}}' id='acti_{{$type_nameVal->type_id}}' data-original-title="">
                                          <i id='Icn_{{$type_nameVal->type_id}}' class="fa fa-check"></i>

                                        @else
                                        
                                        <button lang='{{$type_nameVal->type_id}}' id='acti_{{$type_nameVal->type_id}}' class="btn btn-danger btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" data-original-title="">
                                              <i id='Icn_{{$type_nameVal->type_id}}' class="fa  fa-times"></i>
                                        @endif
                                        </td>  
                                        </tr>     

                                      @endforeach 
                                      @if(count($GetTypeValue)==0)
                                        <tr><td class='td-actions text-left' colspan="4">No Data Found </td></tr>
                                      @endif
                                    </tbody>
                                </table>
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

     $('#LoaderImg').hide();
      $('#errMsg').html("");
      $('.error').html("");
      $( ".getEdVal" ).on( "click", function() {  
        $('#errMsg').html("");
        $('.error').html("");
        var GetViewData=$(this).attr('lang');
         $('#submit_frm').attr('lang','') ;
         $('#type_name').val("");
         $('#LoaderImg').show();
        $.ajax({  
            type: "POST",
            url: "{{url('admin/editviewType')}}", 
            data: $("#frmedit").serialize()+"&ids="+GetViewData, 
            dataType: 'HTML', 
            success: function(data) 
            {  $('#LoaderImg').hide();
 
                $('#type_name').val(data);
                $('#submit_frm').attr('lang',GetViewData) ;
                 
                 
            }

            });



      });
       
        $( ".btnacti" ).on( "click", function() {  
            $('#errMsg').html("");
             $('.error').html("");
             $('#LoaderImg').show();
            $('#submit_frm').attr('lang','') ;
            $('#type_name').val("");
            var Ids=$(this).attr('lang');
            $.ajax({  
            type: "POST",
            url: "{{url('admin/actviewType')}}", 
            data: $("#frmedit").serialize()+"&ids="+Ids, 
            dataType: 'HTML', 
            success: function(data) 
            {  
                $('#LoaderImg').hide();
                  var Langval="#acti_"+Ids;
                   
                if(data==0)
                { 
                
                
               $( "#Icn_"+Ids ).removeClass( "fa  fa-check" ).addClass( "fa  fa-times" );
                     $(Langval).removeClass( "btn btn-success btn-simple btn-xs btnacti" ).addClass( "btn btn-danger btn-simple btn-xs btnacti" );


                }
                else
                {

              

               $( "#Icn_"+Ids ).removeClass( "fa  fa-times" ).addClass( "fa  fa-check" );
                $(Langval).removeClass("btn btn-danger btn-simple btn-xs btnacti"  ).addClass( "btn btn-success btn-simple btn-xs btnacti" );
                }  

            }

            }); 


 
        });

          
		 
      $("#submit_frm").click(function(event) { 
          $('#errMsg').html("");
         var typeIds=$('#submit_frm').attr('lang');

                  event.preventDefault();

        var validator = $("#frmUpdate").validate({
        rules: { 
                        type_name:{required: true,},
             
         
        },                             
        messages: {
               type_name:{ required : "Empty field name not allowed"    }, 
         
                 
         
        }
        });
             if(validator.form())
             {
               if(typeIds !="" && typeIds>0) {
                $('#errMsg').html("");
                $('#LoaderImg').show();
                $.ajax({  
                type: "POST",
                url: "{{url('admin/updateType')}}", 
                data: $("#frmUpdate").serialize()+"&ids="+typeIds, 
                dataType: 'HTML', 
                success: function(data) 
                {    
                     $('#LoaderImg').hide();
                    if(data==0)
                    {

                      // $('#errMsg').html("<font color='red'>type already exists!!!</font>");
                        $.notify({
                        icon: 'pe-7s-gift',
                        message: "Type already exists",

                        },{
                        type: 'warning',
                        timer: 1000
                        });


                      
 

                    }
                    else
                    {
                     $('#catSpan_'+typeIds).html(data);
                     
                    $('#submit_frm').attr('lang','') ;
                    $('#type_name').val(""); 

                     $.notify({
                        icon: 'pe-7s-gift',
                        message: "Type updated successfully",

                        },{
                        type: 'success',
                        timer: 1000
                        });
                   
                    }

                }

                });

             }
             else
             {
          $('#submit_frm').attr('lang','') ;
                    $('#type_name').val(""); 

               $.notify({
                icon: 'pe-7s-gift',
                message: "Edit option only",
                
            },{
                type: 'warning',
                timer: 1000
            });


               $('#errMsg').html("<font color='red'>Update type only!!! </font>");  
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

          $("#submit_can").click(function(event) {
        event.preventDefault();

       $('.form-control').val("");
       $('#errMsg').html("");
       $('.error').html("");
       $('#submit_frm').attr('lang','') ;
       //$('#LoaderImg').hide();
       
        });  

	});

   
    

</script>
 
 
