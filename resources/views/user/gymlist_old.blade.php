 @include('user_include.header')
 @include('user_include.nav')
 
<section class="gym_list">
	<div class="container">
	  <form id='list_gym' name='list_gym'>  
		<div class="row">

		<div class="se-pre-con"></div>


		<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 ">

 				{{ csrf_field() }}
               <input type="hidden" name="hid_type" value="{{$catType}}"  id='hid_type'>
               <input type="hidden" name="hid_pin" value="{{$pinCode}}" id='hid_pin'>                  
			<div class="filters">
				<div class="filter_header">
					Category
				</div>
 
                 <?php

                  foreach($getCategory as $CatVal)
                  {
                  	?>
                     <div class="form-group">
						<input type="checkbox" class='filterChkbox' name='Cat[]' id='Cat[]' value="<?php echo $CatVal->cat_id; ?>"   lang="<?php echo $CatVal->cat_id; ?>"> <?php echo $CatVal->cat_name; ?>
					</div>
                  	<?php


                  }
 

                 ?>
			</div>


						<div class="filters">
				<div class="filter_header">
					Facility
				</div>
				 
					<?php


                  foreach($getAllfeatures as $fatVal)
                  {
                  	?>
                     <div class="form-group">
                    
						<input type="checkbox" class='filterChkbox' name='Fea[]' id='Fea[]' value="<?php echo $fatVal->fe_id; ?>"   lang="<?php echo $fatVal->fe_id; ?>" > <?php echo $fatVal->features_name; ?>
					</div>
                  	<?php


                  }
 

                 ?>
				 
			</div>
						 
		</div>
		<div class="col-md-8 gymList" id='pushContent'> 

<?php     $Cnt=0;

 
  foreach ($filterArrayList as $key => $value) {
           $imageBann="";
           $GymName=""; 
           $address1="";
           $pincode="";
           $area_location="";
           $featuresData="";
           $WrkHrData="";
           $WrkHrPeakData="";
           $CategoryList=""; 
           if(isset($value[0]))
           {
              $imageBann=$value[0]->image;
              $GymName=$value[0]->name;
              $address1=$value[0]->address1 ;
              $pincode=$value[0]->pincode ;
              $area_location=$value[0]->area_location;
              $featuresData=$value[0]->featuresData;
              $WrkHrData=$value[0]->WrkHrData;
              $WrkHrPeakData=$value[0]->WrkHrPeakData;
              $CategoryList=$value[0]->CategoryList;

           }

           if( $imageBann !="" && $GymName != "" )
           {
                
  	?>

			<div class="gym_list_box">
				<div class="img"> 
				<img src="<?php   echo url("uploads/images/".$imageBann); ?>" class="img-responsive" style='height:23vh !important'> 
				</div>
			<div class="dtail">
				<span class="dheading"><a href="detail_page.php"><?php  echo $GymName;  ?></a></span>
				<p class="address"><?php  echo $address1; ?><br/>
				<?php  echo $area_location; ?>, <?php  echo $pincode; ?></p>
				<?php echo $featuresData.'| '.$CategoryList; ?>
				<span class="pull-left c-type"><strong>Working Time :</strong> <?php  echo $WrkHrData; ?>
					<p><strong>Peak Hr: </strong><?php  echo $WrkHrPeakData; ?></p>
				</span>
			</div>
				<div class="rate">
				<div class="inr">
				Rs.49
				<span>Per Hour</span>
			</div>
			<div id="stars" class="starrr"></div>
			</div>
			</div>  
				

  	<?php
   $Cnt++;
	}
  }

  if($Cnt==0)
  {
    ?>

    <div class="col-md-8">
					<div class="gym_list_box">
						 
					<div class="dtail">
						<span class="dheading"><a href="detail_page.php">No Data Found</a></span>

						 
						 
						 
					</div>
				 
					</div>
				</div>

    <?php

  }


