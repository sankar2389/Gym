@include('user_include.header')


<link href="{{asset('asset/1/thumbs2.css')}}" rel="stylesheet" />
<link href="{{asset('asset/1/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('asset/1/thumbnail-slider.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<section class="details">
    <div class="container">
        <div class="row">
            <div class="se-pre-con"></div>
            <div class="detail_box">

                <?php 

                $Cnt=0; foreach($getParticularGymList as $KeyVals)
                { $Cnt++; ?>
                <input type='hidden' name='hidrows' id='hidrows' value='<?php echo $KeyVals->id; ?>' >
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="gym_vw">
                        <div class="tab-content"> <?php
                 if(count($KeyVals->Banner)>0)
                 {
                     foreach ($KeyVals->Banner as $key => $Bannervalue) {
                         $rKryVal=$key+1;
                         if($rKryVal==1){
                            ?>
                            <span class="tab-pane fade in active" id="tab<?php echo $rKryVal; ?>">
                                <img src="<?php   echo url("uploads/images/".$Bannervalue->img_path); ?>" class="img-responsive gymListImg">
                            </span>
                            <?php
                         }
                         else
                         {
                            ?>
                            <span class="tab-pane fade" id="tab<?php echo $rKryVal; ?>">
                                <img src="<?php   echo url("uploads/images/".$Bannervalue->img_path); ?>" class="img-responsive gymListImg">
                            </span> 
                            <?php
                         }
                     }

                 }
                 else
                 {   ?>

                       <span class="tab-pane fade in active" id="tab1">
                                <img src="{{asset('img/images.jpeg') }}" class="img-responsive">
                            </span> 
                    <?php


                 } ?> 
          

                        </div>
                    </div>
                   

                    <div class="left_image_thumb" style="float:left;width:100%;"> 
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                             <?php $splitArray=array();
                              if(count($KeyVals->Banner)>0 )
                              {
                                $splitArray=array_chunk($KeyVals->Banner,4,true);

                                $tabId=0;

                                for($i=0; $i<count($splitArray); $i++)
                                {

                                    if($i==0)
                                    { 
                                        ?>
                                        <div class="item active">
                                        <?php

                                    }
                                    else
                                     { ?>
                                        <div class="item ">
                                       <?php
                                     } 
                                      
                                   foreach ($splitArray[$i] as $key => $value) { 
                                    $tabId++;

                                    ?>
                                     <div class="col-sm-3 col-xs-3">
                                        <a  href="#tab<?php echo $tabId; ?>" data-toggle="tab">
                                            <img class="img-responsive" style="width:100%;height:100px;"   src="<?php   echo url("uploads/images/".$value->img_path); ?>">
                                        </a>

                                    </div>
                                    <?php


                                    //echo $i.$value->img_path.'<br>'  ;
                                   }

                                 ?>
                                  </div>
                                 <?php

                                }

                                

                              }
                              else
                              {

                                ?>
 
                                <?php
                              } 
               



              // echo "<pre>"; print_r($splitArray);

                             



                             ?>

                              <!--   <div class="item active">
                                    <div class="col-sm-3 col-xs-3">
                                        <a  href="#tab1" data-toggle="tab">
                                            <img class="img-responsive"  src="{{asset('img/gym_vw.jpg') }}">
                                        </a>

                                    </div>
                                    <div class="col-sm-3 col-xs-3">
                                        <a  href="#tab2" data-toggle="tab"> <img class="img-responsive" src="{{asset('img/gallery_1.jpg') }}"  ></a>

                                    </div>
                                    <div  class="col-sm-3 col-xs-3">         
                                        <a  href="#tab3" data-toggle="tab"> <img class="img-responsive" src="{{asset('img/gym_vw.jpg') }}"></a>

                                    </div>

                                    <div  class="col-sm-3 col-xs-3">
                                        <a  href="#tab4" data-toggle="tab"> <img class="img-responsive" src="{{asset('img/gym_vw.jpg') }}"></a>

                                    </div>
                                </div> -->

                            <!--     <div class="item">
                                    <div class="col-sm-3 col-xs-3">
                                        <a  href="#tab1" data-toggle="tab">
                                            <img class="img-responsive"  src="{{asset('img/gym_vw.jpg') }}">
                                        </a>

                                    </div>
                                    <div class="col-sm-3 col-xs-3">
                                        <a  href="#tab2" data-toggle="tab"> <img class="img-responsive" src="{{asset('img/gallery_1.jpg') }}"  ></a>

                                    </div>
                                    <div  class="col-sm-3 col-xs-3">         
                                        <a  href="#tab3" data-toggle="tab"> <img class="img-responsive" src="{{asset('img/gym_vw.jpg') }}"></a>

                                    </div>

                                    <div  class="col-sm-3 col-xs-3">
                                        <a  href="#tab4" data-toggle="tab"> <img class="img-responsive" src="{{asset('img/gym_vw.jpg') }}"></a>

                                    </div>
                                </div> --> 

                            </div> 
                            <?php 
                               if(count($splitArray)>1)
                              {
                                  ?>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                                  <?php

                              }
                              else
                              {



                              }



                            ?>


                            <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> -->
                        </div>

                    </div>
                </div>

               

                <div class="col-md-7 col-sm-7 col-xs-12">

                    <div class="header_panel">
                        <span class="gym_title"><?php echo $KeyVals->name ; ?></span>


                        </div>


                        <div class="col-md-12">
                            <b> <i class="fa fa-map-marker" aria-hidden="true"></i> Address </b> <br/> <?php echo $KeyVals->address1 ; ?>  
                                <br/><?php echo $KeyVals->area_location; ?><?php echo $KeyVals->pincode; ?> </span> 
                        </div>

                       
                        <div class="col-md-12 col-sm-12 ">
                            <span class="facility_head"><b><i class="fa fa-cog" aria-hidden="true"></i> Facilities</b></span><br/>
                            <?php echo $KeyVals->featuresData ; ?>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <span><b> <i class="fa fa-clock-o" aria-hidden="true"></i> working hours </b> </span><br/><?php  echo $KeyVals->WrkHrData; ?>
                            <span>Peak hours: </span><?php  echo $KeyVals->WrkHrPeakData; ?>
                        </div>

                        <div class="col-sm-12 col-md-12" id='spnDesc'>
                            <span ><b> <i class="fa fa-info-circle" aria-hidden="true"></i> Description </b> </span><br/> <?php   echo $KeyVals->abt_package; ?>
                             
                        </div>


                        <div class="col-md-8 nav_uli">
                            <ul class="nav nav-tabs cattab" role="tablist" id='<?php  echo 'tab_'.$KeyVals->id;  ?>'>

                                <?php 
                 if(count($KeyVals->CategoryList)>0){


                     foreach ($KeyVals->CategoryList as $key => $Catvalue) {

                         $actClass='';

                         $actClass='';

                                ?>
                                <?php 
                         if($Catvalue->cat_id==$hidcat)
                         {

                             $actClass='active';
                         }


                                ?>
                                <li role="presentation"   data-category ="<?php echo $Catvalue->cat_id;  ?>" class="<?php echo $actClass;  ?>">


                                    <a href="<?php  echo 'tab'.$KeyVals->id;  ?>" lang='<?php  echo $KeyVals->id.'#$#'.$Catvalue->cat_id; ?>' class='tabCls' role="tab" data-toggle="tab"><?php echo  $Catvalue->cat_name;  ?></a>
                                </li>
                                <?php



                     }

                 } ?>





                            </ul>





                    </div>
                    <div class="col-md-4">

 <div class="gym_cat_select">  
                            <form name='list_gymPay' id='list_gymPay'  method='post' action="{{url('/paymentChkOut')}}" class="form-inline">

                            <input type="hidden" name="hidGid" id="hidGid" >
                            <input type="hidden" name="hidRw" id="hidRw" >
                                <div class="form-group">
                                    <select id='selPak' name='selPak' class="select-cat_opt">
                                        <option>Select Your Category</option>
                                        <?php
                 foreach ($KeyVals->TotPakList as $key => $PakSelvalue) {

                     if($PakSelvalue->pak_id==$PakSelvalue->SelePack)
                     {
                                        ?>
                                        <option  selected='true' value='<?php echo $PakSelvalue->pak_id;  ?>'><?php echo $PakSelvalue->package_name;  ?> </option>
                                        <?php 

                     }
                     else
                     {
                                        ?>
                                        <option value='<?php echo $PakSelvalue->pak_id;  ?>'><?php echo $PakSelvalue->package_name;  ?> </option>
                                        <?php
                     }



                 }


                                        ?>

                                    </select> 
                                </div>

                                </div>
                    </div>
                    <div class="col-sm-12 col-md-12" >

                        <span id='PakTitle' style="width:50%; float:left;"><h3>Packages:<?php  echo $KeyVals->PriceList[0]->package_name; ?></h3></span>
            <span id='toggleBtn' style="width:50%; float:left; padding:15px 0px;text-align:right;">
                <!-- <input type="checkbox" id='toggleChk'   name='toggleChk'  checked data-toggle="toggle">hfhfjfjfh -->
                <input id='toggleChk'   name='toggleChk'  data-toggle="toggle" data-on="Trainer On" data-off="Trainer Off"  data-onstyle="success" data-offstyle="danger" type="checkbox">
            </span>
                        <div class="tab-content clearfix">

                            <div class="tab-pane active" id="divPrice">
                                <?php
                                $trainOnCnt=0;
                  foreach ($KeyVals->PriceList as $key => $PriceListvalue) {

                     if($PriceListvalue->pack_desc !="" && $PriceListvalue->price >0)
                      {
                            $trainerClass="";
                            $GetPer=explode(':', $PriceListvalue->pack_desc) ;
                            $perDisplay='';
                            if(isset($GetPer[0]))
                            {
                              $perDisplay=$GetPer[0];
                            }

                            if($PriceListvalue->tra_id==1) //with trainer
                            {
                               $trainerClass='trainerON';
                               $trainOnCnt++;

                            }
                            elseif($PriceListvalue->tra_id==2)
                            {
                              $trainerClass='trainerOFF';
                            }
                             
                                ?>
                                <div class="row {{$trainerClass}}">
                                    <div class="package_div ">
                                        <div class="package_name ">
                                            {{$PriceListvalue->pack_desc}}
                                        </div>
                                        <div class="rate_box" >
                                            Rs.{{$PriceListvalue->price}}/per {{$perDisplay}}
                                        </div>
                                        <button  type='button' lang='<?php echo $PriceListvalue->pak_price_id;  ?>' class="btn btn-info btn-sm payBtn">
                                    Buy now
                                    </button>
                                    </div>
                                    &nbsp; 
                                </div>
                                <?php
                     } 
                 } 



                                ?>



                            </div>



                        </div>
                    </div>


                </div>

                <?php } ?>
                </form>
        </div>
    </div>
