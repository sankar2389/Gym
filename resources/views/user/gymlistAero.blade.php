@include('user_include.header')
@include('user_include.nav')
<link rel="stylesheet" href="{{asset('asset/css/jquery.scrolling-tabs.css')}}">
<section class="gym_list">
    <div class="container">
        <form id='list_gym' method='post' name='list_gym' action='{{url("/gymChoseList/")}}' >  
            <div class="row">

                <div class="se-pre-con"></div>


                <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 ">

                    {{ csrf_field() }}
                    <input type="hidden" name="hid_type" value="{{$catType}}"  id='hid_type'>
                    <input type="hidden" name="hid_pin" value="{{$pinCode}}" id='hid_pin'> 

                    <input type="hidden" name="hid_curPak" value=""  id='hid_curPak'>
                    <input type="hidden" name="hid_CurCat" value="" id='hid_CurCat'> 


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

                            <input type="checkbox" class='filterChkbox' name='Fea[]' id='Fea[]' value="<?php echo $fatVal->fe_id; ?>" lang="<?php echo $fatVal->fe_id; ?>" > <?php echo $fatVal->features_name; ?>
                        </div>
                        <?php


                        }


                        ?>

                    </div>

                </div>  </form>  
            <div class="col-md-8 col-sm-8 gymList" id='pushContent'> 

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
                    $Gymid="";
                    $GymRawId=""; 
                    $price='';
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
                        $Gymid=encrypt($value[0]->id);
                        $GymRawId=$value[0]->id;
                        $price=$value[0]->CategoryPrice  ; 

                    }

                    if( $imageBann !="" && $GymName != "" && $GymRawId !="" && $GymRawId >0 )
                    {
                        

                ?>   
                


                 
                <!-- <a class='gymlstCls' id='<?php //echo $GymRawId;  ?>' href='#'> -->
                <div class="gym_list_box">
                    <div class="img"> 
                        <a  class="gymlstClsImg" lang="<?php echo $GymRawId;  ?>"><img src="<?php   echo url("uploads/images/".$imageBann); ?>" class="img-responsive" > </a>
                         <button class='btn btn-default btn-sm center-block gymlstCls' style="margin:5px 0" id='<?php echo $GymRawId;  ?>' > Read more</button>
                    </div>
                    <div  class="dgym_rit"> 

                        <div class="dtail">
                            <h2 class="dheading"><a class="gymlstClsImg" lang="<?php echo $GymRawId;  ?>" href="#"><?php  echo $GymName;  ?></a></h2>
                            <h2 class="address"><?php  echo $address1; ?>
                             <?php  echo $area_location; ?>, <?php  echo $pincode; ?></h2>  
                                <?php //echo "<pre>";print_r($value[0]->CategoryArray); ?>

                        </div>

                        <div class="rate">
                            <div class="inr" id='price_<?php echo $GymRawId; ?>'>
                                Rs.<?php  echo $price; ?>
                                <span>Per Session</span>
                            </div>

                            <!-- <div id="stars" class="starrr"></div> -->
                        </div>

                        <div class="features_wrokhr">
                           
                        <span class="pull-left c-type"><strong>Working Time :</strong> <?php  echo $WrkHrData; ?>
                            <p><strong>Peak Hr: </strong><?php  echo $WrkHrPeakData; ?></p>
                        </span>
                        <?php echo $featuresData; 
                        ?>
                    </div>

                    <div class="col-md-8">

                        <ul class="nav nav-tabs" role="tablist" id='<?php echo 'tab_'.$GymRawId;  ?>'>
                            <?php 
                        if(count($CategoryList)>0){


                            foreach ($CategoryList as $key => $Catvalue) {

                                $actClass='';

                            ?>
                            <?php 
                                if($key==0)
                                {

                                    $actClass='active';
                                }


                            ?>
                            <li role="presentation"   data-category ="<?php echo $Catvalue->cat_id;  ?>" class="<?php echo $actClass;  ?>">


                                <a href="<?php echo '#tab'.$GymRawId.$Catvalue->cat_id;  ?>" lang='<?php echo $GymRawId.'#$#'.$Catvalue->cat_id; ?>' class='tabCls' role="tab" data-toggle="tab"><?php echo  $Catvalue->cat_name;  ?></a>
                            </li>
                            <?php



                            }

                        } ?>

                        </ul>



                    </div>

                    <div class="col-md-4">
                        
                    </div>


                    </div>




                    </div> 



                <!-- </a> --> 

          


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
                        <span class="dheading"><a href="#">No Data Found</a></span>
                    </div>
                </div>
            </div>




            <?php

                }


            ?>
            </div>

    </div>
    </form>    
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

