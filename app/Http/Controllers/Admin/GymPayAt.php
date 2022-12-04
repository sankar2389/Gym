<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Gym_package;
use App\Model\Gym_trainer;
use App\Model\Gym_duration;
use App\Model\Gym_category;
use App\Model\Gym_package_price;
use App\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response;
use Mail;
  
class GymPayAt extends Controller
{
         protected $userId;
         public function __construct()
    	 {

            $this->userId=auth()->guard('admin')->user()->id;
            if($this->userId ==1)
            {  
                  return redirect('/admin/error')->send();
            }
         }
         public function gymPayats()
         {
         
          return view('admin.Gym.GymOfflinePay');
         }
         public function gymPhyViewPayats()
         {
            return view('admin.Gym.GymPhyAttPay');

         }
         public function PhyEntryLists(Request $request)
         {

           if($request->has('mobile') && $request->has('Selopt') )
           {

               $mobile=$request['mobile'];
               $Selopt=$request['Selopt'];
 
               if($mobile !="" && $Selopt>0)
               {

                  $getDuration=DB::table('gym_refund_duration')->get(array('online','offline'));
                  $onlineDur=$getDuration[0]->online; 
                  $offlineDur=$getDuration[0]->offline;
                  $usersId=$this->userId ;


                 if($Selopt==1) //Online 
                 {
 

                    $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                 ->where('gym_payment_master.user_id',$usersId)
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$onlineDur.' DAY)'))
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', DB::raw('NOW()'))
                 ->where('gym_payment_master.user_mobile',$mobile)
                 ->where('gym_payment_master.cancel_status',0)
                 ->where('gym_payment_master.pay_offline',0)
                 ->where('gym_payment_master.pay_result','SUCCESS')
                 ->where('gym_payment_master.status',1)
                 ->orderBy(DB::raw('DATE(gym_payment_master.req_date)'),'desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id','gym_payment_master.physical_att'));

                 return view('admin.Gym.GymPhyUpdate',compact('GetReport','Selopt'));
               

                
  

                 }
                 elseif($Selopt==2) //Pay at gym Offline
                 {


                  $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.user_id',$usersId)
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$offlineDur.' DAY)'))
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '<=', DB::raw('NOW()'))
               ->where('gym_payment_master.user_mobile',$mobile)
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.pay_offline',1)
               ->where('gym_payment_master.pay_result','SUCCESS')
               ->where('gym_payment_master.status',1)
               ->orderBy(DB::raw('DATE(gym_payment_master.req_date)'),'desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id','gym_payment_master.physical_att'));

                 return view('admin.Gym.GymPhyUpdate',compact('GetReport','Selopt'));
              

                 }
                 else
                 {
                   return view('admin.Gym.GymPhyAttPay');
                 }

               }
               else
               {
                  return view('admin.Gym.GymPhyAttPay');
               }

           }
           else
           {

             return view('admin.Gym.GymPhyAttPay');

           }

           


         }
          public function PhyEntrySaveLists(Request $request)
         {
            if($request->has('rwsId') && $request->has('hidonoff'))
            {

                  $Id=$request['rwsId'];
                  $hidonoffs=$request['hidonoff'];
                  if($Id>0 && $hidonoffs>0)
                  {

                    $getDuration=DB::table('gym_refund_duration')->get(array('online','offline'));
                    $onlineDur=$getDuration[0]->online; 
                    $offlineDur=$getDuration[0]->offline;
                    $usersId=$this->userId ;


                    if($hidonoffs==1)
                    {


                      $GetReportCnt = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                         ->where('gym_payment_master.user_id',$usersId)
                         ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$onlineDur.' DAY)'))
                         ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', DB::raw('NOW()'))
                         ->where('gym_payment_master.cus_pay_id',$Id)
                         ->where('gym_payment_master.physical_att',0)
                         ->where('gym_payment_master.cancel_status',0)
                         ->where('gym_payment_master.pay_offline',0)
                         ->where('gym_payment_master.pay_result','SUCCESS')
                         ->where('gym_payment_master.status',1)
                         ->count(array('gym_payment_master.cus_pay_id'));

                         if($GetReportCnt==1)
                         {
                           $currDt =date("Y-m-d H:i:s");

                           
                           $GetUpdateOffPack=DB::table('gym_payment_master')
                             ->where('cus_pay_id',$Id)
                             ->where('user_id',$usersId)
                             ->where('physical_att',0)
                             ->where('cancel_status',0)
                             ->where('pay_offline',0)
                             ->where('pay_result','SUCCESS')
                             ->where('status',1)
                             ->update(['physical_att' =>1,
                                       'physical_att_dt'=>$currDt,
                                         ]);

                             echo '2$#$Updated Successfully';
                             exit;


                         }
                         else
                         {
                          echo '1$#$Invalid request';
                          exit;
                         }


                         


 
                    }
                    elseif($hidonoffs==2)
                    {


                      $GetReportCnt = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.user_id',$usersId)
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$offlineDur.' DAY)'))
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '<=', DB::raw('NOW()'))
               ->where('gym_payment_master.cus_pay_id',$Id)
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.pay_offline',1)
               ->where('gym_payment_master.pay_result','SUCCESS')
               ->where('gym_payment_master.status',1)
               ->count(array('gym_payment_master.cus_pay_id'));

               if($GetReportCnt>0)
               {

                    $currDt=date("Y-m-d H:i:s");
                  $GetUpdateOffPack=DB::table('gym_payment_master')
                             ->where('cus_pay_id',$Id)
                             ->where('user_id',$usersId)
                             ->where('physical_att',0)
                             ->where('cancel_status',0)
                             ->where('pay_offline',1)
                             ->where('pay_result','SUCCESS')
                             ->where('status',1)
                             ->update(['physical_att' =>1,
                                       'physical_att_dt'=>$currDt,
                                         ]);

                             echo '2$#$Updated Successfully';
                             exit;


               }
               else
               {

                 echo '1$#$Invalid request';
                 exit;

               }

              

               /*
->orderBy(DB::raw('DATE(gym_payment_master.req_date)'),'desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id','gym_payment_master.physical_att'));


               */



                    }
                    else
                    {

                      echo '0$#$No data found'; 
                    }



                  }
                  else
                  {
                    echo '0$#$No data found';
                  }
               
            }
            else
            {
              echo '0$#$invalid opreation';
            }

         }
         public function OfflineEntryLists(Request $request)
         {

           if($request->has('mobile'))
           {
               $getDuration=DB::table('gym_refund_duration')->get(array('online','offline'));
               $onlineDur=$getDuration[0]->online; 
               $offlineDur=$getDuration[0]->offline;
               $startDt = Carbon::now()->subDays($offlineDur)->format('Y-m-d');
               $currDt = Carbon::now()->format('Y-m-d');
               $MNumber=$request['mobile'];
               $userId=$this->userId; 
               $GetReport = DB::table('gym_payment_master')
                                   ->whereBetween(DB::raw('DATE(req_date)'), array($startDt, $currDt))
                                   ->where('user_mobile',$MNumber)
                                   ->where('user_id',$userId)
                                   ->where('pay_offline',1)->orderBy('pay_result','asc')
                                   ->get(array('user_mobile' ,'user_id', 'user_email', 'trans_id', 'status', 'response', 'res_trans_id', 'res_ref_no','res_price', 'cat_id',  'cancel_status','request', 'req_date', 'price_id','price','pay_result', 'pay_offline','pak_name', 'pak_id','pack_desc', 'customer_name', 'cus_pay_id','cat_name','physical_att','physical_att_dt'));
           
               return view('admin.Gym.GymUpdateOfflinePay',compact('GetReport'));
             
   
           }
           else
           {
             return view('admin.Gym.GymOfflinePay');
           }
         

         }
         public function OfflineEntryListsSave(Request $request)
         {
                if($request->has('rwsId'))
                {
                     $rwsId=$request['rwsId'];
                     $userId=$this->userId; 
                     $GetPayCnt = DB::table('gym_payment_master')
                                   ->where('cus_pay_id',$rwsId)
                                   ->where('user_id',$userId)
                                   ->where('pay_offline',1) 
                                   ->where('status',0)
                                   ->count(array('cus_pay_id'));
                     
                 if($GetPayCnt==1)
                 {
                     $startDt = Carbon::now();
                     $GetUpdateOffPack=DB::table('gym_payment_master')
                                     ->where('cus_pay_id',$rwsId)
                                     ->where('user_id',$userId)
                                     ->where('pay_offline',1)
                                     ->where('status',0) 
                                     ->update(['status' =>1,
                                               'pay_result'=>'SUCCESS',
                                               'payed_offline_dt'=>$startDt,
                                                 ]);


                    $GetReportResult = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                             ->where('gym_payment_master.cancel_status',0)
                             ->where('pay_offline',1)
                             ->where('gym_payment_master.user_id',$userId)
                             ->where('gym_payment_master.cus_pay_id',$rwsId)
                             ->get(array('admins.email','gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id'));



                              $mailid=$GetReportResult[0]->user_email;
                              $adminEmail=$GetReportResult[0]->email;
                              $UName=$GetReportResult[0]->customer_name;
                              $res_price=$GetReportResult[0]->price; 
                              $pay_result=$GetReportResult[0]->pay_result;
                              $res_trans_id='---';//$GetReportResult[0]->res_trans_id;
                              $pak_name=$GetReportResult[0]->pak_name;
                              $cat_name=$GetReportResult[0]->cat_name;
                              $GymName=$GetReportResult[0]->name;
                              $payDt=$startDt;
                              $txnid=$GetReportResult[0]->trans_id; 
                              $user_mobile=$GetReportResult[0]->user_mobile;

                              $data = array('email'=>$mailid, 
                                     'first_name'=>$UName, 
                                     'from'=>'fitbeanzfitness@gmail.com',
                                     'res_price'=>$res_price,
                                     'pay_result'=>$pay_result,
                                     'res_trans_id'=>$res_trans_id,
                                     'pak_name'=>$pak_name,
                                     'cat_name'=>$cat_name,
                                     'GymName'=>$GymName,
                                     'transId'=>$txnid,
                                     'ModeofPay'=>'Pay at Gym',
                                     'payDt'=>$payDt,
                                     'user_mobile'=>$user_mobile,
                                     'Adminemail'=>$adminEmail
                                     ); 

                  Mail::send('admin.emails.paymentMail', $data, function($message) use ($data) {
                        $message->to($data['email'])->cc($data['Adminemail']); 
                        $message->replyTo($data['Adminemail'], $name = null); 
                        $message->subject('Alivefitnez Payment Details');
                        }); 
                       //               

                  echo 3;

                 }
                 else
                 {

                  echo 2;  //record mismatch try again
                 }


                                 


                }
                else
                {
                       echo 1;  //try again
                }
         }
         public function gymRefundCrl()
         {



       $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));
       $assKey='FYC7172O8WC3HZXOC2YZ';
       $secret_key=$PayKey[0]->secret_key;
       $merchantTxnId='dafadsgsdg';
       $pgTxnId='sdfgdfsg';
       $rrn='ffdgsf';
       $authIdCode='999999';
       $currencyCode='INR';
       $amount='1.00';
       $txnType='Refund';

       $data=$merchantTxnId.$orderAmount.$pgTxnId.$rrn.$authIdCode.$currencyCode.$amount.$txnType; 
              

      $securitySignature = hash_hmac('sha1', $data, $secret_key);




            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://admin.citruspay.com/api/v2/txn/refund");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\t\"merchantTxnId\":\"$merchantTxnId\",\n\t\"pgTxnId\":\"$pgTxnId\",\n\t\"rrn\":\"$rrn\",\n\t\"authIdCode\":\"$authIdCode\",\n\t\"currencyCode\":\"$currencyCode\",\n\t\"amount\":\"$amount\",\n\t\"txnType\":\"$txnType\"\n}");
            curl_setopt($ch, CURLOPT_POST, 1);

            $headers = array();
            $headers[] = "Content-Type: application/json";
            $headers[] = "Signature: $securitySignature";
            $headers[] = "Access_key: $assKey";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
              echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);

            echo "<pre>"; print_r($result);




