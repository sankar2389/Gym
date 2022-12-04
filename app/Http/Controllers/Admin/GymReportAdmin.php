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
  
class GymReportAdmin extends Controller
{
         protected $userId;
         public function __construct()
    	 {

            $this->userId=auth()->guard('admin')->user()->id;
             if($this->userId !=1)
            {  
                  return redirect('/admin/error')->send();
            }
         }
         public function view_pay_report()
         {
          
             
           $getUserList=DB::table('admins')->whereNotIn('id',[1])->get(array('id','name'));
           return view('admin.GymReport.GymReportAdmin',compact('getUserList'));
 	   
         }
         public function view_pay_report_list(Request $request)
         { 

              if($request->has('fdate') && $request->has('fdate') && $request->has('Seluser') )
              {

               $frmDt = date('Y-m-d', strtotime($request->input('fdate'))); 
               $toDt = date('Y-m-d', strtotime($request->input('todate'))); 
               $User = $request->input('Seluser');
               $optMode = $request->input('Selopt');

            if($optMode==1)
            {
               $pay_result='SUCCESS';
               $status=1;

               $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', $frmDt)
               ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', $toDt)
               ->where('gym_payment_master.user_id',$User)
               ->where('gym_payment_master.status',$status)
               ->where('gym_payment_master.pay_result',$pay_result)
               ->where('gym_payment_master.cancel_status',0)->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline'));
                 return view('admin.GymReport.GymReportView',compact('GetReport'));

            }
            elseif($optMode==2) //cancel by user
            {
               $pay_result='CANCELED';
               $status=1;

               $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', $frmDt)
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', $toDt)
                 ->where('gym_payment_master.user_id',$User)
                 ->where('gym_payment_master.status',$status)
                 ->where('gym_payment_master.pay_result',$pay_result)
                 ->where('gym_payment_master.cancel_status',0)->orderBy('gym_payment_master.req_date','DESC')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline'));
               return view('admin.GymReport.GymReportView',compact('GetReport'));
            }
            elseif($optMode==3) //Attempt all Attempt and success and cancel 
            {
               $pay_result="";
               
               $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', $frmDt)
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', $toDt)
                 ->where('gym_payment_master.user_id',$User)
                 ->orderBy('gym_payment_master.req_date','DESC')
                 ->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline'));
               return view('admin.GymReport.GymReportView',compact('GetReport'));
            }
            elseif($optMode==4) //offline both success and unsuccess
            {
               $pay_result="";
               $pay_offline=1;
               $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', $frmDt)
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', $toDt)
                 ->where('gym_payment_master.user_id',$User)
                 ->where('gym_payment_master.pay_offline',$pay_offline)->where('gym_payment_master.cancel_status',0)->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline'));
               return view('admin.GymReport.GymReportView',compact('GetReport'));
            }
            elseif($optMode==5) //refund both online and offline
            {

              $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '>=', $frmDt)
                 ->where(DB::raw('DATE(gym_payment_master.req_date)'), '<=', $toDt)
                 ->where('gym_payment_master.user_id',$User)
                 ->where('gym_payment_master.cancel_status',1)
                 ->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline'));
               return view('admin.GymReport.GymReportView',compact('GetReport'));
                 //echo "<pre>";print_r($GetReport);

            }
            else
            {

              $getUserList=DB::table('admins')->whereNotIn('id',[1])->get(array('id','name'));
           
              return view('admin.GymReport.GymReport',compact('getUserList'));

            }
 
           }
           else
           {


             if($this->userId ==1)
            {
               $getUserList=DB::table('admins')->whereNotIn('id',[1])->get(array('id','name'));
            }
            else
            {
               $getUserList=DB::table('admins')->where('id',$this->userId)->get(array('id','name'));
            }
            
           
           return view('admin.GymReport.GymReport',compact('getUserList'));

           }

 

            

   }  
  
}


