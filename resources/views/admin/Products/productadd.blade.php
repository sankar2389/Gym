@extends('admin.layouts.app_inner')

@section('content')

<div class="container spark-screen" style="width:72%;">
    <div class="row">           
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: black;">Add user </h3>
                    
                        <a style="margin-right:4px; font-weight: bold;float:right;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/users') }}"><i class="fa fa-arrow-left"></i> Back</a> 
                </div><!-- /.box-header -->
                <div class="box-body">  

                    @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                    @endif 

                    @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                    @endif              
             

          <form class="form-horizontal" role="form"  method="POST" action="<?php echo url('/admin/Product_add'); ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
  <div class="box-body">
      <div class="form-group" style="padding-left: 100px;width: 500px;">
          <label for="exampleInputPassword1">Category:</label>
        
           <select name="cat_name" class="form-control" required id="cat_name">
          <!-- <option value="">--Select--</option> 
           @foreach( $category as $cat )
           <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
           @endforeach-->
           <option value="">--Select--</option>
           <option value="1">OBasket</option>
           <option value="3">OChef</option>
           </select>
          
    </div>

 
  <!--<div class="form-group" style="padding-left: 100px;width: 500px;">
          <label for="exampleInputPassword1">Basket Unit :</label>
        <select name="bak_unit" class="form-control" id="bak_unit" required >
           <option value="">--Select--</option> 
           @foreach( $BasketUnitMaster as $BasUnit )
           <option value="{{ $BasUnit->bku_id }}">{{ $BasUnit->basket_unit }}</option> 
           @endforeach 
           </select>  
    </div> -->



<div class="form-group" style="padding-left: 100px;width: 500px;">
          <label for="exampleInputPassword1">Category:</label>
    <select class="multipleSelect" multiple name="diet_id" id='diet_id'>

    @foreach( $DietMaster as $diet )
           <option value="{{ $diet->diet_id }}">{{ $diet->diet_name }}</option> 
           @endforeach 
          
                <!--<option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua &amp; Deps">Antigua &amp; Deps</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>-->
 </select>
 </div>  


   <!--   <div class="form-group" style="padding-left: 100px;width: 500px;">
          <label for="exampleInputPassword1">Diet:</label>diet_id
        
           <select name="diet_id" class="form-control" id="diet_id">
          <option value="0">--Select--</option> 
           @foreach( $DietMaster as $diet )
           <option value="{{ $diet->diet_id }}">{{ $diet->diet_name }}</option> 
           @endforeach 
          
           </select>
          
    </div> -->

      <div class="form-group" style="padding-left: 100px;width: 500px;">
        <label for="exampleInputFile">Product:</label>
        <input type="text" name="pro_cat" id="pro_cat" class="form-control" required="">  
      </div>
       <div class="form-group" style="padding-left: 100px;width: 500px;">
        <label for="exampleInputFile">Image:</label>
       <input type="file" name="image[]" id="image" multiple="" />
      </div>
 <div class="col-xs-12 field_wrapper input_fields_wrap" id="button_pro">
      <label>Items:</label>
      <div class="space">
      <div class="tabb2">
        <input type="text" value='{{old("searchname[]")}}' name="searchname[]" id="searchname_1" class="form-control"  placeholder="Product"  required="">  

        <input type="text" name="searchnameHidId[]" id="searchnameHidId_1" class="form-control"  placeholder="Product"  required="">        
     </div>

<div class="tabb2">
   <select name="Weight[]" id="Weight_1" class="form-control selwt" >
       <option value="">--Select--</option>
       <option value="Gm">Gm</option>
       <option value="Kg">Kg</option>
   </select>
   </div>
  