</section>


<script src="{{asset('asset/js/jquery.scrolling-tabs.js')}}"></script>
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
<script type="text/javascript">
    ;(function() {
        'use strict';


        $(activate);


        function activate() {

            $('.nav-tabs')
                .scrollingTabs()
                .on('ready.scrtabs', function() {
                $('.tab-content').show();
            });

        }
    }());

</script>


@include('user_include.footer')

<script type="text/javascript">
    $(document).ready(function() { 
//$('#toggleChk').text("sdfsdfasdf")

$('#toggleChk').bootstrapToggle('off');

 var withTrainCnt='{{$trainOnCnt}}';

 if(withTrainCnt==0)
 {
  $('#toggleChk').prop("disabled","true");
 }
  
 $('.trainerON').hide();
$("#toggleChk").change(function(){
  if($(this).prop("checked") == true){
    $('.trainerON').show();
    $('.trainerOFF').hide()
  }else{
    $('.trainerON').hide();
    $('.trainerOFF').show()
  }
});

$('.carousel').carousel({
    pause: true,
    interval: false
});

        $(".se-pre-con").show()
        $(".se-pre-con").fadeOut("slow"); 
        $("#selPak").change(function() {

            var PakId=$("#selPak" ).val();
            var rWID=$('#hidrows').val();
            var selCatid = $('#tab_'+rWID).find('li.active').data('category');
            

            if(PakId>0 && rWID>0 && selCatid>0){
              $('#toggleBtn').html("<input id='toggleChk'   name='toggleChk'  data-toggle='toggle' data-on='Trainer On' data-off='Trainer Off'  data-onstyle='success' data-offstyle='danger' type='checkbox'>");
                $(".se-pre-con").show()
                $('#PakTitle').html("");
                $.ajax({  
                    type: "POST",
                    url: "{{url('/gymChangeCat')}}", 
                    data: $("#list_gymPay").serialize()+"&catids="+selCatid+"&Rwids="+rWID+"&pkId="+PakId, 
                    dataType: 'JSON',
                    success: function(data) 
                    { $(".se-pre-con").fadeOut("slow"); 

                     $('#divPrice').html("");
                     var pushPrice=''; 
                     var DivTitle='---';
                     var trainerCls='';
                     var withTrainCnt=0;
                     if(data.error==1)
                     {  



                         for(var i=0; i<data.resultSet.length; i++)
                         {
                            if(data.resultSet[i].price>0){
                             var DivTitle=data.resultSet[i].package_name;
                             var pricerwId=data.resultSet[i].pak_price_id;
                             var perDis=data.resultSet[i].pack_desc.split(':')[0];
                             if(data.resultSet[i].tra_id==1)
                             {
                                trainerCls='trainerON';
                                withTrainCnt++;
                             }
                             else if(data.resultSet[i].tra_id==2) 
                             {
                                trainerCls='trainerOFF';
                             }

                             if(data.resultSet[i].abt_package !="")
                             {
                              $('#spnDesc').html('<span ><b> <i class="fa fa-info-circle" aria-hidden="true"></i> Description </b> </span><br/>'+data.resultSet[i].abt_package);
                             }

                            

                             pushPrice+="<div class='row "+trainerCls+"'><div class='package_div'><div class='package_name'> "+data.resultSet[i].pack_desc+" </div><div class='rate_box'> Rs."+data.resultSet[i].price+"/per "+perDis+" </div><button class='btn btn-info btn-sm payBtn' lang='"+pricerwId+"'>Buy now</button></div></div>";

                              }

                         }
                         //$('#price_'+pId).html("Rs."+data+"<span>Per Hour</span>");

                         $('#PakTitle').html("<h3>Packages:"+DivTitle+"</h3>");  
                         $('#divPrice').html(pushPrice); 
                          

                         $(document).ready(function() { 
                          $('#toggleChk').bootstrapToggle('off');
                           
                          if(withTrainCnt==0)
                          {
                            $('#toggleChk').prop("disabled","true");
                          }

                          $('.trainerON').hide();
                          $("#toggleChk").change(function(){
                          if($(this).prop("checked") == true){
                          $('.trainerON').show();
                          $('.trainerOFF').hide()
                          }else{
                          $('.trainerON').hide();
                          $('.trainerOFF').show()
                          }
                          });
                           
                         $( ".payBtn" ).on( "click", function() {  

  var rWId=$(this).attr('lang');
   
  if(rWId>0)
  {$('#hidRw').val(rWId);
     $('#list_gymPay').submit();
  }
 
 });
});

                     } 
                     else{
                         $('#PakTitle').html("<h3>Packages:"+DivTitle+"</h3>");  
                         $('#divPrice').html("<div class='row'><div class='package_div'><div class='package_name'> Invalid data please try again  </div> </div></div>");


                     } 
                    }

                });

            }




        });    



        $( ".tabCls" ).on( "click", function() {

            var GetVal=$(this).attr('lang');
            var pId=GetVal.split('#$#')[0]
            var Cat=GetVal.split('#$#')[1];
            var selCatid = $('#tab_'+pId).find('li.active').data('category');
            


            if(selCatid!=Cat)
            {
               $('#toggleBtn').html("");

            $('#toggleBtn').html("<input id='toggleChk'   name='toggleChk'  data-toggle='toggle' data-on='Trainer On' data-off='Trainer Off'  data-onstyle='success' data-offstyle='danger' type='checkbox'>");
                $(".se-pre-con").show();
                $('#divPrice').html("");
                $.ajax({  
                    type: "POST",
                    url: "{{url('/gymListTabPrice')}}", 
                    data: $("#list_gymPay").serialize()+"&Cat="+Cat+"&Rwids="+pId, 
                    dataType: 'JSON',
                    success: function(data) 
                    { $(".se-pre-con").fadeOut("slow"); 
                     if(data.error==1)
                     {
                         var Pak_options = $("#selPak");
                         Pak_options.empty();
                         var pushPrice="";
                         Pak_options.append($("<option />").val("0").text("--Select Your Category--"));
                         var trainerCls='';
                         var withTrainCnt=0;

                         $.each(data.getTotPackage, function() {

                          

                             

                             if(this.pak_id==this.pak_id)
                             {

                                 Pak_options.append($("<option />").val(this.pak_id).text(this.package_name));
                             }
                             else
                             {

                                 Pak_options.append($("<option />").val(this.pak_id).text(this.package_name));
                             }
                             if(this.pak_id==this.SelePack)
                             {     
                              //alert(this.abt_package);
                              if(this.abt_package !="")
                             {
                              $('#spnDesc').html('<span ><b> <i class="fa fa-info-circle" aria-hidden="true"></i> Description </b> </span><br/>'+this.abt_package);
                             }
                                 $('#PakTitle').html("<h3>Packages:"+this.package_name+"</h3>")
                                 $('#selPak option[value="'+this.pak_id+'"]').attr("selected", "selected");
                             }

                         });

                         //alert(data.getListMinPackage.length)

                         for(var i=0;i<data.getListMinPackage.length;i++ )
                         {
                             if(data.getListMinPackage[i].price>0){
                             var perDis=data.getListMinPackage[i].pack_desc.split(':')[0];
                             if(data.getListMinPackage[i].tra_id==1)
                             {
                                trainerCls='trainerON';
                                withTrainCnt++;
                             }
                             else if(data.getListMinPackage[i].tra_id==2) 
                             {
                                trainerCls='trainerOFF';
                             }

                               var pricerwId=data.getListMinPackage[i].pak_price_id;
                                 pushPrice+="<div class='row "+trainerCls+"'><div class='package_div'><div class='package_name'> "+data.getListMinPackage[i].pack_desc+" </div><div class='rate_box'> Rs."+data.getListMinPackage[i].price+"/per "+perDis+" </div><button class='btn btn-info btn-sm payBtn' lang='"+pricerwId+"'>Buy now</button></div></div>";
                             }
                         }

                         $('#divPrice').html(pushPrice); 
                         $('.trainerON').hide();
                         //alert(4);
                                        $(document).ready(function() { 
                                           $('#toggleChk').bootstrapToggle('off');
                                          if(withTrainCnt==0)
                                          {
                                          $('#toggleChk').prop("disabled","true");
                                          }

                          $('.trainerON').hide();
                          $("#toggleChk").change(function(){
                          if($(this).prop("checked") == true){
                          $('.trainerON').show();
                          $('.trainerOFF').hide()
                          }else{
                          $('.trainerON').hide();
                          $('.trainerOFF').show()
                          }
                          });

                         $( ".payBtn" ).on( "click", function() {  

  var rWId=$(this).attr('lang');
   
  if(rWId>0)
  {$('#hidRw').val(rWId);
     $('#list_gymPay').submit();
  }
 
 });
});


                     } 
                     else{



                     } 

                      
                    }

                });



            }




        


        }); 
 $( ".payBtn" ).on( "click", function() {

  var rWId=$(this).attr('lang');
   
  if(rWId>0)
  {$('#hidRw').val(rWId);
     $('#list_gymPay').submit();
  }
 
 });

    });
</script>  