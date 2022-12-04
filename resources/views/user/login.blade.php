
<div class="container">
    <div class="row">
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        @if(Session::has('message'))
        <div class="alert alert-success">
            <i class="fa fa-check-square">
                {!!Session::get('message')!!}
            </i></div>
        @endif
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <h3><b>Sign In</b> </h3>
	@if(count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach
	</div>
	@endif	
	<form action="<?php echo url('/login');?>" method="post" class="form-horizontal">
	<div class="form-group">
	<div class="col-md-7">
		<input type="text" name="email" id="email" class="form-control" placeholder="Email" required="">
                               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
	</div>
	</div>
	<div class="form-group">
	  <div class="col-md-7">
	<input type="password" name="password" id="password" class="form-control" placeholder="Password" required=""> 
					 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

	</div>		
	</div>
	<button type="submit" class="btn btn_yak btn-md">Sign In</button>
	<a href="<?php echo url('/password/reset');?>" class="btn btn-success btn-md">Forgot Password</a>
		<a href="<?php echo url('/register');?>" class="btn btn-success btn-md">New User</a>

	{{ csrf_field() }}
	</form>	
</div>
