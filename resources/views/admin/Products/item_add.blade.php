@extends('admin.layouts.app_inner')

@section('content')
<div class="container spark-screen" style="width:72%;">
    <div class="row">			
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Product Items</h3>
                    <div class="pull-right">
                        <a style="margin-right:4px; font-weight: bold;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/users') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div><!-- /.box-header -->
                <div class="box-body">	

                    @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                    @endif				
</div>
        <form class="form-horizontal" role="form"  method="POST" action="<?php echo url('/admin/Product_itemadd'); ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
      

                        <!--    <div class="form-group">
               <input type="hidden" name="pro_name[]" id="product_name"  class="form-control"  placeholder="Enter Product Weight" />  
                </div>-->
      <div class="col-xs-12 field_wrapper" id="button_pro" style="padding:16px;">
            <label>Items:</label>
           
              <div class="space" id="input_1">
               
            <div class="proname">
               <input type="text" name="pro_name[]" id="pro_name" class="form-control"  placeholder="Product" onBlur="check()" required="" />  
            </div>
              
                  
              
            <div class="proweight">
               <input type="text" name="pro_weight[]" id="pro_weight[]" class="form-control"  placeholder="Weight" required="" />  
            </div>
          <div class="wgtkg">
             <select name="Weight[]" id="Weight[]" class="form-control" style="width:80px;">
                 <option value="Gm">Gm</option>
                 <option value="Kg">Kg</option>
               </select>
               </div>
          <div class="unitprice">
               <input type="text" name="unit_price[]" id="unit_price[]"  class="form-control" placeholder="Price" required="" />  
          </div>
          <div class="prostock">
               <input type="text" name="pro_stock[]" id="pro_stock[]" class="form-control"  placeholder="Stock"/ required="">  
          </div>
          <div class="stockkg">
             <select name="Stock[]" id="Stock[]" class="form-control" style="width:80px;">
                 <option value="Gm">Gm</option>
                 <option value="Kg" selected="">Kg</option>
             </select>
          </div>
          <div class="image">
            <input type="file" name="image[]" id="image"/>
          </div>
          <div style="float: left;width: 10%;padding: 10px;margin: 0;">
             <img src="{{asset('/admin/img/plus.png')}}" class="add">
          </div>
           <span id="message" style="float: left;width: 30%;padding: 5px;margin: 0;"></span>
    </div>
    </div>
 <div class="box-footer">
  <input type="submit"  name="submit" value="Submit" class="btn btn-primary" />&nbsp;&nbsp;
  <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location ='{{ url('admin/users') }}'" />
</div>
</form>
</div>
</div><!-- /.box -->
</div>
</div>
</div>
<script src="{{ asset('/admin/js/jquery-1.8.3.min.js') }}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    var id=2,txt_box;
  $('#button_pro').on('click','.add',function(){
      $(this).remove();
      txt_box='<div class="space" id="input_'+id+'" style="float: left;width: 104%;padding: 6px;"><input type="text" name="pro_name[]" id="proname_'+id+'" onBlur="checkAvailability('+id+')" style="float: left;width: 20%;padding: 5px;margin: 0;" placeholder="Product" /> <input type="text" name="pro_weight[]" id="pro_weight[]" placeholder="Weight" style=" float: left;width: 10%;padding: 5px;margin: 0;"/> <select name="Weight[]" id="Weight[]"  style="float: left;width: 10%;padding: 5px;margin: 0;"><option value="Gm">Gm</option><option value="Kg">Kg</option></select><input type="text" name="unit_price[]" id="unit_price[]"  placeholder="Price" style="float: left;width: 10%;padding: 5px;margin: 0;"/><input type="text" name="pro_stock[]" id="pro_stock[]" placeholder="Stock" style="float: left;width: 10%;padding: 5px;margin: 0;"/> <select name="Stock[]" id="Stock[]" style="float: left;width: 10%;padding: 5px;margin: 0;"> <option value="Gm">Gm</option><option value="Kg" selected="">Kg</option></select><div class="image"><input type="file" name="image[]" id="image_'+id+'"/></div><img src="{{asset('/admin/img/minus.png')}}" class="remove"/><img class="add right" src="{{asset('/admin/img/plus.png')}}" /><span id="message_'+id+'" style="float: left;width: 30%;padding: 5px;margin: 0;"></span></div>';
      $("#button_pro").append(txt_box);
      id++;
  });

 $('#button_pro').on('click','.remove',function(){
          var parent=$(this).parent().prev().attr("id");
      var parent_im=$(this).parent().attr("id");
      $("#"+parent_im).slideUp('medium',function(){
        $("#"+parent_im).remove();
        if($('.add').length<1){
          $("#"+parent).append('<img src="{{asset('/admin/img/plus.png')}}" class="add" style="padding:2px;"/> ');
        }
          });
   });

 function checkAvailability(id){
   
             //$("#message").html("<img src='../admin/img/loader.gif'/> checking...");


        var username=$('#proname_'+id).val();
       if(username == ''){
          $("#message_"+id).html("Enter Product name");
        
        $("#proname_"+id).focus();
      }
      else{
          $.ajax({
                type:"POST",
                url :"{{route('admin.Product_display')}}",
               data: {username: username,  "_token": "{{ csrf_token() }}"},
                    success:function(data){
                    if(data=='true'){
                       $("#message_"+id).html("<img src='{{asset('/admin/img/cross.png')}}' />Product is already taken");
                       $("#proname_"+id).focus();
                    }
                    else{
                        $("#message_"+id).html("<img src='{{asset('/admin/img/yes.png')}}' />Product is available");
              
                    }
                }
             });
   }
       
 }
</script>
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>
<script type="text/javascript">

     function check(){


        var username=$("#pro_name").val();
        if(username == ''){
         $("#message").html("Enter Product name");
        
        $("#pro_name").focus();
      }
      else{
          $.ajax({
                type:"POST",
                url :"{{route('admin.Product_display')}}",
               data: {username: username,  "_token": "{{ csrf_token() }}"},
                    success:function(data){
                    if(data=='true'){
                        $("#message").html("<img src='{{asset('/admin/img/cross.png')}}' />Product is already taken");
                        $("#pro_name").focus();
                    }
                    else{
                        $("#message").html("<img src='{{asset('/admin/img/yes.png')}}' />Product is available");
                        
                    }
                }
             });
        }
    }
     </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-md-12 field_wrapper"> <table class="table table-striped"><div class="form-group" id="formquantity"><tbody><tr><td><div class="col-md-2"><input type="text" name="pro_weight[]" id="pro_weight[]" style="width:150px;" class="form-control" placeholder="Enter Product Weight" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field">-</a></div></td><td><div class="col-sm-2"><div class="col-sm-2"><input type="text" name="pro_stock[]" id="pro_stock[]" style="width:150px;" class="form-control"  placeholder="Enter Product Stock"/><a href="javascript:void(0);" class="remove_button" title="Remove field">-</a></div></td><td><div class="col-sm-2"> <input type="text" name="unit_price[]" id="unit_price[]" style="width:150px;" class="form-control" placeholder="Enter Product price"/><a href="javascript:void(0);" class="remove_button" title="Remove field">-</a></div></td></tbody></div></table></div>';
     //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
});
</script>

 <script>
function sync()
{
  var proname = document.getElementById('pro_name');
  var slug = document.getElementById('product_name');
  slug.value = proname.value;
}
</script>
@endsection
