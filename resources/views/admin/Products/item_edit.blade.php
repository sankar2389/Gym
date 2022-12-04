@extends('admin.layouts.app_inner')

@section('content')
<div class="container spark-screen" style="width:72%;">
    <div class="row">			
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Product Items</h3>
                    <div class="pull-right">
                        <a style="margin-right:4px; font-weight: bold;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/users') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div><!-- /.box-header -->
                <div class="box-body">	

                    @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                    @endif				
</div>
        <form class="form-horizontal" role="form"   method="POST" action="<?php echo url('/admin/Product_itemedit'); ?>/{{ $product->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
      

                        <!--    <div class="form-group">
               <input type="hidden" name="pro_name[]" id="product_name"  class="form-control"  placeholder="Enter Product Weight" />  
                </div>-->
      <div class="col-xs-12 field_wrapper" id="button_pro" style="padding:16px;">
            <label>Items:</label>
           
              <div class="space" id="input_1">
               
            <div class="proname">
               <input type="text" name="pro_name" id="pro_name" class="form-control"  placeholder="Product" value="{{ $product->product_name }}" onBlur="check()"/>  
            </div>
              
           

 
   <?php
   $weight=preg_split('#(?<=\d)(?=[a-z])#i', $product->product_weight);
  // echo '<pre>';
  // print_r($weight[0]);
   ?>
  
           @if($weight[0] >=1000)
           <?php
            $product_weight=$weight[0] /1000;
           ?>
            <div class="proweight">
               <input type="text" name="pro_weight" id="pro_weight" class="form-control"  placeholder="Weight" value="{{ $product_weight }}" />  
            </div>
            @else
            <div class="proweight">
               <input type="text" name="pro_weight" id="pro_weight" class="form-control"  placeholder="Weight" value="{{ $weight[0] }}" />  
            </div>
            @endif
        
            @if($weight[0] >=1000)
          <div class="wgtkg">
         
             <select name="Weight" id="Weight" class="form-control" style="width:80px;">
                 <option value="Gm">Gm</option>
                 <option value="Kg" selected="">Kg</option>
             </select>
             </div>
          @else
          <div class="wgtkg">
           <select name="Weight" id="Weight" class="form-control" style="width:80px;">
                 <option value="Gm" selected="">Gm</option>
                 <option value="Kg">Kg</option>
             </select>
             @endif
          </div>
          <div class="unitprice">
               <input type="text" name="unit_price" id="unit_price"  class="form-control" placeholder="Price" value="{{ $product->product_unitprice }}" />  
          </div>
   <?php
   $stock=preg_split('#(?<=\d)(?=[a-z])#i', $product->product_stock);
  // echo '<pre>';
  // print_r($weight[0]);
   ?>
          @if($stock[0] >=1000)
          <?php
            $Stock=$stock[0] /1000;
          ?>
          <div class="prostock">
               <input type="text" name="pro_stock" id="pro_stock" class="form-control"  placeholder="Stock" value="{{ $Stock }}"/>  
          </div>
          @else
           <div class="prostock">
               <input type="text" name="pro_stock" id="pro_stock" class="form-control"  placeholder="Stock" value="{{ $stock[0] }}"/>  
          </div>
          @endif
           @if($stock[0] >=1000)
          <div class="stockkg">
             <select name="Stock" id="Stock" class="form-control" style="width:80px;">
                 <option value="Gm">Gm</option>
                 <option value="Kg" selected="">Kg</option>
             </select>
          </div>
          @else
          <div class="stockkg">
             <select name="Stock" id="Stock" class="form-control" style="width:80px;">
                 <option value="Gm" selected="">Gm</option>
                 <option value="Kg">Kg</option>
             </select>
          </div>
          @endif
          <div class="image">
            
         <img src="<?php echo url('uploads/images')?>/<?php echo $product->product_image; ?>" align="center" width="100px" height="50px">
         <input type="file" name="image" id="image"/>
          </div>
       <!--   <div style="float: left;width: 10%;padding: 10px;margin: 0;">
             <img src="{{asset('/admin/img/plus.png')}}" class="add">
          </div>-->
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
                url :"route('admin/Product_display')",
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

 <script>
function sync()
{
  var proname = document.getElementById('pro_name');
  var slug = document.getElementById('product_name');
  slug.value = proname.value;
}
</script>
@endsection
