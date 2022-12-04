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

  
class GymPayRefund extends Controller
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

        public function RefundLists()
        {

          return view('admin.GymRefund.GymRefundView');
          
        }
        public function RefundListEntryLists(Request $request)
        {

           if($request->has('mobile') && $request->has('Selmode'))
           {

             $mobiles=$request['mobile'];
             $Selmodes=$request['Selmode'];
             $getDuration=DB::table('gym_refund_duration')->get(array('online','offline'));
             $onlineDur=$getDuration[0]->online; 
             $offlineDur=$getDuration[0]->offline;
             $usersId=$this->userId ;
             

             if($Selmodes==1) //online
             {

              $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.user_id',$usersId)
               ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$onlineDur.' DAY)'))
               ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', DB::raw('NOW()'))
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.pay_offline',0)
               ->where('gym_payment_master.pay_result','SUCCESS')
               ->where('gym_payment_master.status',1)
               ->orderBy(DB::raw('DATE(gym_payment_master.req_date)'),'desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id'));

             }
             elseif($Selmodes==2) //ofline
             {

                 $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.user_id',$usersId)
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$offlineDur.' DAY)'))
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '<=', DB::raw('NOW()'))
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.pay_offline',1)
               ->where('gym_payment_master.pay_result','SUCCESS')
               ->where('gym_payment_master.status',1)
               ->orderBy(DB::raw('DATE(gym_payment_master.payed_offline_dt)'),'desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id'));

             }


             return view('admin.GymRefund.GymRefundCancel',compact('GetReport','Selmodes'))  ;   

                
           }
           else
           {
               return view('admin.GymRefund.GymRefundView');
           }
        }

        public function RefundResults(Request $request)
        {
             if($request->has('ids') && $request->has('Selmode'))
             {

                $iD=$request['ids'];
                $modeId=$request['Selmode'];
                $getDuration=DB::table('gym_refund_duration')->get(array('online','offline'));
                $onlineDur=$getDuration[0]->online; 
                $offlineDur=$getDuration[0]->offline;
                $usersId=$this->userId ;
                if($modeId==1) //online
                {

                 $GetReportCnt = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                 ->where('gym_payment_master.user_id',$usersId)
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$onlineDur.' DAY)'))
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', DB::raw('NOW()'))
                 ->where('gym_payment_master.cus_pay_id',$iD)
                 ->where('gym_payment_master.cancel_status',0)
                 ->where('gym_payment_master.pay_offline',0)
                 ->where('gym_payment_master.pay_result','SUCCESS')
                 ->where('gym_payment_master.status',1)
                 ->count(array('gym_payment_master.cus_pay_id'));
                 if($GetReportCnt==1)
                 {

                     $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.user_id',$usersId)
               ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$onlineDur.' DAY)'))
               ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', DB::raw('NOW()'))
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.cus_pay_id',$iD)
               ->where('gym_payment_master.pay_offline',0)
               ->where('gym_payment_master.pay_result','SUCCESS')
               ->where('gym_payment_master.status',1)
               ->orderBy(DB::raw('DATE(gym_payment_master.req_date)'),'desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id'));

                

                /*******Citrus Refund start*********/

                 $PayKey=DB::table('gym_payment_key')->get(array('assKey','secret_key','vanityUrl','currency','postUrl'));
                 $assKey=$PayKey[0]->assKey;;
                 $secret_key=$PayKey[0]->secret_key;
                 $merchantTxnId=$GetReport[0]->trans_id;//'58de1f453eeea1490952005';
                 $pgTxnId=$GetReport[0]->res_trans_id;//'1000000003885948';
                 $rrn=$GetReport[0]->res_ref_no;//'031324';
                 $authIdCode=$GetReport[0]->res_auth_id;//'120323';
                 $currencyCode='INR';
                 $amount=$GetReport[0]->price.'.00';//'1.00';
                 $txnType='Refund';
   
                 $data="merchantAccessKey=" .$assKey. "&transactionId=" .$merchantTxnId. "&amount=" .$amount; 
     
                 $securitySignature = hash_hmac('sha1', $data, $secret_key);

                 $ch = curl_init();
                  $PassFields='{
                    "merchantTxnId":"'.$merchantTxnId.'",
                    "pgTxnId":"'.$pgTxnId.'",
                    "rrn":"'.$rrn.'",
                    "authIdCode":"'.$authIdCode.'",
                    "currencyCode":"INR",
                    "amount":"'.$amount.'",
                    "txnType":"Refund"
                   }';
              
             $headers = array();
             $headers[] = "Content-Type: application/json";
             $headers[] = "Signature: $securitySignature";
             $headers[] = "Access_key: $assKey";
  
              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);     
              curl_setopt($ch, CURLOPT_URL, "https://admin.citruspay.com/api/v2/txn/refund");
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

             curl_setopt($ch, CURLOPT_POSTFIELDS, $PassFields);
             curl_setopt($ch, CURLOPT_POST, true);
              $result = curl_exec($ch);
              if (curl_errno($ch)) {
                echo '0#$#Error:' . curl_error($ch);
              }
              curl_close ($ch);
              $xml = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
              $json = json_encode($xml);
              $Resultarray = json_decode($json,TRUE);

              if(count($Resultarray)>0)
              {

                if(isset($Resultarray['respMsg']) )
                {
                    if($Resultarray['respMsg']=='Transaction successful')
                    {

                      if(isset($Resultarray['merchantRefundTxId']) && isset($Resultarray['transactionId']) && isset($Resultarray['amount']))
                      {
                         $transactionIds=$Resultarray['transactionId'];
                         $respMsgs=$Resultarray['respMsg'];
                         $merchantRefundTxIds=$Resultarray['merchantRefundTxId'];
                         $Res_refundAmt=$Resultarray['amount'];
                         $curDT=date("Y-m-d H:i:s");

                         $GetUpdateTrackId=DB::table('gym_payment_master')
                            ->where('gym_payment_master.cus_pay_id',$iD)
                            ->where('gym_payment_master.user_id',$usersId)
                            ->update(['cancel_status'=>1,'cancel_res_status'=>$respMsgs,'cancel_res_transactionId'=>$transactionIds,'cancel_res_merchantRefundTxId'=>$merchantRefundTxIds,'cancel_res_date'=>$curDT,'cancel_res_amount'=>$Res_refundAmt ]);


                       $GetReportResult = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                             ->where('admins.email','gym_payment_master.cancel_status',1)
                             ->where('gym_payment_master.user_id',$usersId)
                             ->where('gym_payment_master.cus_pay_id',$iD)
                             ->get(array('admin.email','gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id'));

                              $mailid=$GetReportResult[0]->user_email;
                              $adminEmail=$GetReportResult[0]->email;
                              $UName=$GetReportResult[0]->customer_name;
                              $res_price=$GetReportResult[0]->price.'.00';
                              $pay_result=$respMsgs;
                              $res_trans_id=$merchantRefundTxIds;
                              $pak_name=$GetReportResult[0]->pak_name;
                              $cat_name=$GetReportResult[0]->cat_name;
                              $GymName=$GetReportResult[0]->name;
                              $payDt=date('d-m-Y', strtotime($curDT));
                              $txnid=$GetReportResult[0]->trans_id;
                              $user_mobile=$GetReportResult[0]->user_mobile;



                            /* mail function start */
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
                       'Adminemail'=>$adminEmail
                       );
 
                      Mail::send('admin.emails.refundMail', $data, function($message) use ($data) {
                       $message->to($data['email'])->cc($data['Adminemail']);
                       $message->replyTo($data['Adminemail'], $name = null);  
                       $message->subject('Alivefitnez Refund Details');
                      }); 


  

                            /* mail function end  */



                            echo "1#$#successfully refunded";


                      }



                    }
                    else
                    {
                       echo "0#$#".$Resultarray['respMsg']; 
                    }


                   
                }
                else
                {

                  echo "0#$#Plese try again"; 
                }
  
              }
              else
              {
                 echo "0#$#Invalid transaction try again";

              }
  
            

               /*******Citrus Refund End*********/

               

                 } 
                 else
                 {
                   echo "0#$#No data found";
                 }


                 

                }elseif($modeId==2) //offline
                {

                  $GetReportCnt = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.user_id',$usersId)
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL '.$offlineDur.' DAY)'))
               ->where(DB::raw('DATE(gym_payment_master.payed_offline_dt)'), '<=', DB::raw('NOW()'))
               ->where('gym_payment_master.cus_pay_id',$iD)
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.pay_offline',1)
               ->where('gym_payment_master.pay_result','SUCCESS')
               ->where('gym_payment_master.status',1)
               ->count(array('gym_payment_master.cus_pay_id'));

               if($GetReportCnt==1)
               {

                    $curDT=date("Y-m-d H:i:s");
                  $GetUpdateTrackId=DB::table('gym_payment_master')
                      ->where('gym_payment_master.cus_pay_id',$iD)
                      ->where('gym_payment_master.user_id',$usersId)
                      ->update(['cancel_status' =>1,'cancel_res_status'=>'SUCCESS','cancel_res_date'=>$curDT ]);

                  /**  mail start **/


                  $GetReportResult = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                             ->where('gym_payment_master.cancel_status',1)
                             ->where('gym_payment_master.user_id',$usersId)
                             ->where('gym_payment_master.cus_pay_id',$iD)
                             ->get(array('admins.email','gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id'));

                              $mailid=$GetReportResult[0]->user_email;
                              $adminEmail=$GetReportResult[0]->email;
                              $UName=$GetReportResult[0]->customer_name;
                              $res_price=$GetReportResult[0]->price.'.00';
                              $pay_result='Refund Transaction successful';
                              $res_trans_id='---';
                              $pak_name=$GetReportResult[0]->pak_name;
                              $cat_name=$GetReportResult[0]->cat_name;
                              $GymName=$GetReportResult[0]->name;
                              $payDt=date('d-m-Y', strtotime($curDT));
                              $txnid=$GetReportResult[0]->trans_id;
                              $user_mobile=$GetReportResult[0]->user_mobile;



                            /* mail function start */
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
                       'ModeofPay'=>'Pay at Gym(offline)',
                       'payDt'=>$payDt,
                       'user_mobile'=>$user_mobile,
                       'Adminemail'=>$adminEmail

                       );

                             Mail::send('admin.emails.refundMail', $data, function($message) use ($data) {
                       $message->to($data['email'])->cc($data['Adminemail']);
                       $message->replyTo($data['Adminemail'], $name = null);  
                       $message->subject('Alivefitnez Refund Details');
                      }); 


                  /**   mail end   **/           


                   echo "1#$#successfully refunded";




               }
               else
               {

                   echo "0#$#No data found";
               }

              

                }
                else
                {
                     echo "0#$#Invalid mode";

                }
                 
             }
             else
             {

              echo "0#$#Invalid request";
             }
                 
        }

        
       
      

       public function gymRefundCrlold() //ok
       {

  
       //PG refund-start https://developers.citruspay.com/doc/integrations/     
       $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));
       $assKey='FYC7172O8WC3HZXOC2YZ';
       $secret_key=$PayKey[0]->secret_key;
       $merchantTxnId='58de1f453eeea1490952005';
       $pgTxnId='1000000003885948';
       $rrn='031324';
       $authIdCode='120323';
       $currencyCode='INR';
       $amount='1.00';
       $txnType='Refund';

        //$data="merchantAccessKey=".$assKey."&transactionId=".$pgTxnId."&amount=".$amount;


       //$data=$assKey.$pgTxnId.$amount;

        //$data=$merchantTxnId.$pgTxnId.$rrn.$authIdCode.$currencyCode.$amount.$txnType;

        $data="merchantAccessKey=" .$assKey. "&transactionId=" .$merchantTxnId. "&amount=" .$amount; 

       
         $securitySignature = hash_hmac('sha1', $data, $secret_key);


       $ch = curl_init();
         $PassFields='{

        "merchantTxnId":"58de1f453eeea149095200511111111111",
        "pgTxnId":"1000000003885948",
        "rrn":"031324",
        "authIdCode":"120323",
         "currencyCode":"INR",
         "amount":"1.00",
         "txnType":"Refund"


       }';
             //   application/x-www-form-urlencoded 

             $headers = array();
            $headers[] = "Content-Type: application/json";
            $headers[] = "Signature: $securitySignature";
            $headers[] = "Access_key: $assKey";

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);     
            curl_setopt($ch, CURLOPT_URL, "https://admin.citruspay.com/api/v2/txn/refund");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

             curl_setopt($ch, CURLOPT_POSTFIELDS, $PassFields);

             //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            curl_setopt($ch, CURLOPT_POST, true);

            // $headers = array();
            // $headers[] = "Content-Type: application/json";
            // $headers[] = "Signature: $securitySignature";
            // $headers[] = "Access_key: $assKey";

            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
              echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);
  

            $xml = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
             //echo "<pre>";print_r($array);

      

         }

         



}


