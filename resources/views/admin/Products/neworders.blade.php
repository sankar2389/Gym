@extends('admin.layouts.app_inner')

@section('content')
<div class="container spark-screen" style="width:70%;">
    <div class="row">			
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add user </h3>
                    <div class="pull-right">
                        <a style="margin-right:4px; font-weight: bold;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/users') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div><!-- /.box-header -->
                <div class="box-body">	

                    @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                    @endif				

                    <form class="form-horizontal" role="form"  method="POST" action="<?php echo url('/admin/neworders'); ?>">
                        {{ csrf_field() }}
                        <div class="box-body">
        <div class="form-group" style="padding-left: 100px;width: 500px;">
        <label for="exampleInputPassword1">Name</label>
        <select name="name" class="form-control" id="name">
           <option value="">--Select--</option> 
           @foreach( $product as $cat )
           <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
           @endforeach
        </select>
        </div>

        <div class="form-group" style="padding-left: 100px;width: 500px;">
            <label for="exampleInputFile">Order type:</label>
      <select class="form-control"  name="order_type" id="order_type"  required>
      
      <option value="">--Select Category--</option>
     
        @foreach($category as $cat)
        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
        @endforeach
      </select>
      </div>
      <div class="col-md-12 field_wrapper" id="button_pro">
      <label>Items:</label>
   
      <div class="space" id="input_1">
        
         <div class="tabb1">
       <input type="text" name="particulars[]" id="particulars" class="form-control"  placeholder="Particulars" />  
        </div>
        <div class="tabb1">
       <input type="text" name="quantity[]" id="quantity" class="form-control"  placeholder="quantity"/>  
    </div>
    <div class="tabb1" id="Stock1">
       <select name="Stock[]" id="Stock" class="form-control">
           <option value="">--Select--</option>
           <option value="Baskets">Baskets</option>
           <option value="Gm">Gm</option>
           <option value="Kg">Kg</option>
           <option value="Items">Items</option>
         </select>
         </div>
           <!-- <div class="tabb1" id="Stock2" style="display: none;">
       <select name="Stock[]" id="Stock" class="form-control">
           <option value="">--Select--</option>
           <option value="Baskets">Baskets</option>
           
         </select>
         </div> -->
      <div class="tabb1">
         <input type="text" name="unit_price[]" id="unit_price" class="form-control" placeholder="unitprice"  />  
      </div>
      <!--
      <div class="tabb1">
         <input type="text" name="totalprice[]" id="totalprice" class="form-control"  placeholder="total"  onkeyup="totaladd();"/> 
      </div>-->
   <span class="tabb1">
      <img src="{{asset('/admin/img/plus.png')}}" class="add right"/>
      
   </span>
    </div>
    </div>
     <?php $id=2;{ ?>
      <div class="form-group" style="width: 30%;margin: 10px;">
     
          <label for="exampleInputFile">Total Price</label>
           <input type="text" name="finalprice" id="finalprice" onclick="javascript:addNumbers(<?php echo $id; ?>)" class="form-control">
     
      </div>
       <?php $id++;  } ?>
      <div class="box-footer">
          <input type="submit"  name="submit" value="Submit" class="btn btn-primary" />&nbsp;&nbsp;
          <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location ='{{ url('admin/users') }}'" />
      </div>
      </form>
      </div>
     </div>
     </div>
    </div>
</div>
 <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="{{ asset('/admin/js/jquery-1.8.3.min.js') }}"></script>

<script type="text/javascript">
    var id=2,txt_box;
    $('#button_pro').on('click','.add',function(){
    $(this).remove();

    var txt_box = '<div class="space" id="input_'+id+'" style="float: left;width: 104%;padding: 6px;"><input type="text" name="particulars[]" id="particulars_'+id+'" placeholder="Particulars" onclick="search('+id+')" style="float: left;width: 15%;padding: 5px;margin: 0;"/><input type="text" name="quantity[]" id="quantity_'+id+'" placeholder="quantity" style="float: left;width: 15%;padding: 5px;margin: 0;" /><select name="Stock[]" id="Stock_'+id+'" onchange="stock('+id+')" style="float: left;width: 10%;padding: 5px;margin: 0;"><option value="">--Select--</option><option value="Baskets">Baskets</option><option value="Gm">Gm</option><option value="Kg">Kg</option><option value="Items">Items</option></select><input type="text" name="unit_price[]" id="unitprice_'+id+'"  placeholder="unitprice" style="float: left;width: 15%;padding: 5px;margin: 0;" /><img src="{{asset('/admin/img/minus.png')}}" class="remove"/><img class="add right" src="{{asset('/admin/img/plus.png')}}" /></div>';
    
     $("#button_pro").append(txt_box);
     id++;
  });




 $('#button_pro').on('click','.remove',function(){
          var parent=$(this).parent().prev().attr("id");
      var parent_im=$(this).parent().attr("id");
      $("#"+parent_im).slideUp('medium',function(){
        $("#"+parent_im).remove();
        if($('.add').length<1){
          $("#"+parent).append('<img src="{{asset('/admin/img/plus.png')}}" class="add right" style="padding:2px;"/> ');
        }
          });
   });