?>
</div>



				<!--<div class="col-md-8">
					<div class="gym_list_box">
						<div class="img">
							<img src="img/gym.png" class="img-responsive">
						</div>
					<div class="dtail">
						<span class="dheading"><a href="detail_page.php">Venus fitness center</a></span>

						<p class="address">11/78 bbkular, nareimedu 7th cress<br/>
						 madurai .653129</p>
						<ul class="fetures_list">
							<li>TreadMail</li>
							<li>Cycling</li>
							<li>EFX</li>
						</ul>
						<span class="pull-left c-type"><strong>Working Time :</strong> 5:00 Hrs - 2100Hrs
						<p><strong>Peak Hr: </strong>1600-2100Hrs</p>
						</span>
					</div>
					<div class="rate">
						<div class="inr">
							Rs.49
							<span>Per Hour</span>
						</div>

						<div id="stars" class="starrr"></div>
					</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="gym_list_box">
						<div class="img">
							<img src="img/gym.png" class="img-responsive">
						</div>
					<div class="dtail">
						<span class="dheading"><a href="detail_page.php">Venus fitness center</a></span>

						<p class="address">11/78 bbkular, nareimedu 7th cress<br/>
						 madurai .653129</p>
						<ul class="fetures_list">
							<li>TreadMail</li>
							<li>Cycling</li>
							<li>EFX</li>
						</ul>
						<span class="pull-left c-type"><strong>Working Time :</strong> 5:00 Hrs - 2100Hrs
						<p><strong>Peak Hr: </strong>1600-2100Hrs</p>
						</span>
					</div>
					<div class="rate">
						<div class="inr">
							Rs.49
							<span>Per Hour</span>
						</div>

						<div id="stars" class="starrr"></div>
					</div>
					</div>
				</div>
								<div class="col-md-8">
					<div class="gym_list_box">
						<div class="img">
							<img src="img/gym.png" class="img-responsive">
						</div>
					<div class="dtail">
						<span class="dheading"><a href="detail_page.php">Venus fitness center</a></span>

						<p class="address">11/78 bbkular, nareimedu 7th cress<br/>
						 madurai .653129</p>
						<ul class="fetures_list">
							<li>TreadMail</li>
							<li>Cycling</li>
							<li>EFX</li>
						</ul>
						<span class="pull-left c-type"><strong>Working Time :</strong> 5:00 Hrs - 2100Hrs
						<p><strong>Peak Hr: </strong>1600-2100Hrs</p>
						</span>
					</div>
					<div class="rate">
						<div class="inr">
							Rs.49
							<span>Per Hour</span>
						</div>

						<div id="stars" class="starrr"></div>
					</div>
					</div>
				</div>
								 <div class="col-md-8">
					<div class="gym_list_box">
						<div class="img">
							<img src="img/gym.png" class="img-responsive">
						</div>
					<div class="dtail">
						<span class="dheading"><a href="detail_page.php">Venus fitness center</a></span>

						<p class="address">11/78 bbkular, nareimedu 7th cress<br/>
						 madurai .653129</p>
						<ul class="fetures_list">
							<li>TreadMail</li>
							<li>Cycling</li>
							<li>EFX</li>
						</ul>
						<span class="pull-left c-type"><strong>Working Time :</strong> 5:00 Hrs - 2100Hrs
						<p><strong>Peak Hr: </strong>1600-2100Hrs</p>
						</span>
					</div>
					<div class="rate">
						<div class="inr">
							Rs.49
							<span>Per Hour</span>
						</div>

						<div id="stars" class="starrr"></div>
					</div>
					</div>
				</div>
								<div class="col-md-8">
					<div class="gym_list_box">
						<div class="img">
							<img src="img/gym.png" class="img-responsive">
						</div>
					<div class="dtail">
						<span class="dheading"><a href="detail_page.php">Venus fitness center</a></span>

						<p class="address">11/78 bbkular, nareimedu 7th cress<br/>
						 madurai .653129</p>
						<ul class="fetures_list">
							<li>TreadMail</li>
							<li>Cycling</li>
							<li>EFX</li>
						</ul>
						<span class="pull-left c-type"><strong>Working Time :</strong> 5:00 Hrs - 2100Hrs
						<p><strong>Peak Hr: </strong>1600-2100Hrs</p>
						</span>
					</div>
					<div class="rate">
						<div class="inr">
							Rs.49
							<span>Per Hour</span>
						</div>

						<div id="stars" class="starrr"></div>
					</div>
					</div>
				</div> -->
		</div>
		  </form>  
	</div>
</section>
<style> 
 
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;

	background: url(images/loading.gif) center no-repeat #fff;
}
</style>

@include('user_include.footer')

<script language="javascript">
   $(document).ready(function() { 

$(".se-pre-con").fadeOut("slow"); 
   	$( ".filterChkbox" ).on( "click", function() { 
$(".se-pre-con").show()
   		$(".se-pre-con").fadeOut("slow"); 
$('#pushContent').html("");
		var Catvalues = new Array();
		var Feavalues = new Array(); 
		$.each($("input[name='Cat[]']:checked"), function() {
		  Catvalues.push($(this).val());
		});
	$.each($("input[name='Fea[]']:checked"), function() {
		  Feavalues.push($(this).val());
		});	 



      var CatFinalvalues = Catvalues.join(); 
      var FeaFinalvalues = Feavalues.join(); 

		$.ajax({  
            type: "POST",
            url: "{{url('/gymListFliter')}}", 
            data: $("#list_gym").serialize()+"&catids="+CatFinalvalues+"&feaids="+FeaFinalvalues, 
            dataType: 'JSON' ,
            success: function(data) 
            { 
			$('#pushContent').html("");
            
            var pushData="";

            if(data.error==1)
            {
 
              if(data.result.length>0){
              	for(i=0; i<data.result.length; i++)
              	{  
              		var img='{{url("uploads/images")}}/'+data.result[i][0].image ;   
                   pushData+="<div class='gym_list_box'><div class='img'><img style='height:23vh !important' src='"+img+"' class='img-responsive'></div><div class='dtail'><span class='dheading'><a href='detail_page.php'>"+data.result[i][0].name+"</a></span><p class='address'>"+data.result[i][0].address1+"<br/>"+data.result[i][0].area_location+" ."+data.result[i][0].pincode+"</p>"+data.result[i][0].featuresData+data.result[i][0].CategoryList+"<span class='pull-left c-type'><strong>Working Time :</strong> "+data.result[i][0].WrkHrData+"<p><strong>Peak Hr: </strong>"+data.result[i][0].WrkHrPeakData+"</p></span></div><div class='rate'><div class='inr'>Rs.49<span>Per Hour</span></div><div id='stars' class='starrr'></div></div></div>";  

              	}	
          
            }

           }
           else if(data.error==0)
           {  
              pushData='<div class="col-md-8"><div class="gym_list_box"><div class="dtail"><span class="dheading">No Data Found</span></div></div></div>';

           }  

          $("#pushContent").hide().html(pushData).fadeIn('slow'); //
            //$('#pushContent').html(pushData);     
            }

            });

    
   	});

   
  });

  	</script>
