<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Fitbeanz</title>
   <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> 


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">  

  <link rel='stylesheet prefetch' href="{{ asset('admin_asset/login_css/css/gubja.css') }}">
<link rel='stylesheet prefetch' href="{{ asset('admin_asset/login_css/css/yaozl.css')}}">

      <link rel="stylesheet" href="{{ asset('admin_asset/login_css/css/style.css') }}">

  
</head>

<body>
  <div class="container">
<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall" style='text-align: center;'>
                <img src="{{ asset('admin_asset/img/adminlogo.png') }}" alt="Logo" title="Logo" width="138">
                <form class="form-signin" id='resetFrm'   method="POST">
                <input type="text" class="form-control" id='email' name='email' placeholder="Enter Admin email-id" required>
                <br/>
                <button class="btn btn-lg btn-primary btn-block" id='submit_frm' type="submit">
                  Reset Password  </button>
                  <br>
                  <span id='errMsg' >  </span>
               
                <a href="{{url('/admin/login')}}" class="pull-right need-help">Sign in</a><span class="clearfix"></span>
                </form>
            </div>
            
        </div>
    </div>
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{ asset('admin_asset/login_css/js/gubja.js') }}"></script>
<script src="{{ asset('admin_asset/login_css/js/yaozl.js')}}"></script>

    <script src="{{ asset('admin_asset/login_css/js/index.js') }}"></script>
    <script src="{{ asset('admin_asset/assets/js/jquery.validate.min.js') }}"></script>


</body>
<style type="text/css">
  

  .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
.error
{
   
  float: left;
    margin-top: 25px;
    position: relative;
    text-align: left;
    width: 100%;
}
 
</style>

<script type="text/javascript">

$(document).ready(function () { 
   $('#errMsg').html("");

      $("#submit_frm").click(function(event) {  

      event.preventDefault();
      $('#errMsg').html("");
      var validator = $("#resetFrm").validate({
      rules: { 
      email:{required: true,email: true},
      },                             
      messages: {
      email:{ required : "Enter admin email",email: "Invalid email"    }, 
      }
      });

        $.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters");

 
             if(validator.form())
             {
 
$("#submit_frm").prop('disabled', true);
              $('#errMsg').html("<font color='red'>Please Wait...</font>");
    $.ajax({  
    type: "POST",
    url: "{{url('admin/resetpassAjx')}}", 
    data: $("#resetFrm").serialize(), 
    dataType: 'HTML', 
    success: function(data) 
    {  
            
$("#submit_frm").prop('disabled', false);
       
         $('#errMsg').html("");

          
          if(data==0)
            {
             $('#errMsg').html("<font color='red'>Admin email id is invalid</font>");
            }
            else if(data==2)
            {
              $('#errMsg').html("<font color='green'>Please check your mail-id</font>"); 
              $('#email').val("");
            }
            else
            {
               $('#email').val("");
               $('#errMsg').html("<font color='red'>Invalid Reqest</font>"); 
            }
            
             

           

        }

   
    });

             }
              


    });

       // $(".btn-danger").click(function(event) {
       
       // $('.form-control').val("");
       // $('.error').html("");
       
       //  });   

  });
  
// $(document).ready(function () { 

//   $('#resetBtn').click(function(){

//     alert(5)


//   });


// alert(4);
// })

</script>


</html>