//              $data='merchantAccessKey=FYC7172O8WC3HZXOC2YZ&transactionId=62194401&amount=1.0';
//              $secret_key=$PayKey[0]->secret_key; 
               
// echo $securitySignature = hash_hmac('sha1', $data, $secret_key);
// exit;
// // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, "https://splitpaysbox.citruspay.com/marketplace/trans/transrefund/");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n     \"trans_id\":2214,\n     \"refund_amount\":1,\n     \"refund_ref\":\"2206_PriceRefund\",\n     \"pg_refund_charge\":0,\n     \"refund_datetime\":\"2016-02-05 13:06:28\"\n    }");
// curl_setopt($ch, CURLOPT_POST, 1);

// $headers = array();
// $headers[] = "Content-Type: application/json";
// $headers[] = "Auth_token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2Nlc3Nfa2V5IjoiY2l0cnVzX21hcmtldHBsYWNlIiwiZXhwaXJlcyI6IjIwMTYtMDItMTBUMTQ6MjE6MzQuMjI1WiIsImNhbl90cmFuc2FjdCI6MSwiYWRtaW4iOjB9.mZ6azy8mvzcHnPgFjCcocBrvR6RFzJcp1aPbc6QU57c";
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// $result = curl_exec($ch);
// if (curl_errno($ch)) {
//     echo 'Error:' . curl_error($ch);
// }
// curl_close ($ch);
// print_r($result);


//    $curl = curl_init('http://google.com'); 
// curl_setopt($curl, CURLOPT_FAILONERROR, true); 
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   
// $result = curl_exec($curl); 
// echo $result; 

         }


}


