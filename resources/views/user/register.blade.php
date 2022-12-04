

<div class="container">

    <div class="row">
        <div class="col-lg-6" style="background-color: #fcf9e8; padding: 2%;">
            <h4><b>Signup</b></h4>

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif	
            @if(Session::has('message'))
            <div class="alert alert-danger">
                <p>{{ Session::get('message') }}
            </div>
            @endif  
            <form action="<?php echo url('/postregister'); ?>" method="post" class="form-horizontal">
                <h4><b>Your Personal Information </b></h4>
                <hr>
                    

                </div>
                <div class="form-group">
                <div class="col-md-6">
                     <label for="email">Name</label>
                        <input type="text" name="name" id="name" placeholder="Lastname" class="form-control" required="">
                                   @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                <div class="form-group">

                    <div class="col-md-6">
                     <label for="email">Email address</label>
                        <input type="text" name="email" id="email"  class="form-control" placeholder="E-mail" required="">
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

<div class="form-group">
                    <div class="col-md-6">
 <label for="email">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Pasword" required="">  
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>	
                </div>
                  <div class="form-group">
                    <div class="col-md-6">
                        <label for="email">Mobile Number</label>

                        <input type="text" name="mobile" id="mobile"  class="form-control" required="">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12">

                        <label for="email">Address</label>
                        <textarea name="address" id="address" class="form-control" style="
                                  height: 100px;" required=""></textarea>	
                                
                    </div>
                </div>
                
              

                <button type="submit" class="btn btn_yak">Sign Up</button>

            </form>	

        </div>
        
    </div>
</div>
