<?php 
use App\Model\Category;
use App\Model\GenOtpModel;

function category()
{
	$cat =  Category::select('*')->where('parent', 0)->get();
	return $cat;
}

function subcategory($id)
{
	$subcat =  Category::select('*')->where('parent', $id)->get();
	return $subcat;
}

function sendOTP1($mobile) {

	return $mobile;

}

function sendOTP($mobile) {
   
    $authKey = '113659AZSsY9wsaB57413032';//$setting->sms_auth_key;
    $mobileNumber = $mobile;
    $senderId = 'AALIVE';//'FALCON';
    $otp = generateOTP();
    $message = urlencode($otp);
    $route = "4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );

   //API URL
    $url="https://control.msg91.com/api/sendhttp.php";

   // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));


   //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


   //get response
    $output = curl_exec($ch);

   //Print error if any
    if(curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    } else {

       GenOtpModel::select('*')->where('mobile_no', $mobile)->update(['otp' => $otp,'status'=>'0']);	
       return $otp;
    }

   curl_close($ch);
}
function generateOTP($length = 6, $chars = '123456789') {
    $chars_length = (strlen($chars) - 1);
    $string = $chars{rand(0, $chars_length)};
    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $string{$i - 1})
            $string .= $r;
    }
    return $string;
}