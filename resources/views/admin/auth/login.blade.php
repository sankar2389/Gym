<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Fitbeanz Login Form</title>
   <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> 


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">  

  <link rel='stylesheet prefetch' href="{{ asset('/admin_asset/login_css/css/gubja.css') }}">
<link rel='stylesheet prefetch' href='css/yaozl.css'>

      <link rel="stylesheet" href="{{ asset('/admin_asset/login_css/css/style.css') }}">

  
</head>

<body>
  <div class="container">
<div id="login" class="signin-card">
  <div class="logo-image">
  <img src="{{ asset('/admin_asset/img/adminlogo.png') }}" alt="Logo" title="Logo" width="138">
  </div>
  <!--<h1 class="display1">Title</h1>
  <p class="subhead">Description</p> -->
 <form class="login-form" role="form" method="POST" action="{{ url('/admin/login') }}">
    <div id="form-login-username" class="form-group">
      
        <input id="email" class="form-control"   type="text" size="18" alt="login"  placeholder="Enter email address" name="email" value="{{ old('email') }}" />
				@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="username" class="float-label">login</label>
    </div>
    <div id="form-login-password" class="form-group">
      <input id="passwd" class="form-control" name="password" placeholder="Enter Password" type="password" size="18" alt="password" >

 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="password" class="float-label">password</label>
    </div>
   <!-- <div id="form-login-remember" class="form-group">
      <div class="checkbox checkbox-default">       
          <input id="remember" type="checkbox" value="yes" alt="Remember me" class="">
          <label for="remember">Remember me</label>      
      </div>
    </div>-->
    <div>
      <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in">Sign in</button>  
	  </div>
<a href="{{url('/admin/resetpass')}}" class="pull-right need-help">Reset Password</a><span class="clearfix"></span>
    </div>
  </form>
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{ asset('/admin_asset/login_css/js/gubja.js') }}"></script>
<script src="{{ asset('/admin_asset/login_css/js/yaozl.js')}}"></script>

    <script src="{{ asset('/admin_asset/login_css/js/index.js') }}"></script>

</body>
</html>
