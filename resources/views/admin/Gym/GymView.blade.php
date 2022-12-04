@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">View user</h4>
                                 
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Sl.No</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                       <th>Edit</th>
                                      <th>Active/Deactive</th>
                                      
                                    </thead>
                                    <tbody>
                                    <form method='post' name='frmedit' id='frmedit' >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @foreach($GetAllusers as $key=>$User) 
                                        <tr>
                                         <td>{{$key+1}}</td>
                                         <td>{{$User->name}}</td>
                                         <td>{{$User->email}}</td>
                                         <td><a href='{{url("admin/editUser/$User->id")}}' ><i style='font-size: 20px;' class='fa fa-edit'></i> </a> </td>
                                         <td>
                                          @if($User->active ==1)
                                            <button class="btn btn-success btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" lang='{{$User->id}}' id='acti_{{$User->id}}' data-original-title="">
                                            <i style='font-size: 15px;' id='Icn_{{$User->id}}' class="fa  fa-check"></i>
                                            @else
                                              <button lang='{{$User->id}}' id='acti_{{$User->id}}' class="btn btn-danger btn-simple btn-xs btnacti" type="button" rel="tooltip" title="" data-original-title="">
                                              <i style='font-size: 15px;' id='Icn_{{$User->id}}' class="fa  fa-times"></i>
                                          @endif   

                                         
                                         </td>
                                        </tr>
                                       @endforeach
                                       <form>  
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

</div>
                    
            </div>
        </div>

@include('admin.layouts.footer')

<script language="javascript">
 
 

 

    $(document).ready(function() {



       
$( ".btnacti" ).on( "click", function() {  
            var Ids=$(this).attr('lang');
            $.ajax({  
            type: "POST",
            url: "{{url('admin/actviewreg')}}", 
            data: $("#frmedit").serialize()+"&ids="+Ids, 
            dataType: 'HTML', 
            success: function(data) 
            {  

                
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
               Gym_name:{ required : "Please enter name "    }, 
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
    

</script>
 