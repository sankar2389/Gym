 @include('user_include.header')
<!-- login-->

<div class="login_div">
<?php    //echo "<pre>" ;print_r($reportSmall) ; ?>
<div class="container">
        <div class="col-lg-12 caption">
        Community Basket
</div>
<div class="col-lg-4 col-md-4 align">
<table>
  <tbody>
  <tr>
    <th colspan="2" class="bg">Basic Incredients SMALL</th>
  </tr>
<tr class="sidebar">
  <th class="bg">
  <h3>Vegetables</h3>
</th>
<th class="bg">
<h3>QTY</h3>
</th>
</tr>
 
 <?php $totSmall=0; ?>

@foreach( $reportSmall as $SmVal )
@if( $SmVal->purchase_products_unit=='Kg')
    <?php 
        $quantity=$SmVal->purchase_product_weight*1000;
        $weight= $SmVal->master_product_weight; 
        $price=$SmVal->master_product_unitprice;

        $totalvalue=$price*100/$weight;
        $finalvalue=$totalvalue*$quantity/100;
        $total=round($finalvalue);
        $totSmall+=$finalvalue;

      ?>
   @else 
    

     <?php 
     $weight= $SmVal->master_product_weight; 
     $price=$SmVal->master_product_unitprice;
     $totalvalue=$price*100/$weight;
     $finalvalue=$totalvalue*$SmVal->purchase_product_weight/100;
     $total=round($finalvalue); 
     $totSmall+=$finalvalue; 
     ?> 
    
 @endif
<tr>
<td>{{$SmVal->master_product_name}} </td>
<td>{{$SmVal->purchase_product_weight.$SmVal->purchase_products_unit }}  &#x20B9 {{$finalvalue}}</td>
 
</tr>
@endforeach 
<?php
 if($totSmall>0)
 {
 ?>
<tr>
<td>TOTAL</td>
<td>&#x20B9 {{$totSmall}}</td>
</tr>
 <?php
 }
 ?>

<tr>
  <td colspan="2" class="panel">ORDER NOW</td>
</tr>
</tbody>
</table>
</div>


<div class="col-lg-4 col-md-4 align">
<table>
  <tbody>
  <tr>
    <th colspan="2" class="bg">Basic Incredients Medium</th>
  </tr>
<tr class="sidebar">
  <th class="bg">
  <h3>Vegetables</h3>
</th>
<th class="bg">
<h3>QTY</h3>
</th>
</tr>
 <?php $totMedium=0;$finalvalue=0; ?>

@foreach( $reportMedium as $MeVal )
@if( $MeVal->purchase_products_unit=='Kg')
    <?php 
        $quantity=$MeVal->purchase_product_weight*1000;
        $weight= $MeVal->master_product_weight; 
        $price=$MeVal->master_product_unitprice;

        $totalvalue=$price*100/$weight;
        $finalvalue=$totalvalue*$quantity/100;
        $total=round($finalvalue);
        $totMedium+=$finalvalue;

      ?>
   @else 
    

     <?php 
     $weight= $MeVal->master_product_weight; 
     $price=$MeVal->master_product_unitprice;
     $totalvalue=$price*100/$weight;
     $finalvalue=$totalvalue*$MeVal->purchase_product_weight/100;
     $total=round($finalvalue); 
     $totMedium+=$finalvalue; 
     ?> 
    
 @endif
<tr>
<td>{{$MeVal->master_product_name}} </td>
<td>{{$MeVal->purchase_product_weight.$MeVal->purchase_products_unit }}  &#x20B9 {{$finalvalue}}</td>
 
</tr>
@endforeach 
<?php
 if($totMedium>0)
 {
 ?>
<tr>
<td>TOTAL</td>
<td>&#x20B9 {{$totMedium}}</td>
</tr>
 <?php
 }
 ?>

<tr>
  <td colspan="2" class="panel">ORDER NOW</td>
</tr>
</tbody>
</table>
</div>


<div class="col-lg-4 col-md-4 align">
<table>
  <tbody>
  <tr>
    <th colspan="2" class="bg">Basic Incredients Large</th>
  </tr>
<tr class="sidebar">
  <th class="bg">
  <h3>Vegetables</h3>
</th>
<th class="bg">
<h3>QTY</h3>
</th>
</tr>
 <?php $totLarge=0;$finalvalue=0; ?>

