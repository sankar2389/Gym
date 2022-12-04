
<div class="all_cat_page">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-offset-3" style="padding:5%;">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="login_head">Login</span></div>
                <div class="panel-body" >
                    <form  role="form" method="POST" action="{{ url('/login') }}" style="padding:5%;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-top:20px;">
                            

                           
                                <input type="email" class="form-control" placeholder="Email id" style="padding:3%;"   name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           
                                <input type="password" class="form-control" placeholder="Password"  style="padding:3%;" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
       
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                               <br/>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}" style="padding: 0;margin: 10px 0;">Forgot Your Password?</a>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-6">
                                <div class="checkbox pull-right">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                 Not a member yet? <br/>
                                 <a class="btn btn-link" href="{{ url('/register') }}">Sign Up</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

