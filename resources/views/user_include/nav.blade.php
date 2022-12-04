<!-- Search section -->
<section class="search_sec">
		<form class="form" action="{{url('/gymList') }}" id='searchFrm' name='searchFrm' method='post' >  
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<!--<form class="search_box form-inline"> -->

 
          <div class="col-sm-4  col-md-5  col-md-offset-0 col-xs-5">
             <select class="form-control type" id='catType' name='catType'>
    
                       <option value="">--Type--</option>
                        @foreach($getType as $keyVal)
                         <?php 
                            $selected='';
                            if($keyVal->type_id==$catType)
                            {
                               $selected='selected=true';
                            }
 
                          ?>
                          <option <?php echo $selected;  ?> value="{{$keyVal->type_id}}">{{$keyVal->type_name}} </option>
                        @endforeach
                    </select> 
          </div>
          <div class="col-sm-3 col-xs-5">
             <input type="text" placeholder="Pin code" class="search_txt"value='<?php echo $pinCode; ?>'  name='pin' id='pin'>
          </div>
          <div class="col-sm-2 col-xs-2">
             <button  type='submit' id="submit_frm" class="search_btn"> GO </button>
          </div>
    </form>
	</section>
 <style>
#searchFrm .error {
    color: #FFF;

}
</style>
<script src="{{ asset('asset/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script language="javascript">
 

 

  $(document).ready(function() {   

$("#submit_frm").click(function(event) {  
 
                 


               var validator = $("#searchFrm").validate({
    rules: { 
              catType:{required: true},
              pin:{required: true}, 
         
    },                             
    messages: {
                catType:{ required : "Select type"},
                pin:{required: "Enter pincode"}, 
                
     }
    });

  if(validator.form()){
 
   $( "#searchFrm").submit();
 
  }

   });




  });

  </script>
