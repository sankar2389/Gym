<?php

namespace App\Http\Controllers\Adminauth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

use Auth;
use Carbon;
use DB;
use Mail;
class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin/home';
	protected $guard = 'admin';
	
	public function showLoginForm()
	{
		if (Auth::guard('admin')->check())
		{
			return redirect('/admin/home');
		}
		
		 return view('admin.auth.login');
	}

	public function resetpass()
	{
		return view('admin.auth.reset');

	}
	public function resetpassAjx(Request $request)
	{

	    $inputs=$request->all();
        $email=$inputs['email'];
        $chkAdminEmailExist=DB::table('admins')->where('email',$email)->count();
       if($chkAdminEmailExist>0)
       {

			$chkAdminEmailId=DB::table('admins')->where('email',$email)->get();

			$userId=$chkAdminEmailId[0]->id;
			$randomPass=str_random(17);
			$reset_keys=$randomPass;//bcrypt($randomPass); 

			$updateTbl=DB::table('admins')->where('id', $userId)->update(['reset_key'=>$reset_keys,
			'reset_pass_type'=>'yes']);


			$data = array('link_key'=>$reset_keys,'useremailid'=>$email); 

			Mail::send('admin.emails.resetpassword', $data, function($message) use ($data) {
			$message->to($data['useremailid']); 
		 	$message->subject('Alivefitnez Admin Reset Password');
			}); 
			echo 2;

       }
       else
       {
       	echo 0;
       }
}

	public function recpass($id=null)
	{


		$keyId=$id;

		$chkAdminEmailId=DB::table('admins')->where(['reset_key'=>$keyId,'reset_pass_type'=>'yes'])->count();

		if($chkAdminEmailId>0)
		{
           return view('admin.auth.resetChangePass',compact('keyId'));

		}
		else
		{
			 return view('admin.auth.resetChangePass',compact('keyId'));
		}

		//echo $chkAdminEmailId;
 
		
	}
	public function chgpassAjx(Request $request)
	{

       $inputs=$request->all();
       $hidKey=trim($inputs['hidKey']);
       $npass=trim($inputs['npass']);

       if($hidKey !="" && $npass !="" && strlen($npass)>=8 )
       {

	        $chkAdminEmailId=DB::table('admins')->where(['reset_key'=>$hidKey,'reset_pass_type'=>'yes'])->count();
	       
	        if($chkAdminEmailId>0)
	        {

	        	 $chkAdminEmailId=DB::table('admins')->where(['reset_key'=>$hidKey,'reset_pass_type'=>'yes'])->get();
	        	$id=$chkAdminEmailId[0]->id;
	        	$updatePass=bcrypt($npass);
	        $updatePass=DB::table('admins')->where('id',$id)->update(['password'=>$updatePass,'reset_pass_type'=>'no']);
	        echo 3;

               
              

  
	        }
	        else
	        {
	        	echo 1;
	        }

       }
       else{

       	echo 0;
       }
 
	}

	
	
	public function showRegistrationForm()
	{
		return view('admin.auth.register');
	}
	
	public function resetPassword()
	{
		return view('admin.auth.passwords.email');
	}
	
	public function logout(){
		Auth::guard('admin')->logout();
		return redirect('/admin/login');
	}
	public function home()
	{ 
		    date_default_timezone_set('Asia/Kolkata');
		    $GetReportPrice='' ; 
		    $getWKOrdersCnt =''; 
		    $getWKRevenueCnt='' ; 
		    $getTotOfflineReq='';
			$first_day_of_the_week = 'Sunday';
			$start_of_the_week     = strtotime("Last $first_day_of_the_week");
			if ( strtolower(date('l')) === strtolower($first_day_of_the_week) )
			{
			   $start_of_the_week = strtotime('today');
			}
			   $end_of_the_week = $start_of_the_week + (60 * 60 * 24 * 7) - 1;
			 
			$date_format =  'Y-m-d';
	 		$frmDt=date($date_format, $start_of_the_week); //'2016-01-01';//
			$toDt=date($date_format, $end_of_the_week); //'2017-04-04'; 
		    if(auth()->guard('admin')->user()->id==1)
		    {
               
                $getWKRevenueCnt=DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',1)->where('gym_payment_master.cancel_status',0)->where('gym_payment_master.pay_result','SUCCESS')->count(array('gym_payment_master.cus_pay_id'));

$showRecentSuccessList=DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',1)->where('gym_payment_master.cancel_status',0)->where('gym_payment_master.pay_result','SUCCESS')->get();

                if($getWKRevenueCnt>0)
                {

                    $GetReportPrice = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',1)->where('gym_payment_master.cancel_status',0)->where('gym_payment_master.pay_result','SUCCESS')->sum('gym_payment_master.price');
                }
                else
                {
                	$GetReportPrice=0;
                }

                $getWKOrdersCnt=DB::table('admins')->whereNotIn('id',[1])->where(DB::raw('DATE(created_at)'),'>=',$frmDt)->where(DB::raw('DATE(created_at)'),'<=',$toDt)->count(array('id'));

                $getTotOfflineReq=DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',0)->where('gym_payment_master.pay_offline',1)->count(array('gym_payment_master.cus_pay_id'));
                 

                
                
		    	 return view('admin.home',compact('GetReportPrice','getWKOrdersCnt','getWKRevenueCnt','getTotOfflineReq','showRecentSuccessList')); 

 

		    }
		    else 
		    {

            $getWKRevenueCnt=DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where('gym_payment_master.user_id','=',auth()->guard('admin')->user()->id)->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',1)->where('gym_payment_master.cancel_status',0)->where('gym_payment_master.pay_result','SUCCESS')->count(array('gym_payment_master.cus_pay_id'));

$showRecentSuccessList=DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where('gym_payment_master.user_id','=',auth()->guard('admin')->user()->id)->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',1)->where('gym_payment_master.cancel_status',0)->where('gym_payment_master.pay_result','SUCCESS')->get();

            if($getWKRevenueCnt>0)
                {

                    $GetReportPrice = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where('gym_payment_master.user_id','=',auth()->guard('admin')->user()->id)->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',1)->where('gym_payment_master.cancel_status',0)->where('gym_payment_master.pay_result','SUCCESS')->sum('gym_payment_master.price');
                }
                else
                {
                	$GetReportPrice=0;
                }

                $getTotOfflineReq=DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where('gym_payment_master.user_id','=',auth()->guard('admin')->user()->id)->where(DB::raw('DATE(gym_payment_master.req_date)'),'>=',$frmDt)
            ->where(DB::raw('DATE(gym_payment_master.req_date)'),'<=',$toDt)->where('gym_payment_master.status',0)->where('gym_payment_master.pay_offline',1)->count(array('gym_payment_master.cus_pay_id'));


return view('admin.home',compact('GetReportPrice','getWKOrdersCnt','getWKRevenueCnt','getTotOfflineReq','showRecentSuccessList')); 

		    } 

			
		    
	}
}