<style type="text/css">
    /* hide the tabs and panes to prevent flash of tabs on page
    * load/refresh before plugin has time to wrap them in the 
    * scroller; .nav-tabs are automatically unhidden by the 
    * plugin when they're ready, and .tab-content is unhidden 
    * in st-demo.js when the 'ready.scrtabs' event fires */
    .nav-tabs,
    .tab-content {
        display: none;
    }

    .st-demo-header {
        background-color: #666666;
        color: white;
        font-size: 24px;
        padding: 8px 24px;
    }

    .st-demo-header button {
        color: black;
        font-size: 12px;
    }

    .st-demo-subheader {
        background-color: #f0f0f0;
        color: #333;
        font-size: 16px;
        height: 65px;
        margin-top: 50px;
        padding: 8px 24px;
    }

    .st-demo-subheader:first-child {
        margin-top: 0;
    }

</style>

@include('user_include.footer')

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

<script language="javascript">
    $(document).ready(function() {



        $( ".gymlstCls,.gymlstClsImg" ).on( "click", function() { 

   //alert($(this).attr('class'))

            if($(this).attr('class')=="gymlstClsImg")
            {

                 
                var selCat = $('#tab_'+$(this).attr('lang')).find('li.active').data('category');
            $('#hid_curPak').val($(this).attr('lang'));
            $('#hid_CurCat').val(selCat); 
            if($(this).attr('lang')>0 && selCat >0 )
            {
                $('#list_gym').submit();

            }

            }
            else
            {

            
            var selCat = $('#tab_'+$(this).attr('id')).find('li.active').data('category');
            $('#hid_curPak').val($(this).attr('id'));
            $('#hid_CurCat').val(selCat); 
            if($(this).attr('id')>0 && selCat >0 )
            {
                $('#list_gym').submit();

            }

            }

 
            

            
        });

        $( ".tabCls" ).on( "click", function() {

            var GetVal=$(this).attr('lang');
            var pId=GetVal.split('#$#')[0]
            var Cat=GetVal.split('#$#')[1];
            //	alert(pId+''+Cat) ; 

            if(pId>0 && Cat>0 )
            {

                $(".se-pre-con").show()
                $.ajax({  
                    type: "POST",
                    url: "{{url('/gymCatPrice')}}", 
                    data: $("#list_gym").serialize()+"&catids="+Cat+"&Rwids="+pId, 
                    dataType: 'HTML',
                    success: function(data) 
                    { $(".se-pre-con").fadeOut("slow"); 
                     if(data>0)
                     {
                         $('#price_'+pId).html("Rs."+data+"<span>Per Session</span>");

                     } 
                     else{



                     } 
                    }

                });




            }



        });

        $(".se-pre-con").fadeOut("slow"); 
        $( ".filterChkbox" ).on( "click", function() {   
            $(".se-pre-con").show()

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
                url: "{{url('/gymListFliterAero')}}", 
                data: $("#list_gym").serialize()+"&catids="+CatFinalvalues+"&feaids="+FeaFinalvalues, 
                dataType: 'JSON' ,
                success: function(data) 
                { 
                    $('#pushContent').html("");
                    $(".se-pre-con").fadeOut("slow"); 
                    var pushData="";

                    if(data.error==1)
                    {

                        if(data.result.length>0){
                            for(i=0; i<data.result.length; i++)
                            {  

                                if(data.result[i][0].name !="" && data.result[i][0].image !="" && data.result[i][0].encriId !="" && data.result[i][0].id >0) {
                                    var CatArrList="";
                                    if(data.result[i][0].CategoryList.length>0)
                                    {  
                                        var CatTab="";
                                        var CatLi="";
                                        for(var kk=0;kk<data.result[i][0].CategoryList.length;kk++)
                                        {
                                            if(kk==0)
                                            {  
                                                CatLi+='<li role="presentation" data-category ="'+data.result[i][0].CategoryList[kk].cat_id+'" class="active"><a class="tabCls" href="#tab'+data.result[i][0].id+data.result[i][0].CategoryList[kk].cat_id+'" role="tab" data-toggle="tab" lang="'+data.result[i][0].id+'#$#'+data.result[i][0].CategoryList[kk].cat_id+'">'+data.result[i][0].CategoryList[kk].cat_name+'</a></li>';  
                                            }
                                            else
                                            {

                                                CatLi+='<li role="presentation" data-category ="'+data.result[i][0].CategoryList[kk].cat_id+'"  ><a class="tabCls" href="#tab'+data.result[i][0].id+data.result[i][0].CategoryList[kk].cat_id+'" role="tab" data-toggle="tab" lang="'+data.result[i][0].id+'#$#'+data.result[i][0].CategoryList[kk].cat_id+'">'+data.result[i][0].CategoryList[kk].cat_name+'</a></li>';  
                                            }

                                        }
                                        CatTab="<ul class='nav nav-tabs' id='tab_"+data.result[i][0].id+"' id='"+data.result[i][0].id+"' role='tablist'>"+CatLi+"</ul>";

                                    }  

                                    var UrlId='{{url("/gymChoseList")}}/';
                                    var img='{{url("uploads/images")}}/'+data.result[i][0].image ; 

                                    /* pushData+="<a class='gymlstCls' id='"+data.result[i][0].id+"' href='#'  ><div class='gym_list_box'><div class='img'><img src='"+img+"' class='img-responsive' style='height:23vh !important'></div><div  style='width:70%;float:left;box-shadow:-2px 0 3px #aaa;'><div class='dtail'><span class='dheading'><a href='#'>"+data.result[i][0].name+"</a></span><p class='address'>"+data.result[i][0].address1+"<br/>"+data.result[i][0].area_location+", "+data.result[i][0].pincode+"</p>"+data.result[i][0].featuresData+"<span class='pull-left c-type'><strong>Working Time :</strong> "+data.result[i][0].WrkHrData+"<p><strong>Peak Hr: </strong>"+data.result[i][0].WrkHrPeakData+"</p></span></div> <div class='rate'><div class='inr' id='price_"+data.result[i][0].id+"' >Rs."+data.result[i][0].CategoryPrice+"<span>Per Hour</span></div></div><div class='col-md-12'>"+CatTab+" </div></div></div> </a>";  */ 

                                     
                                                                     
                                     pushData+="<div class='gym_list_box'><div class='img'><a  class='gymlstClsImg' lang='"+data.result[i][0].id+"'><img src='"+img+"' class='img-responsive'></a><button class='btn btn-default btn-sm center-block gymlstCls' style='margin:5px 0' id='"+data.result[i][0].id+"' > Read more</button></div><div  style='width:70%;float:left;box-shadow:-2px 0 3px #aaa;'><div class='dtail'><h2 class='dheading'><a class='gymlstClsImg' lang='"+data.result[i][0].id+"' href='#'>"+data.result[i][0].name+"</a></h2><h2 class='address'>"+data.result[i][0].address1+data.result[i][0].area_location+", "+data.result[i][0].pincode+"</h2></div> <div class='rate'><div class='inr' id='price_"+data.result[i][0].id+"' >Rs."+data.result[i][0].CategoryPrice+"<span>Per Session</span></div></div><div class='features_wrokhr'><span class='pull-left c-type'><strong>Working Time :</strong>"+data.result[i][0].WrkHrData+"<p><strong>Peak Hr: </strong> "+data.result[i][0].WrkHrPeakData+" </p> </span><ul class='fetures_list'>"+data.result[i][0].featuresData+"</ul>  </div> <div class='col-md-12'>"+CatTab+" </div></div></div>  ";

                                }    
                            }	

                        }

                    }
                    else if(data.error==0)
                    {  
                        pushData='<div class="col-md-8"><div class="gym_list_box"><div class="dtail"><span class="dheading">No Data Found</span></div></div></div>';

                    }  

                    $("#pushContent").html(pushData).fadeIn('slow');  
                    $('.nav-tabs')
                        .scrollingTabs()
                        .on('ready.scrtabs', function() {
                        $('.tab-content').show();
                    });

                    $( ".gymlstCls,.gymlstClsImg" ).on( "click", function() {

                        if($(this).attr('class')=="gymlstClsImg")
                        {


                        var selCat = $('#tab_'+$(this).attr('lang')).find('li.active').data('category');
                        $('#hid_curPak').val($(this).attr('lang'));
                        $('#hid_CurCat').val(selCat); 
                        if($(this).attr('lang')>0 && selCat >0 )
                        {
                        $('#list_gym').submit();

                        }

                        }
                        else
                        {


                        var selCat = $('#tab_'+$(this).attr('id')).find('li.active').data('category');
                        $('#hid_curPak').val($(this).attr('id'));
                        $('#hid_CurCat').val(selCat); 
                        if($(this).attr('id')>0 && selCat >0 )
                        {
                        $('#list_gym').submit();

                        }

                        } 




                        // var selCat = $('#tab_'+$(this).attr('id')).find('li.active').data('category');


                        // $('#hid_curPak').val($(this).attr('id')); 
                        // $('#hid_CurCat').val(selCat); 

                        // if($(this).attr('id')>0 && selCat >0 )
                        // {
                        //     $('#list_gym').submit();

                        // }
                    });


                    $( ".tabCls" ).on( "click", function() {

                        var GetVal=$(this).attr('lang');
                        var pId=GetVal.split('#$#')[0]
                        var Cat=GetVal.split('#$#')[1];

                        if(pId>0 && Cat>0 )
                        {
                            $(".se-pre-con").show()

                            $.ajax({  
                                type: "POST",
                                url: "{{url('/gymCatPrice')}}", 
                                data: $("#list_gym").serialize()+"&catids="+Cat+"&Rwids="+pId, 
                                dataType: 'HTML',
                                success: function(data) 
                                { $(".se-pre-con").fadeOut("slow"); 
                                 if(data>0)
                                 {
                                     $('#price_'+pId).html("Rs."+data+"<span>Per Session</span>");

                                 } 
                                 else{



                                 } 
                                }

                            });




                        }



                    });

                }

            });


        });


    });	</script>

<style>
.gymlstClsImg{
   cursor: pointer;
}
</style>


