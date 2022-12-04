<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\Model\Gym_category;
use App\Model\Gym_features;
use App\Model\GymType;
use Response; 
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Mail;

class GymHomePaymentController extends Controller
{

	public function index()
	{         

      return view('user.SamplePhpRequest');  
	}
  public function paymentResp(Request $request)
  {

   $data = "";
   $flag = "true";
   $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));

   $secret_key =$PayKey[0]->secret_key;  
   $ResultArr=array();
   $txnid='';
   $txnstatus='';
   $amount='';
   $pgtxnno='';
   $issuerrefno='';
   $firstName='';
   $lastName='';
   $pgrespcode='';
   $signature='';
   $authidcode='';

   if($request->has('TxId')) {
    $txnid = $request->input('TxId');
    $data .= $txnid;
    $ResultArr['TxId']=$txnid;
  }
  else
  {
   $ResultArr['TxId']=$txnid;
  }
   if($request->has('TxStatus')) {
    $txnstatus = $request->input('TxStatus');
    $data .= $txnstatus;
     $ResultArr['TxStatus']=$txnstatus;
   }
   else
  {
    $ResultArr['TxStatus']=$txnstatus; 
  }

   if($request->has('amount')) {
    $amount = $request->input('amount');
    $data .= $amount;
     $ResultArr['amount']=$amount;
   }
   else
  {
   $ResultArr['amount']=$amount; 
  }
   if($request->has('pgTxnNo')) {
    $pgtxnno = $request->input('pgTxnNo');
    $data .= $pgtxnno;
     $ResultArr['pgTxnNo']=$pgtxnno;
   }
   else
  {
    $ResultArr['pgTxnNo']=$pgtxnno;
  }
   if($request->has('issuerRefNo')) {
    $issuerrefno = $request->input('issuerRefNo');
    $data .= $issuerrefno;
     $ResultArr['issuerRefNo']=$issuerrefno;
   }
   else
  {
    $ResultArr['issuerRefNo']=$issuerrefno;
  }
   if($request->has('authIdCode')) {
    $authidcode = $request->input('authIdCode');
    $data .= $authidcode;
     $ResultArr['authIdCode']=$authidcode;
   }
   else
  {
    $ResultArr['authIdCode']=$authidcode;
  }
   if($request->has('firstName')) {
    $firstName = $request->input('firstName');
    $data .= $firstName;
     $ResultArr['firstName']=$firstName;
   }
   else
  {
    $ResultArr['firstName']=$firstName;
  }
   if($request->has('lastName')) {
    $lastName = $request->input('lastName');
    $data .= $lastName;
     $ResultArr['lastName']=$lastName;
   }
   else
  {
    $ResultArr['lastName']=$lastName;
  }
   if($request->has('pgRespCode')) {
    $pgrespcode = $request->input('pgRespCode');
    $data .= $pgrespcode;
     $ResultArr['pgRespCode']=$pgrespcode;
   }
   else
  {
    $ResultArr['pgRespCode']=$pgrespcode;
  }
   if($request->has('addressZip')) {
    // $pincode = $request->input('addressZip');
    // $data .= $pincode;
    //  $ResultArr['addressZip']=$pincode;
   }
   else
  {
    //$ResultArr['addressZip']=$pincode;
  }
   if($request->has('signature')) {
    $signature = $request->input('signature');
   }
    


   
    $respSignature = hash_hmac('sha1', $data, $secret_key);
 
   if($signature != "" && strcmp($signature, $respSignature) != 0) {
    $flag = "false";

   }
   else
   {

     $GetCountTrackId=DB::table('gym_payment_master')
                               ->where('trans_id',$txnid)
                               ->where('status',0)
                               ->count(array('cus_pay_id'));

                              

      if($GetCountTrackId==1)
      {

        $GetUpdateTrackId=DB::table('gym_payment_master')
            ->where('trans_id', $txnid)
            ->update(['status' =>1,'pay_result'=>$txnstatus,'res_trans_id'=>$pgtxnno,'response'=>$respSignature,'res_price'=>$amount,'res_ref_no'=>$issuerrefno,'res_auth_id'=>$authidcode ]);
        /*Mail function start*/

         $GetReportResult = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.trans_id',$txnid)
               ->where('gym_payment_master.status',1)
               ->get(array('admins.email','gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id','gym_payment_master.gender','gym_payment_master.pack_desc'));
  
                $mailid=$GetReportResult[0]->user_email;
                $adminEmail=$GetReportResult[0]->email;
                $UName=$GetReportResult[0]->customer_name;
                $res_price=$amount;
                $pay_result=$GetReportResult[0]->pay_result;
                $res_trans_id=$GetReportResult[0]->res_trans_id;
                $pak_name=$GetReportResult[0]->pak_name;
                $cat_name=$GetReportResult[0]->cat_name;
                $GymName=$GetReportResult[0]->name;
                $payDt=date('d-m-Y', strtotime($GetReportResult[0]->req_date)); 
                $user_mobile=$GetReportResult[0]->user_mobile;
                $gender=$GetReportResult[0]->gender;
                $pack_desc=$GetReportResult[0]->pack_desc;
     
                $data = array( 'email'=>$mailid, 
                       'first_name'=>$UName, 
                       'from'=>'fitbeanzfitness@gmail.com',
                       'res_price'=>$res_price,
                       'pay_result'=>$pay_result,
                       'res_trans_id'=>$res_trans_id,
                       'pak_name'=>$pak_name,
                       'cat_name'=>$cat_name,
                       'GymName'=>$GymName,
                       'transId'=>$txnid,
                       'ModeofPay'=>'Online',
                       'payDt'=>$payDt,
                       'user_mobile'=>$user_mobile,
                       'adminEmail'=>$adminEmail,
                       'gender'=>$gender,
                       'pack_desc'=>$pack_desc,
                       'customer_name'=>$UName,
                       'user_email'=>$mailid,
                       'req_date'=>$payDt

                       );
 
              Mail::send('admin.emails.paymentMail', $data, function($message) use ($data) {
               $message->to($data['email'])->cc($data['adminEmail']);
               $message->replyTo($data['adminEmail'], $name = null); 
               $message->subject('Alivefitnez Payment Details');
              }); 
        /*Mail function end*/    


          return view('user.resultCitrus',compact('ResultArr','data'));

      }
      else
      {
          Session::flash('message', 'Payment invalid');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

      } 
                              
    
       

   }

 


 
  }