@foreach( $reportLarge as $LrVal )
@if( $LrVal->purchase_products_unit=='Kg')
    <?php   $LrVal->purchase_product_weight;
        $quantity=$LrVal->purchase_product_weight*1000;
        $weight= $LrVal->master_product_weight; 
        $price=$LrVal->master_product_unitprice;

        $totalvalue=$price*100/$weight;
        $finalvalue=$totalvalue*$quantity/100;
        $total=round($finalvalue);
        $totLarge+=$finalvalue;

      ?> 
   @else 
    

     <?php 
     $weight= $LrVal->master_product_weight; 
     $price=$LrVal->master_product_unitprice;
     $totalvalue=$price*100/$weight;
     $finalvalue=$totalvalue*$LrVal->purchase_product_weight/100;
     $total=round($finalvalue); 
     $totLarge+=$finalvalue; 
     ?> 
    
 @endif
<tr>
<td>{{$LrVal->master_product_name}} </td>
<td>{{$LrVal->purchase_product_weight.$LrVal->purchase_products_unit }}  &#x20B9 {{$finalvalue}}</td>
 
</tr>
@endforeach 
<?php
 if($totLarge>0)
 {
 ?>
<tr>
<td>TOTAL</td>
<td>&#x20B9 {{$totLarge}}</td>
</tr>
 <?php
 }
 ?>


<tr>
  <td colspan="2" class="panel">ORDER NOW</td>
</tr>
</tbody>
</table>
</div>
</div>
<style>table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 30%;
  
}
.bg{
  background-color: #276D3B;
  color: #fff;
  font-size: 16px;
  padding-left: 10px;
  text-align: center;
  font-family: Arial, Helvetica, sans-serif;
border: 0;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: #dddddd;
}
.sidebar_item
{
  font: normal 100% Arial, Helvetica, sans-serif;
  width: 215px;
}
.sidebar h3
{ padding: 5px 0 0 0px;
  font: normal 140% Arial, Helvetica, sans-serif;
  height: 30px;
  text-shadow: 0px -1px 0px #000;
  color: #fff;
  border-radius: 20em;
  background: #284020;
font-size: 14px;
width: 100px;
text-align: center;
margin-left: 20px;
}
.panel
{
  width: 30%;
  background-color: #2D7442;
  color: #fff;
text-align: center;
}
.caption
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 25px;
  text-align: left;
  padding-left: 20px;
  font-weight: bold;
padding: 10px 0 20px 0px;
color: #2D7442;
}
 @media (min-width:328px){
   .align
   {
     margin: 0;
     margin-top: 20px;
   }
} </style>

	<!-- <div class="container">
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<h3 class="text-center">Get Started</h3>
				<p>Farm-fresh ingredents and delicious  delivered weekly to your home</p>
			</div>
			<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
				<img src="{{ asset('asset/images/veg_box.jpeg')}}" class="img-responsive">
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="col-md-8 col-lg-8 col-xs-12 col-sm-8">
					    <form method='post' name='frmlogin' id='frmlogin' 
action="<?php echo url('/postregister'); ?> ">
               				 <div class="form-group">
							    <label for="email">Email address:</label>
							    <input type="email" class="form-control" id="email">
							  </div><input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <div class="form-group">
							    <label for="pwd">Password:</label>
							    <input type="password" class="form-control" id="pwd">
							  </div>
							  
  							 <div class="form-group">
               					 <button class="btn  btn-signin" type="submit">	Continue </button>
               				</div>
            			</form>
            			<div class="form_or">
            				<span id="hr_line"><span id="or">or</span> </span>
            			</div>
            			 <div class="fb_signup">
               					 <button class="btn" type="submit">Signup with Facebook </button>
               			</div>
               			<div class="terms_login">
               				<p>
               					By clicking above, you a gree to our <span>Trems of Use</span> and 
               					consult to our <span>Privacy  Policy</span>
               				</p>
               			</div>
				</div>
			</div>
		</div>
	</div> -->
</div>

<div class="boxes_div">
	
			<div class=" foot_box">
				<img src="{{asset('asset/images/cart.png')}}"  alt="organic">
					<span> organic Vegetables </span>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt.
				</p>

			</div>

						<div class=" foot_box">
				<img src="{{asset('asset/images/personal_menu.png')}}"  alt="organic">
					<span> organic Vegetables </span>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt.
				</p>

			</div>

						<div class="foot_box">
				<img src="{{ asset('asset/images/commitment.png')}}"  alt="organic">
					<span> organic Vegetables </span>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt.
				</p>

			</div>
						<div class="foot_box">
				<img src="{{ asset('asset/images/delivey box.png')}}" alt="organic" >
					<span> organic Vegetables </span>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt.
				</p>

			</div>
	
</div>

@include('user_include.footer')
