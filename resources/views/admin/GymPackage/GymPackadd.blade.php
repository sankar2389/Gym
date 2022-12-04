@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Package</h4>
                            </div>
                            <div class="content">
                                <form id='frmPackage' name="frmPackage" role="form"  method="POST"  >
                                     
                                   {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class='col-md-12'>Category*</label>
                                                <select class='col-md-12' name='Selcat' id='Selcat' >
                                                <option value="">--Select Category</option>
                                                 @foreach($getcategory as $catKey=>$catVal)
                                                  <option value="{{$catVal['cat_id']}}">{{$catVal['cat_name']}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                              <label for="exampleInputEmail1">Package Name*</label>
                                               <input type="text" name="packname" placeholder="Package name" id="packname"  value="" class="form-control"  >   
                                                 
                                            </div>  
                                        </div>  
                                    </div>

                                      <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">

                                             <label for="exampleInputEmail11">Without trainer*</label>
                                               
                                               <!-- <select name='wt6' id='wt6' >
                                                  <option value='2'>Without trainer</option>
                                               </select> -->
                                                 </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Session*</label>
                                              <input style='width:25%;' type="text" name="whprice4" placeholder="Price" id="whprice1"  value="" class="form-control"  >  
                                            </div>  
                                        </div>

                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Monthly*</label>
                                              <input style='width:25%;' type="text" name="whprice5" placeholder="Price" id="whprice2"  value="" class="form-control"  >  
                                            </div>  
                                        </div>  

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Yearly*</label>
                                              <input style='width:25%;' type="text" name="whprice6" placeholder="Price" id="whprice3"  value="" class="form-control"  >  
                                            </div>  
                                        </div>  
  
                                     </div>

                                     
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                  <label>With trainer</label>  
                                              <!--  <select name='wt1' id='wt1' >
                                                  <option value='1'>With trainer</option>
                                               </select> -->
                                                 </div>
                                        </div>
                                         
                                       <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Session</label>
                                              <input style='width:25%;' type="text" name="whprice1" placeholder="Price" id="whprice1"  value="" class="form-control"  >  
                                            </div>  
                                        </div>

                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Monthly</label>
                                              <input style='width:25%;' type="text" name="whprice2" placeholder="Price" id="whprice2"  value="" class="form-control"  >  
                                            </div>  
                                        </div>  

                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Yearly</label>
                                              <input style='width:25%;' type="text" name="whprice3" placeholder="Price" id="whprice3"  value="" class="form-control"  >  
                                            </div>  
                                        </div>  
                                         
                                    </div>

                                  
                                    



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Package</label>
                                              <textarea rows="5" id='abtTxt' name='abtTxt' class="form-control" placeholder="About package" value="Mike"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                  <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Add Package</button>
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


    var validator = $("#frmPackage").validate({
    rules: { 
                        Selcat:{required: true},
                        packname:{required: true}, 
                        whprice4:{required: true,digits: true}, 
                        whprice5:{required: true,digits: true},
                        whprice6:{required: true,digits: true},
                        //whprice1:{required: true,digits: true}, 
                       // whprice2:{required: true,digits: true},
                        //whprice3:{required: true,digits: true}, 
              },                             
    messages: {
            Selcat:{ required : "Select category name "    }, 
            packname:{ required : "Enter package name "    },
            //whprice1:{required : "Enter price",digits: "Numbers only"}, 
            //whprice2:{required : "Enter price",digits: "Numbers only"},
            //whprice3:{required : "Enter price",digits: "Numbers only"},
            whprice4:{required : "Enter price",digits: "Numbers only"}, 
            whprice5:{required : "Enter price",digits: "Numbers only"},
            whprice6:{required : "Enter price",digits: "Numbers only"}      
    }
    });

         

             if(validator.form())
             {$('#errMsg').html("");
    $.ajax({  
    type: "POST",
    url: "{{url('admin/gymPackageAdd')}}", 
    data: $("#frmPackage").serialize(), 
    dataType: 'HTML', 
    success: function(data) 
    {  
          var ErrMsgs="";
          var ErrType="warning" ;
          if(data==1)
            {
                ErrMsgs="Please try again";
            }
            else if(data==2)
            {
                ErrType="success";
                ErrMsgs="Package add successfully" ;

              $('#abtTxt,#Selcat,#packname,#whprice1,#whprice2,#whprice3,#whprice4,#whprice5,#whprice6').val("");
                $('#abtTxt').html("");

            }
            else if(data==3)
            {
               ErrMsgs="Economic package is empty or inactive please add atleast one economic package first " ;
               $('#abtTxt,#Selcat,#packname,#whprice1,#whprice2,#whprice3,#whprice4,#whprice5,#whprice6').val("");
                $('#abtTxt').html(""); 

            } 
            else if(data==0)
            {
               ErrMsgs="Package already exists" ;
            }
            else if(data==5)
            {
              ErrMsgs="Empty/zero price not allowed in without trainer pack" ;

            }
            else
            {

             ErrMsgs="Please try again";
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
 
 
