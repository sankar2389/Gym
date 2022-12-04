@include('admin.layouts.sidebar')
<div class="content">
             

<div class="container-fluid">


<div class="panel-group" id="accordion">
 <form method='post' name='frmedit' id='frmedit' >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
     @foreach($GetPackage as $key=>$package_nameVal)

     <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" class='DivShow' id='{{$package_nameVal->pak_id}}' lang='{{$package_nameVal->cat_id}}' data-parent="#accordion" href="#collapse_{{$package_nameVal->pak_id}}">{{$package_nameVal->cat_name}}</a>
        </h4>
      </div>

      <div id="collapse_{{$package_nameVal->pak_id}}" aria-expanded="false" class="panel-collapse collapse">
        <div class="panel-body">  Please wait....  </div>
      </div>
    </div>

     @endforeach
    <?php if(count($GetPackage)==0) {

               ?>
              <div class="panel panel-default">
              <div class="panel-heading">
              <h4 class="panel-title">
              <a data-toggle="collapse" class='DivShow' id='' lang='' data-parent="#accordion" href="">No package found!!!</a>
              </h4>
              </div>

               
              </div>
               <?php


      } ?>
     </form>

  </div> 

                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of Package(s)</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form method='post' name='frmedit' id='frmedit' >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Sl.No</th>
                                        <th>Package Name</th>
                                        <th>Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th> 
                                        <th>Active/Deactive</th>
                                    </thead>
                                    <tbody>

                                      @foreach($GetPackage as $key=>$package_nameVal)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$package_nameVal->package_name}} </td>
                                         <td>{{$package_nameVal->cat_name}} </td>
                                       
                                         <td>
<a href="{{url('admin/editPackage')}}/{{$package_nameVal->pak_id}}" ><i style='font-size: 20px;' class="fa fa-edit"></i> </a>

                                         <!--<button type="button" lang='{{$package_nameVal->pak_id}}'  rel="tooltip" id="edit_{{$package_nameVal->pak_id}}"  title="Edit Task" class="btn btn-info btn-simple btn-xs getEdValzzzz"><a href="{{url('admin/editPackage')}}/{{$package_nameVal->pak_id}}" >zzzz <i class="fa fa-edit"></i> </a>
                                                        
                                                    </button> --> <!-- </td>
                                        
                                        <td class="td-actions text-left">
                                                    <button type="button" lang='{{$package_nameVal->pak_id}}'  rel="tooltip" id="edit_{{$package_nameVal->pak_id}}"  title="Delete" class="btn btn-info btn-simple btn-xs getEdVal">
                                                        <i style='font-size: 20px;' class="fa fa-trash"></i>
                                                    </button>
                                                     
                                                

                                          </td> 
                                        <td>
                                        @if($package_nameVal->active ==1)
                                         
                                        <button class="btn btn-success btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" lang='{{$package_nameVal->pak_id}}' id='acti_{{$package_nameVal->pak_id}}' data-original-title="">
                                          <i id='Icn_{{$package_nameVal->pak_id}}' style='font-size: 15px;' class="fa fa-check"></i>

                                        @else
                                         
                                        <button lang='{{$package_nameVal->pak_id}}' id='acti_{{$package_nameVal->pak_id}}' class="btn btn-danger btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" data-original-title="">
                                              <i style='font-size: 15px;' id='Icn_{{$package_nameVal->pak_id}}' class="fa  fa-times"></i>
                                        @endif
                                        </td>  
                                        </tr>     

                                      @endforeach 

                                      @if(count($GetPackage)==0)
                                        <tr><td class='td-actions text-left' colspan="4">No Data Found </td></tr>
                                      @endif   
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>

 


                </div> -->
            </div>






        </div>

@include('admin.layouts.footer')