<div class="tabb2">
   <select name="WeightUnit[]" id="WeightUnit_1" class="form-control selwtGetVal" >
    <option value="">--Select--</option>
     @foreach( $weight_master as $weightId )
           <option value="{{ $weightId->weight_name }}">{{ $weightId->weight_name }} Gm</option> 
           @endforeach 

   </select>
   </div>
 



      <span id="message"></span>
       <input type="hidden" name="id[]"  class="form-control" placeholder="Enter id">
    <!--<div class="tabb2">
      <input type="text" name="pro_weight[]" id="pro_weight_1"   class="form-control weightCls"  placeholder="Quantity"/>  
    </div> -->
    
  <div class=tabb2>
     <input type="text" name="unit_price[]" id="unit_price_1" class="form-control WeightSelclass" style="width:80%;float:left;" placeholder="Unitprice"> 
  </div>
  <span class="tabb2" id='btnSpn_1'>
     <img src="{{asset('/admin/img/plus.png')}}" style="cursor: pointer;" class="add_field_button"> 
    <!--<button  class="add_field_button">Add More Fields</button> -->
  </span>
 </div>
     </div>  
      <?php $id=2;{ ?>
      <div class="form-group" style="width: 30%;margin: 10px;">
     
          <label for="exampleInputFile">Total Price</label>
           <input type="text" name="finalprice" id="finalprice" onclick="javascript:addNumbers(<?php echo $id; ?>)" class="form-control">
    
      </div> 
       <?php $id++;  } ?>
    
       <div class="col-xs-6">
                        <div class="box-footer">
                            <input type="submit"  name="submit" value="Submit" class="btn btn-primary" />&nbsp;&nbsp;
                            <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location ='{{ url('admin/users') }}'" />
                        </div>
     </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>

<!-- <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="{{ asset('/admin/js/jquery-1.8.3.min.js') }}"></script> -->
<script type="text/javascript">

function check(value){

//alert(this).attr('id');

}

 /*function check(value){
  
          var prowgt=$("#pro_weight").val();
         
         // alert(prowgt);
          $.ajax({
                type:"POST",
                url :"../admin/Product_display",
               data: {username: username,  "_token": "{{ csrf_token() }}"},
                    success:function(data){
                    if(data=='true'){
                        $("#message").html("<img src='../admin/img/cross.png' />Product is already taken");
                    }
                    else{
                        $("#message").html("<img src='../admin/img/yes.png' />Product is available");
                        
                    }
                }
             }); 
    } */
</script>


  <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" /> 

  <style>

            .fstElement { font-size: 1.2em; }
            .fstToggleBtn { min-width: 16.5em; }

            
            .fstMultipleMode { display: block; }
            .fstMultipleMode .fstControls { width: 100%; }

        </style>

   <script>

                 $('.multipleSelect').fastselect();

            </script>    
   
