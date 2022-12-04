 @include('user_include.header')
<!-- login-->

<div class="login_div">
	<div class="container">
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
>
          <!--action="{{url('/login')}}" -->     				 <div class="form-group">
							    <label for="email">Email address:</label>
							    <input type="email" class="form-control" id="email" name="email">
							  </div><input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <div class="form-group">
							    <label for="pwd">Password:</label>
	<input type="password" name="pwd" class="form-control" id="pwd">
							  </div>
							  
  							 <div class="form-group">
               					 <button id='submit_frm' class="btn  btn-signin" type="submit">	Continue </button>
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
	</div>
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
<script> 

	$( document ).ready(function() {
	
	$("#submit_frm").click(function(event) { 
	event.preventDefault();
	var validator = $("#frmlogin").validate({
	rules: { 
		email:{
		required: true,
		email: true
			  },
	pwd:{required: true,}
	},                             
	messages: {

		email:{
			required : "Please enter email id ",
			email : "Please enter valid email id ",
		},
		pwd:{required: "Please enter password",},
		}
	});

	//alert(validator.form());
	if(validator.form()) {
	$.ajax({  
	type: "POST",
	url: "{{url('admin/gymreg')}}", 
	data: $("#frmlogin").serialize(), 
	dataType: 'HTML', 
	success: function(data) 
	{  
	alert(data);


	}

	});

	}
	}); 
	});

</script>
@include('user_include.footer')