<script language="javascript">
 

 

	$(document).ready(function() {
 
    $( ".panel-collapse" ).removeClass( "panel-collapse collapse in" ).addClass( "panel-collapse collapse" );
  $('.panel-collapse').attr('aria-expanded','false')


     $('#LoaderImg').hide();
      $('#errMsg').html("");
      $('.error').html("");


$( ".DivShow" ).on( "click", function() {


  var CatIds=$(this).attr('lang');
  var RowIds=$(this).attr('id')
  //alert($('#collapse_'+RowIds).attr('aria-expanded'));
  

 

if($('#collapse_'+RowIds).attr('aria-expanded')=='false') {
$('.panel-collapse').html('<div>Please wait....</div>');
  $( ".panel-collapse" ).removeClass( "panel-collapse collapse in" ).addClass( "panel-collapse collapse" );
  $('.panel-collapse').attr('aria-expanded','false')

    $.ajax({  
            type: "POST",
            url: "{{url('admin/GetPakList')}}", 
            data: $("#frmedit").serialize()+"&ids="+RowIds+"&catId="+CatIds, 
            dataType: 'JSON', 
            success: function(data) 
            { 

              $('#collapse_'+RowIds).addClass("panel-collapse collapse in");
              $('#collapse_'+RowIds).attr('aria-expanded','true')
              var PushData="";
              
             if(data.length>0)
             {
               for(i=0;i<data.length; i++)
               {
                  
              

              
                 if(data[i].active==0)
                 {
                     var ActiveData='<button class="btn btn-danger btn-simple btn-xs btnactiPack" type="button" rel="tooltip" title="" lang="'+data[i].pak_id+'" id="acti_'+data[i].pak_id+'" data-original-title=""><i id="Icn_'+data[i].pak_id+'" style="font-size: 20px;" class="fa fa-times"></i></button>';
                 }
                 else
                 {

var ActiveData='<button class="btn btn-success btn-simple btn-xs btnactiPack" type="button" rel="tooltip" title="" lang="'+data[i].pak_id+'" id="acti_'+data[i].pak_id+'" data-original-title=""><i id="Icn_'+data[i].pak_id+'" style="font-size: 20px;" class="fa fa-check"></i></button>';

                 }


                 var DeleteData='<button class="btn btn-warning btn-simple btn-xs btnDeletePack" type="button" rel="tooltip" title="" lang="'+data[i].pak_id+'" id="del_'+data[i].pak_id+'" data-original-title=""><i id="DelIcn_'+data[i].pak_id+'" style="font-size: 20px;" class="fa fa-trash"></i></button>';

                 PushData+="<tr><td>"+(i+1)+" </td> <td>"+data[i].package_name+" </td> <td>"+data[i].cat_name+"</td> <td><a href='{{url('admin/editPackage')}}/"+data[i].pak_id+"' ><i style='font-size: 20px;' class='fa fa-edit'></i> </a> </td><td>"+DeleteData+"</td> <td> "+ActiveData+"</td> </tr>";

               }


             }
             else{

               PushData+="<tr> <td colspan='6'>No data found </td> </tr>";

             }
             
 
$('#collapse_'+RowIds).html('<div>  <div class="row"> <div class="col-md-12"><div class="card"><div class="header"><h4 class="title">List of Package(s)</h4></div><div class="content table-responsive table-full-width"><table id="pakListTbl" class="table table-hover table-striped"> <thead> <th>Sl.No</th> <th>Package Name</th> <th>Category</th> <th>Edit</th><th>Delete</th><th>Active/Deactive</th></thead><tbody>'+PushData+'</tbody></table> </div></div></div></div></div>'); 

            
                 
            }

            });
 }
else{

   $('.panel-collapse').attr('aria-expanded','false')
   $( ".panel-collapse" ).addClass("panel-collapse collapse" );
   $('#collapse_'+RowIds).html('<div>  Please wait...  </div>');
}
   

  });

 
$('body').on('click', '.btnDeletePack', function () {

var r = confirm("Are you sure want to delete!");
if (r == true) {
     



 var Ids = $(this).attr('lang'); 
 
 var tr = $(this).closest('tr');
        tr.css("background-color","orange");
        tr.fadeOut(900, function(){
            tr.remove();
      var indexVal;
      $("#pakListTbl tr").each(function (index) { 
        if(index != 0) { 
            $(this).find("td:first").html(index + ""); 
        }
        indexVal=index;
       });
 

           if(indexVal==0)
{
  $('#pakListTbl').html("<tr> <td> No data found</td> </tr>")
}

   });





         $.ajax({  
            type: "POST",
            url: "{{url('admin/packageDelete')}}", 
            data: $("#frmedit").serialize()+"&ids="+Ids, 
            dataType: 'HTML' ,
            success: function(data) 
            { 

           if(data==0)
           {

             alert('Invalid user')
           }
           else if(data==1)
           {

  
           }

            
                 
            }

            });


  
} else {
    
}


 });
       
 
$('body').on('click', '.btnactiPack', function () {  


            $('#errMsg').html("");
             $('.error').html("");
             $('#LoaderImg').show();
            $('#submit_frm').attr('lang','') ;
           
            var Ids=$(this).attr('lang');
            
            $.ajax({  
            type: "POST",
            url: "{{url('admin/actviewPackage')}}", 
            data: $("#frmedit").serialize()+"&ids="+Ids, 
            dataType: 'HTML', 
            success: function(data) 
            {  
                $('#LoaderImg').hide();
                  var Langval="#acti_"+Ids;
                   
                if(data==0)
                { 
                
                     
                     $(Langval).removeClass("btn btn-success btn-simple btn-xs btnactiPack").addClass("btn btn-danger btn-simple btn-xs btnactiPack");
                     $( "#Icn_"+Ids ).removeClass( "fa  fa-check" ).addClass( "fa  fa-times" );
                }
                else
                {
                
                 $(Langval).removeClass("btn btn-danger btn-simple btn-xs btnactiPack").addClass("btn btn-success btn-simple btn-xs btnactiPack");
                  $("#Icn_"+Ids).removeClass("fa  fa-times" ).addClass("fa  fa-check");
                }  

            }

            }); 


 });

         

          
		 
     
  

          

	});

   
    

</script>
 
 
