@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Category</h4>
                            </div>
                            <div class="content">
                                <form   id='frmUpdate' name="frmUpdate" role="form"  method="POST"   enctype="multipart/form-data">

                                     
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                 

                                                <input type="text" name="cat_name" id="cat_name" class="form-control"  placeholder="Category Name" >  


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
                                <h4 class="title">List of Category</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form method='post' name='frmedit' id='frmedit' >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Sl.No</th>
                                        <th>Category</th>
                                        <th>Edit</th>
                                        <th>Active/Deactive</th>
                                    </thead>
                                    <tbody>
                                      @foreach($GetCatValue as $key=>$cat_nameVal)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><span id='catSpan_{{$cat_nameVal->cat_id}}' >{{$cat_nameVal->cat_name}}</span></td>

                                        
                                        <td class="td-actions text-left">
                                                    <button type="button" lang='{{$cat_nameVal->cat_id}}'  rel="tooltip" id="edit_{{$cat_nameVal->cat_id}}"  title="Edit Task" class="btn btn-info btn-simple btn-xs getEdVal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                     
                                                

                                        <!--<input type='button'  lang='{{$cat_nameVal->cat_id}}' class="btn btn-primary getEdVal" id="edit_{{$cat_nameVal->cat_id}}" name="" value="Edit"> --> </td> 
                                        <td>
                                        @if($cat_nameVal->active ==1)
                                        <!--<span id="btnStay_{{$cat_nameVal->cat_id}}"><button type="button" lang='{{$cat_nameVal->cat_id}}' id='acti_{{$cat_nameVal->cat_id}}' class="btn btn-primary btnacti">Active</button> </span> -->
                                        <button class="btn btn-success btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" lang='{{$cat_nameVal->cat_id}}' id='acti_{{$cat_nameVal->cat_id}}' data-original-title="">
                                          <i id='Icn_{{$cat_nameVal->cat_id}}' class="fa fa-check"></i>

                                        @else
                                        <!-- <span id="btnStay_{{$cat_nameVal->cat_id}}"> <button type="button" lang='{{$cat_nameVal->cat_id}}' id='acti_{{$cat_nameVal->cat_id}}' class="btn btn-primary btnacti">Deactive</button> </span> -->
                                        <button lang='{{$cat_nameVal->cat_id}}' id='acti_{{$cat_nameVal->cat_id}}' class="btn btn-danger btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" data-original-title="">
                                              <i id='Icn_{{$cat_nameVal->cat_id}}' class="fa  fa-times"></i>
                                        @endif
                                        </td>  
                                        </tr>     

                                      @endforeach     
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
       
        $( ".btnacti" ).on( "click", function() {
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
                  var Langval="#acti_"+Ids;
                   
                if(data==0)
                { 
                
               // $('#btnStay_'+Ids).html('<button type="button" id='+Langval+' lang=' +Ids+ '  class="btn btn-primary btnacti">Deactive</button>');
               $( "#Icn_"+Ids ).removeClass( "fa  fa-check" ).addClass( "fa  fa-times" );
                     $(Langval).removeClass( "btn btn-success btn-simple btn-xs btnacti" ).addClass( "btn btn-danger btn-simple btn-xs btnacti" );


                }
                else
                {

              // $('#btnStay_'+Ids).html('<button type="button" id='+Langval+' lang=' +Ids+ '  class="btn btn-primary btnacti">Active</button>');

               $( "#Icn_"+Ids ).removeClass( "fa  fa-times" ).addClass( "fa  fa-check" );
                $(Langval).removeClass("btn btn-danger btn-simple btn-xs btnacti"  ).addClass( "btn btn-success btn-simple btn-xs btnacti" );
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
               cat_name:{ required : "Click edit button to get category"    }, 
         
                 
         
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

               $.notify({
                icon: 'pe-7s-gift',
                message: "Edit Category only",
                
            },{
                type: 'warning',
                timer: 1000
            });


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
 
 