<script language="javascript">
function addNumbers(id)
{
  var val1 = parseInt(document.getElementById("unit_price").value);
  var val2 = parseInt(document.getElementById("unitprice_"+id).value);
  var ansD = document.getElementById("finalprice");
  ansD.value = val1 + val2;
  id++;
}

 

    $(document).ready(function() {
          var max_fields      = 200;  
          var wrapper         = $(".input_fields_wrap");  
          var add_button      = $(".add_field_button");  

          var x = 1;  
          var latestX=0;

          $(add_button).live( "click", function(e) {  

          e.preventDefault();
          var searchnameVal=$('#searchname_'+x).val();
          var pro_weightVal=$('#pro_weight_'+x).val();
          var WeightVal=$('#Weight_'+x).val();
          var unit_priceVal=$('#unit_price_'+x).val();
          
          if(searchnameVal =="" || pro_weightVal=="" || WeightVal=="" || unit_priceVal=="" )
          {
            alert('Empty fields are not allowed');exit;
          }
          if(x < max_fields){ 
          $(this).remove();
          x++;  
          $(wrapper).append('<div class="space" id="rem_'+ x + '" style="float: left;width: 104%;padding: 6px;"><div class="tabb2"><input type="text" name="searchname[]" id="searchname_'+x+'" class="form-control"  placeholder="Product"  required=""><input type="text" name="searchnameHidId[]" id="searchnameHidId_'+x+'" class="form-control"  placeholder=""  required=""> </div><span id="message"></span> <input type="hidden" name="id[]"  class="form-control" placeholder="Enter id"><div class="tabb2"> <select name="Weight[]" id="Weight_'+x+'" class="form-control selwt" onchange="check(this.value)"> <option value="">--Select--</option> <option value="Gm">Gm</option><option value="Kg">Kg</option> </select> </div><div class="tabb2"> <select name="WeightUnit[]" id="WeightUnit_'+x+'" class="form-control selwtGetVal" ><option value="">--Select--</option> </select> </div> <!--<div class="tabb2"><input type="text" name="pro_weight[]" required=""  class="form-control weightCls" id="pro_weight_'+x+'" placeholder="Quantity"/> </div>--><div class=tabb2><input type="text" required="" name="unit_price[]" id="unit_price_'+x+'" class="form-control" style="width:80%;float:left;" placrequired=""eholder="Unitprice"> </div><span class="tabb2" style="cursor:pointer" id="btnSpn_'+x+'"><img src="{{asset("/admin/img/minus.png")}}" class="remove_field"/>&nbsp;<img src="{{asset("/admin/img/plus.png")}}" class="add_field_button"> </span> </div>');
          latestX=x;
          $( "input[id=searchname_"+ x +"]" ).autocomplete({
          source: '{!!URL::route('autocomplete')!!}',
          minLength: 1,
          autoFocus:true,
          select: function (e, ui)
          { //alert($(this).attr('id'))
          $('#searchnameHidId_'+x).val(ui.item.id)
          $('#id').val(ui.item.id); 
          $('#searchname').val(ui.item.value);
          }
          }); 
          }
    });
    
    $(wrapper).on("click",".remove_field", function(e){  //user click on remove text
    e.preventDefault();
    var parent=$(this).parent().attr("id"); 
    var RowIds=parent.split('_')[1];
    var unit_priceVal=$('#unit_price_'+RowIds).val();
    var Totprice=parseInt($('#finalprice').val());
    $('#finalprice').val(parseInt(Totprice)-parseInt(unit_priceVal));
    var parentp=$(this).parent().parent().attr("id"); 
    var parent_im=$(this).parent().next(".space");
    var firstId
    valArr = new Array();
    $(".space").each(function() {
    firstId = $("span.tabb2:last", this).attr("id");
    valArr.push(firstId.split('_')[1])
    });
    var LVal=firstId.split('_')[1];
    var DVal=parent.split('_')[1];

    $(this).parent().parent().remove();
    x--;
    if(x==1){
          $('#btnSpn_1').html('<img src="{{asset("/admin/img/plus.png")}}" class="add_field_button">');
        }
        else
        {  
             var Splval=$(this).parent().parent().attr("id").split('_')[1];
             $('#btnSpn_'+(LVal)).html(' <img src="{{asset("/admin/img/minus.png")}}" class="remove_field"/><img src="{{asset("/admin/img/plus.png")}}" class="add_field_button">')  ;
          if(LVal==DVal){
           $('#btnSpn_'+(valArr[valArr.length-2])).html(' <img src="{{asset("/admin/img/minus.png")}}" class="remove_field"/><img src="{{asset("/admin/img/plus.png")}}" class="add_field_button">')  ;
          }
        }
    })
});

  $(function() {
   $("input[name^='searchname']").autocomplete({ 
            source: '{!!URL::route('autocomplete')!!}',
            minLength: 1,
            autoFocus:true,
            select: function (e, ui)
            {   //alert($(this).attr('id'))
               $('#searchnameHidId_1').val(ui.item.id)
               $('#id').val(ui.item.id); 
               $('#searchname').val(ui.item.value);
            },
            change: function(event, ui) { //alert(ui.item.id)



           
        },open: function() {
         
      },
      close: function(event, ui) {
         
      },
       focus: function(event,ui) { 
     },
        });
  });
    

</script>
<!-- <script type="text/javascript">

     function check(){


        var username=$("#searchname").val();
         // alert(username);
          $.ajax({
                type:"POST",
                url :"../admin/Productadd_display",
               data: {username: username,  "_token": "{{ csrf_token() }}"},
                    success:function(data){
                    if(data=='true'){
                        $("#message").html("<img src='../admin/img/cross.png' />Product is already taken");
                    }
                    else{
                        $("#message").html("<img src='../admin/img/yes.png' />Product is available");
                        
                    }
                }
             });
    }
     </script> -->
