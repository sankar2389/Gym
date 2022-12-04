@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add/Update Working Hour</h4>
                            </div>
                            <div class="content">
                                <form id='frmWrkHr' name="frmWrkHr" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                              

                                     
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Working Hour From Time*</label>
                                                <select name='Selwhft' id='Selwhft' >
                                                <option value="">From Hour</option>
                                                 @for($i=0;$i<=23; $i++)
                                                  <option value='{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00' >{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00</option>
                                                 @endfor 
                                                </select>
                                                  


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">To Time*</label>
                                                <select name='Selwhtt' id='Selwhtt' >
                                                <option value="">To Hour</option>
                                                 @for($i=0;$i<=23; $i++)
                                                  <option value='{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00' >{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00</option>
                                                 @endfor 
                                                </select>
                                            </div>  
                                        </div>
                                    </div>
                                   

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Peak Hour Mornig From Time*</label>
                                                <select name='SelphMft' id='SelphMft' >
                                                <option value="">From Hour</option>
                                                 @for($i=0;$i<=12; $i++)
                                                  <option value='{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00' >{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00</option>
                                                 @endfor 
                                                </select>
                                                  


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">To Time*</label>
                                                <select name='SelphMtt' id='SelphMtt' >
                                                <option value="">To Hour</option>
                                                 @for($i=0;$i<=12; $i++)
                                                  <option value='{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00' >{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00</option>
                                                 @endfor 
                                                </select>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Peak Hour Evening From Time*</label>
                                                <select name='SelphEft' id='SelphEft' >
                                                <option value="">From Hour</option>
                                                 @for($i=13;$i<=23; $i++)
                                                  <option value='{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00' >{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00</option>
                                                 @endfor 
                                                </select>
                                         
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">To Time*</label>
                                                <select name='SelphEtt' id='SelphEtt' >
                                                <option value="">To Hour</option>
                                                 @for($i=13;$i<=23; $i++)
                                                  <option value='{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00' >{{str_pad( $i, 2, '0', STR_PAD_LEFT)}}:00</option>
                                                 @endfor 
                                                </select>
                                            </div>  
                                        </div>


                                   </div>
                            <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add Time</button>
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

                  event.preventDefault();


    var validator = $("#frmWrkHr").validate({
    rules: { 
              Selwhft:{required: true},
              Selwhtt:{required: true},
              SelphMft:{required: true},
              SelphMtt:{required: true},
              SelphEft:{required: true},
              SelphEtt:{required: true},

     /* pin:{
                    required: true,
                    minlength: 6,
                    
                    digits: true
                },
            location:{
                required: true,
                lettersonly: true 

            },
          add1:{

           required: true,

          },
          mobile:{
            required: true,
            minlength: 6,
            digits: true
          }, */

    
     
    },                             
    messages: {
               Selwhft:{ required : "Select from time"}, 
                Selwhtt:{required : "Select to time"},
                SelphMft:{required : "Select from time"},
                SelphMtt:{required : "Select to time"},
                SelphEft:{required : "Select from time "},
                SelphEtt:{required : "Select to time"}, 
     }
    });

        /*$.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters"); */


             if(validator.form())
             {$('#errMsg').html("");
    $.ajax({  
    type: "POST",
    url: "{{url('admin/gymWrkHrAdd')}}", 
    data: $("#frmWrkHr").serialize(), 
    dataType: 'HTML', 
    success: function(data) 
    {  
            

       


          var ErrMsgs="";
          var ErrType="success" ;
          if(data==1)
            {
                ErrMsgs="Time updated successfully";
            }
            else if(data==0)
            {
               ErrType="Time added successfully" ;
            }
             
             

             $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 1000
            });

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
 
 