public function paymentChkOutfinalcitrus(Request $request)
{


  if($request->has('emailid') && $request->has('mobile') && $request->has('hidrows') &&  $request->has('cname') )
   {

        if( $request['emailid'] !="" && $request['mobile']>0 &&  $request['hidrows']>0 )
        {

          $priceId=$request['hidrows'];
          $emailid=$request['emailid'];
          $mobile=$request['mobile'];
          $gender=$request['gender'];

    $chkPriceRwValidCnt=DB::table('gym_package_price')
                                ->where('pak_price_id',$priceId)
                                ->where('active',1)->count(array('pak_price_id'));

        if($chkPriceRwValidCnt>0)
    {




      $chkPriceRwValid=DB::table('gym_package_price')
                                ->where('pak_price_id',$priceId)
                                ->get(array('pak_price_id','pak_id','pack_desc',
                                  'tra_id','dur_id','price',
                                  DB::raw('""  as GymName'),
                                  DB::raw('""  as Category'),
                                  DB::raw('""  as UserID'),
                                  DB::raw('""  as PakName')
                                  ));

        $GymPakIDChk=$chkPriceRwValid[0]->pak_id;

        $getPakageCnt=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$priceId)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->count(array('gym_package_master.pak_id'));

       

        if($getPakageCnt>0 )
        {
 

           $getPakage=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$priceId)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->get(array('gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.abt_package','gym_package_master.user_id','gym_category_master.cat_name','admins.name','gym_package_master.cat_id'));

              $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));
               
//echo "<pre>"; print_r($chkPriceRwValid); exit;

              $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
              $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
              $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
              $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;
              $trans_id=uniqid().time(); 
              $secret_key=$PayKey[0]->secret_key;//"556e33423e971f6106d5e1c68fa3ffc468ad65eb";
              $curDate=date('Y-m-d h:i:s');
              $vanityUrl=$PayKey[0]->vanityUrl;//"mwmb90c6c2";
              $orderAmount=$chkPriceRwValid[0]->price;
              $currency=$PayKey[0]->currency;//'INR';
              $data=$vanityUrl.$orderAmount.$trans_id.$currency; 
              $securitySignature = hash_hmac('sha1', $data, $secret_key);
              $postArr['formPostUrl']=$PayKey[0]->postUrl;//"https://checkout.citruspay.com/ssl/checkout/mwmb90c6c2";
              $postArr['secret_key']=$secret_key;
              $postArr['vanityUrl']=$vanityUrl;
              $postArr['merchantTxnId']=$trans_id;
              $postArr['orderAmount']=$orderAmount;
              $postArr['currency']=$currency;
              $postArr['data']=$vanityUrl.$orderAmount.$trans_id.$currency;
              $postArr['returnURL']="http://alivefitnez.com/paymentTestRes";
              $postArr['securitySignature']=$securitySignature;
              $postArr['email']=$emailid;
              $postArr['mobile']=$mobile;

              $customeName=$request['cname'];

              

       
 
         
              $GetCountTrackId=DB::table('gym_payment_master')
                               ->where('trans_id',$trans_id)
                               ->count(array('cus_pay_id'));
                               
               if($GetCountTrackId==0)
               {
                 $saveTbl=DB::table('gym_payment_master')->insert(
    ["user_id" => $getPakage[0]->user_id, "pak_id" => $getPakage[0]->pak_id,"cat_id"=> $getPakage[0]->cat_id,"price_id"=> $priceId,"pak_name"=> $getPakage[0]->package_name,"cat_name"=> $getPakage[0]->cat_name,"price"=> $chkPriceRwValid[0]->price,"pack_desc"=> $chkPriceRwValid[0]->pack_desc,"req_date"=> $curDate,"user_email"=> $emailid,"user_mobile"=> $mobile,"trans_id"=>$trans_id,"customer_name"=>$customeName,"gender"=>$gender ]
     );
                  return view('user.checkoutCitrus',compact('postArr'));

               }
               else
               {

                    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

               }                 
              
                               

        } 
        else
        {
         Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');
        }                        
             

    }

        
        


        }
        else
        {
             Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

        } 
        
   }
   else
   {

    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

   }





}

}
 