<script type="text/javascript">





  $('#cat_name').on('change',function(){

//$('#diet_id


  });
    $('.selwt').live('change',function(){

        var RowId=$(this).attr('id').split('_')[1]; 

        var Getselevals=$(this).val();
        if(Getselevals=="Kg")
        {

          var optionsWt= $('#WeightUnit_'+RowId);
          optionsWt.empty();
          optionsWt.append($("<option />").val("").text("--Select--"));
          for(var i=1; i<=100; i++)
          {

           optionsWt.append($("<option />").val(i).text(i+" Kg"));

          }
          

          /*  var particulars=$('#searchname_'+RowId).val();
            var quantity=$('#pro_weight_'+RowId).val();
            var category=$('#cat_name').val();
            var Stock = $("#Weight_"+RowId).find('option:selected').val();
            $.get( '../admin/Product_add/productprice' , 
            {category :category,particulars : particulars ,Stock : Stock ,quantity : quantity} , 
            function(data){  
            $("#unit_price_"+RowId).val(data);
            var Totprice=0;      
            $('input[name="unit_price[]"]').each(function() {
            Totprice+=parseInt($(this).val());
            });
            $('#finalprice').val(Totprice);
            }) 
       */


        }
        else if(Getselevals=="Gm") 
        {

        var optionsWt= $('#WeightUnit_'+RowId);
        optionsWt.empty();
          optionsWt.append($("<option />").val("").text("--Select--"));
          for(var i=250; i<1000; i+=250)
          {

           optionsWt.append($("<option />").val(i).text(i+" Gm"));

          }

        

        }
   

  $('.selwtGetVal').live('change',function(){

     var RowId=$(this).attr('id').split('_')[1]; 
     //alert(RowId)

     var particulars=$('#searchname_'+RowId).val();
            var quantity=$('#WeightUnit_'+RowId).val();
            var category=$('#cat_name').val();
            var Stock = $("#Weight_"+RowId).find('option:selected').val();
            $.get( '../admin/Product_add/productprice' , 
            {category :category,particulars : particulars ,Stock : Stock ,quantity : quantity} , 
            function(data){  
            $("#unit_price_"+RowId).val(data);
            var Totprice=0;      
            $('input[name="unit_price[]"]').each(function() {
            Totprice+=parseInt($(this).val());
            });
            $('#finalprice').val(Totprice);
            }) 

  });
      



    });
$('.weightClsEEEEE').live('change',function(){ 


//alert($(this).val())
  var RowId=$(this).attr('id').split('_')[2]; 

  var wgtVal=$('#Weight_'+RowId).val();
  //alert(wgtVal)

    /*var ids=$(this).attr('id').split('_')[2];
    $('#Weight_'+ids).val("");
    var curUnitprice=$('#unit_price_'+ids).val();
    var totPrice=$('#finalprice').val();
    if(parseInt(totPrice)>0)
    {

    }else{
      totPrice=0;
    }
    if(parseInt(curUnitprice)>0)
    {
    }
    else{
    curUnitprice=0;
    }
    $('#unit_price_'+ids).val(0);
    $('#finalprice').val(parseInt(totPrice)-parseInt(curUnitprice)); */



});

$( "#Weight111" ).change(function() 
{ 
      var $textboxes = $('input[name="searchname[]"]')
     // alert($(this).val())
     // alert($(this).parent().parent().find("input[name=searchname[]]").val());
      var particulars=$('#searchname').val();
      var quantity=$('#pro_weight').val();
      var category=$('#cat_name').val();
      var Stock = $("#Weight").find('option:selected').val();
      $.get( '../admin/Product_add/productprice' , 
      {category :category,particulars : particulars ,Stock : Stock ,quantity : quantity} , 
        function(data){  
        $("#unit_price").val(data);

        })
});

   function stock(id) 
  {
    var particulars=$('#searchname_'+id).val();
    var quantity=$('#proweight_'+id).val();
    var category=$('#catname_').val();
    var Stock = $("#Weight_"+id).find('option:selected').val();
    $.get( '../admin/Product_add/productprice' , 
    {category : category,particulars : particulars ,Stock : Stock ,quantity : quantity} , 
    function(data){ //htmlCode is the code retured from your controller
       $("#unitprice_"+id).val(data);
    })
  }
</script>
@endsection