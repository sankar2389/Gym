@include('admin.layouts.sidebar')
<div class="content">
             

<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of Banners</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form method='post' name='frmedit' id='frmedit' >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Sl.No</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                        <th>Active/Deactive</th>
                                    </thead>
                                    <tbody>

                                      @foreach($getListBanner as $key=>$ban_nameVal)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><image src='{{url("uploads/thumbnail/")  }}/{{$ban_nameVal->img_path}}'> </td>
                                      

                                        
                                        <td class="td-actions text-left">
                                                    <button type="button" lang='{{$ban_nameVal->ban_id}}'  rel="tooltip" id="edit_{{$ban_nameVal->ban_id}}"  title="Delete" class="btn btn-info btn-simple btn-xs getEdVal">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                     
                                                

                                          </td> 
                                        <td>
                                        @if($ban_nameVal->active ==1)
                                         
                                        <button class="btn btn-success btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" lang='{{$ban_nameVal->ban_id}}' id='acti_{{$ban_nameVal->ban_id}}' data-original-title="">
                                          <i id='Icn_{{$ban_nameVal->ban_id}}' class="fa fa-check"></i>

                                        @else
                                         
                                        <button lang='{{$ban_nameVal->ban_id}}' id='acti_{{$ban_nameVal->ban_id}}' class="btn btn-danger btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" data-original-title="">
                                              <i id='Icn_{{$ban_nameVal->ban_id}}' class="fa  fa-times"></i>
                                        @endif
                                        </td>  
                                        </tr>     

                                      @endforeach 

                                      @if(count($getListBanner)==0)
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
         $('#cat_name').val("");
         $('#LoaderImg').show();
        $.ajax({  
            type: "POST",
            url: "{{url('admin/deleteBanner')}}", 
            data: $("#frmedit").serialize()+"&ids="+GetViewData, 
            dataType: 'HTML', 
            success: function(data) 
            {  
               var errMsg="Try again";
               var errTyp="warning";
               if(data==1)
                 {
                   var errMsg="Deleted successfully";
               var errTyp="success";

                 } 
                $.notify({
                icon: 'pe-7s-gift',
                message:  errMsg ,
                
            },{
                type: errTyp ,
                timer: 1000
            });
               
             location.reload();    
                 
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
            url: "{{url('admin/actviewBanner')}}", 
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
 
 
