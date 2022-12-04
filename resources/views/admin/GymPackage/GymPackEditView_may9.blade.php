@include('admin.layouts.sidebar')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Package</h4>
                            </div>
                            <div class="content">
                                <form id='frmPackage' name="frmPackage" role="form"  method="POST"  >

                                <?php 
                                 
                                 $pakName=''; 
                                 $abt_package='';
                                 $W_T_Hr='';
                                 $W_T_Mn='';
                                 $W_T_Yr='';
                                 $WO_T_Hr='';
                                 $WO_T_Mn='';
                                 $WO_T_Yr='';
                                 $Pak_id='';
 
                                 foreach($GetPackage as $Key=>$Pakval){
                                   $pakName=$Pakval->package_name; 
                                   $abt_package=$Pakval->abt_package ;
                                   $Pak_id=$Pakval->pak_id;
                                   $Catid=$Pakval->cat_id;

                                   if($Pakval->tra_id ==1 && $Pakval->dur_id ==1 )
                                   {
                                      $W_T_Hr=$Pakval->price;
                                   }
                                   elseif($Pakval->tra_id ==1 && $Pakval->dur_id ==2 )
                                   {
                                       $W_T_Mn=$Pakval->price;
                                   }
                                   elseif($Pakval->tra_id ==2 && $Pakval->dur_id ==1 )
                                   {
                                       $WO_T_Hr=$Pakval->price;
                                   }
                                   elseif($Pakval->tra_id ==2 && $Pakval->dur_id ==2 )
                                   {

                                     $WO_T_Mn=$Pakval->price;

                                   }
                                   elseif($Pakval->tra_id ==1 && $Pakval->dur_id ==3)
                                   {
                                        $W_T_Yr=$Pakval->price;

                                   }
                                   elseif($Pakval->tra_id ==2 && $Pakval->dur_id ==3)
                                   {
                                      $WO_T_Yr=$Pakval->price;
                                   }



                                 }


                                ?>
                                     
                                   {{ csrf_field() }}
                                    <div class="row">

                                     <div class="col-md-6">
                                           <div class="form-group">
                                                <label>Category*</label>
                                                <select name='Selcat' id='Selcat' >
                                                <option value="">--Select Category</option>
                                                 @foreach($getcategory as $catKey=>$catVal)
                                                 @if($catVal['cat_id']==$Catid)
                                                 <?php $chkSel = 'selected'; ?>
                                                 @else
                                                 <?php $chkSel = ''; ?>
                                                 @endif
                                                  <option <?php echo $chkSel; ?> value="{{$catVal['cat_id']}}">{{$catVal['cat_name']}}</option>
                                                 @endforeach
                                                </select>
                                            </div>   
                                        </div>
                                       <input type='hidden' name='hid_id' id='hid_id' value="{{$Pak_id}}" >
                                         <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Package Name*</label>
                                               <input type="text" name="packname" placeholder="Package name" id="packname"  value="{{$pakName}}" class="form-control"  >   
                                                 
                                            </div>  
                                        </div> 

                                        
                                    </div>  

                                     
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trainer option</label>
                                               <select name='wt1' id='wt1' >
                                                  <option value='1'>With trainer</option>
                                               </select>
                                                 </div>
                                        </div>
                                         
                                            <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Duration</label>
                                              <select name='wh1' id='wh1' >
                                                  <option value='1'>Hourly</option>
                                               </select>

                                            </div>  
                                        </div> 

                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail11">Price</label>
                                              <input type="text" name="whprice1" placeholder="Price" id="whprice1" style='width:25%;' value="{{$W_T_Hr}}" class="form-control"  >  
                                            </div>  
                                        </div> 
                                         
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trainer option</label>
                                               <select name='wt2' id='wt2' >
                                                  <option value='1'>With trainer</option>
                                               </select>
                                                 </div>
                                        </div>
                                         
                                            <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Duration</label>
                                              <select name='wh2' id='wh2' >
                                                  <option value='2'>Monthly</option>
                                               </select>

                                            </div>  
                                        </div> 

                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Price</label>
                                              <input type="text" name="whprice2" placeholder="Price" id="whprice2" style='width:25%;' value="{{$W_T_Mn}}" class="form-control"  >  
                                            </div>  
                                        </div> 
                                         
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trainer option</label>
                                               <select name='wt5' id='wt5' >
                                                  <option value='1'>With trainer</option>
                                               </select>
                                                 </div>
                                        </div>
                                         
                                            <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Duration</label>
                                              <select name='wh5' id='wh5' >
                                                  <option value='3'>Yearly</option>
                                               </select>

                                            </div>  
                                        </div> 
                                         <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Price</label>
                                              

                                              <input style='width:25%;' type="text" name="whprice5" placeholder="Price" style='width:25%;' id="whprice5"  value="{{$W_T_Yr}}" class="form-control"  >    
                                            </div>  
                                        </div> 
                                    </div>



                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trainer option</label>
                                               <select name='wt3' id='wt3' >
                                                  <option value='2'>Without trainer</option>
                                               </select>
                                                 </div>
                                        </div>
                                         
                                            <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Duration</label>
                                              <select name='wh3' id='wh3' >
                                                  <option value='1'>Hourly</option>
                                               </select>

                                            </div>  
                                        </div> 

                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Price</label>
                                             <!-- <input type="text" name="whprice3" placeholder="Price" id="whprice3"  value="" class="form-control"  > -->

                                              <input type="text" name="whprice3" placeholder="Package name" id="whprice3" style='width:25%;'  value="{{$WO_T_Hr}}" class="form-control"  >    
                                            </div>  
                                        </div> 
                                         
                                    </div>


                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trainer option</label>
                                               <select name='wt4' id='wt4' >
                                                  <option value='2'>Without trainer</option>
                                               </select>
                                                 </div>
                                        </div>
                                         
                                            <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Duration</label>
                                              <select name='wh4' id='wh4' >
                                                  <option value='2'>Monthly</option>
                                               </select>

                                            </div>  
                                        </div> 

                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Price</label>
                                              <input type="text" style='width:25%;' name="whprice4" placeholder="Price" id="whprice4"  value="{{$WO_T_Mn}}" class="form-control"  >  
                                            </div>  
                                        </div> 
                                         
                                    </div>

                                          <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Trainer option</label>
                                               <select name='wt6' id='wt6' >
                                                  <option value='2'>Without trainer</option>
                                               </select>
                                                 </div>
                                        </div>
                                         
                                            <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Duration</label>
                                              <select name='wh6' id='wh6' >
                                                  <option value='3'>Yearly</option>
                                               </select>

                                            </div>  
                                        </div> 

                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Price</label>
                                              <input style='width:25%;' type="text" name="whprice6" placeholder="Price" id="whprice6"  value="{{$WO_T_Yr}}" class="form-control"  >  
                                            </div>  
                                        </div> 
                                         
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Package</label>
                                              <textarea rows="5" id='abtTxt' name='abtTxt' class="form-control" placeholder="About package" value="Mike">{{$abt_package}}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                  <button type="submit" name="submit" id="submit_frm" class="btn btn-info btn-fill pull-right">Update Package</button>
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
                        whprice1:{required: true,digits: true}, 
                        whprice2:{required: true,digits: true},
                        whprice5:{required: true,digits: true},
                        whprice3:{required: true,digits: true}, 
                        whprice4:{required: true,digits: true},
                        whprice6:{required: true,digits: true} 

       
     
    },                             
    messages: {
               Selcat:{ required : "Select category name "    }, 
                packname:{ required : "Enter package name "    },
                whprice1:{required : "Enter price",digits: "Numbers only"}, 
                        whprice2:{required : "Enter price",digits: "Numbers only"},
                        whprice5:{required : "Enter price",digits: "Numbers only"},  
                        whprice3:{required : "Enter price",digits: "Numbers only"},
                        whprice4:{required : "Enter price",digits: "Numbers only"},
                         whprice6:{required : "Enter price",digits: "Numbers only"}  

       

     
    }
    });

         

             if(validator.form()) 
             {$('#errMsg').html("");
    $.ajax({  
    type: "POST",
    url: "{{url('admin/gymPackageUpdate')}}", 
    data: $("#frmPackage").serialize(), 
    dataType: 'HTML', 
    success: function(data) 
    {  

       
          var ErrMsgs="";
          var ErrType="warning" ;
          if(data==1)
            {
                ErrMsgs="Package already exists";
            }
            else if(data==2)
            {
                ErrType="success";
                ErrMsgs="Package updated successfully" ;

                $('#Selcat,#packname,#whprice1,#whprice2,#whprice3,#whprice4,#whprice5,#whprice6,#hid_id').val("");
                $('#abtTxt').html("");

            }
            else if(data==0)
            {
               ErrMsgs="Invalid request" ;
            }
            
             

             $.notify({
                icon: 'pe-7s-gift',
                message: ErrMsgs,
                
            },{
                type: ErrType,
                timer: 4000
            });

              location.href="{{url('admin/gymPackageView')}}";

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
 
 