</script>
<script type="text/javascript">
function mul() 
{
          //  alert(1);
            var id=2;
            var txtFirstNumberValue = $('#unit_price').val();
            var txtSecondNumberValue = $('#unitprice_'+$id).val();
            var result =txtFirstNumberValue + txtFirstNumberValue;

            if (!isNaN(result)) {
                document.getElementById('finalprice').value = result;
            }
}
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
</script>
<script type="text/javascript">
function mul1() {
            var txtFirstNumberValue = document.getElementById('quantity').value;
            var txtSecondNumberValue = document.getElementById('unit_price').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('totalprice').value = result;
            }
        }
</script>
<script type="text/javascript">
function totaladd() {
            var txtFirstNumberValue = document.getElementById('totalprice').value;
           var txtsecondNumberValue = document.getElementById('totalprice').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtsecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('finalprice').value = result;
            }
        }
</script>
<script type="text/javascript">
	$(".add_button").bind("click",function(o){
                

    $('.formquantity').eq(0).clone().insertAfter(this);

    });
</script>
 <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
       
        <script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>

<script type="text/javascript">

$("#particulars").autocomplete({
    source: function (request, response) {
         $.ajax({
             url: "../admin/neworders/displayproduct",
             type: "GET",
             data: {"particulars":$("#particulars").val(), "category":$("#order_type").find('option:selected').val(),"_token": "{{ csrf_token() }}"},
             success: function (data) {
                 response($.map(data, function (el) {
                     return {
                         label: el.color,
                         value: el.value
                     };
                 }));
             }
         });
    },
    select: function (event, ui) {
        // Prevent value from being put in the input:
        this.value = ui.item.label;
        // Set the next input's value to the "value" of the item.
        $('#particulars').val(ui.item.value);
        event.preventDefault();
    }
});

function search(id){
$('#particulars_'+id).autocomplete({
    source: function (request, response) {
         $.ajax({
             url: "../admin/neworders/displayproduct",
             type: "GET",
             data: {"particulars":$('#particulars_'+id).val(), "category":$("#order_type").find('option:selected').val(),"_token": "{{ csrf_token() }}"},
             success: function (data) {
                 response($.map(data, function (el) {
                     return {
                         label: el.color,
                         value: el.value
                     };
                 }));
             }
         });
    },
   // autoFocus: true,          
   
    select: function (event, ui) {
        // Prevent value from being put in the input:
        this.value = ui.item.label;
        // Set the next input's value to the "value" of the item.
        $('#particulars').val(ui.item.value);
        event.preventDefault();
    }
});
 } 
 id++; 
</script>

<script type="text/javascript">
  $( "#order_type" ).change(function() 
  {
    var id=2;
    var Stock = $("#order_type").find('option:selected').val();
   
    if(Stock == 'OBasket')
    {
      document.getElementById("Stock").options[2].disabled = true;
      document.getElementById("Stock").options[3].disabled = true;
      document.getElementById("Stock").options[4].disabled = true;
      document.getElementById("#Stock_"+'2').options[2].disabled = true;
      document.getElementById("#Stock_"+'2').options[3].disabled = true;
      document.getElementById("#Stock_"+'2').options[4].disabled = true;
    }
    else if(Stock == 'OChef')
    {
      document.getElementById("Stock").options[1].disabled = true;
      document.getElementById("Stock").options[2].disabled = true;
      document.getElementById("Stock").options[3].disabled = true;
      document.getElementById("#Stock_"+id).options[1].disabled = true;
      document.getElementById("#Stock_"+id).options[2].disabled = true;
      document.getElementById("#Stock_"+id).options[3].disabled = true;
    }
    
    else
    {
      document.getElementById("Stock").options[1].disabled = true;
      document.getElementById("Stock").options[4].disabled = true;
      document.getElementById("#Stock_"+id).options[1].disabled = true;
      document.getElementById("#Stock_"+id).options[4].disabled = true;
    }
    id++;
  });
  </script>
<script type="text/javascript">
  $( "#Stock" ).change(function() 
  {
    var particulars=$('#particulars').val();
    var quantity=$('#quantity').val();
    var category=$('#order_type').val();
    var Stock = $("#Stock").find('option:selected').val();
   // alert(Stock);
    $.get( '../admin/neworders/unitprice' , 
    {category :category,particulars : particulars ,Stock : Stock ,quantity : quantity} , 
    function(data){ //htmlCode is the code retured from your controller
        $("#unit_price").val(data);
    })
  });

   function stock(id) 
  {
    var particulars=$('#particulars_'+id).val();
    var quantity=$('#quantity_'+id).val();
    var category=$('#order_type').val();
    var Stock = $("#Stock_"+id).find('option:selected').val();
    $.get( '../admin/neworders/unitprice' , 
    {category : category,particulars : particulars ,Stock : Stock ,quantity : quantity} , 
    function(data){ //htmlCode is the code retured from your controller
       $("#unitprice_"+id).val(data);
    })
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#finalprice").click(function(){
        var id=2;
        var length=$('#unitprice_'+id).length;
      
         var finalprice1=document.getElementById('#unitprice');
         var finalprice2=document.getElementById('#unitprice_'+id);
         var result=finalprice1+finalprice2;
      
        
    });
});
</script>
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>
<!--
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    
   
    $(wrapper).on('click', '.add_button', function(e){ 
    e.preventDefault();     //Once add button is clicked
         $('.field_wrapper').clone().insertAfter(this);
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $('.field_wrapper').remove(); //Remove field html
       
    });
});
</script>-->
@endsection
