<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Gym_profile;
use App\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response;
use Auth;
use Hash;
  
class GymProfile extends Controller
{
         public $userId;
         public function __construct()
    	 {

            $this->userId=auth()->guard('admin')->user()->id;
  
            if($this->userId ==1)
            {  
                 return redirect('/admin/error')->send();
            }


         }

	public function Add_profile()
	{
          $table = new Gym_profile();
          $GymName = DB::table('admins')
                     ->select(DB::raw('name'))->where('id', '=', $this->userId)->get();
 
 

         //$ChkValue=$table->select('pro_id')->where([
			 	// ['user_id','=',$this->userId]])->count()  ;
         //if($ChkValue==1)
         //{


          $getValue=$table->select(array('pro_id','user_id','gym_name','area_location','pincode','address1','address2','land_mark','phone','cell_no','img_path','active')
)->where([['user_id','=',$this->userId]])->get() ;

//print_r($getValue);

        // } 
 

	 
        return view('admin.Gym.GymProfadd',compact('getValue','GymName'));

	}
        public function Save_profile(Request $request)
        {
             $input=Input::all();
             $table = new Gym_profile();
             $ChkValue=$table->select('pro_id')->where([
			 	 ['user_id','=',$this->userId]])->count() ; 
             
          $Gym_name=$input['Gym_name'];
          $pin=$input['pin'];
          $location=$input['location'];
          $add1=$input['add1'];
          $mobile=$input['mobile'];
          $landmark=$input['landmark'];
 
            if($ChkValue==0)
            {
              $table->user_id=$this->userId;
              //$table->gym_name=$Gym_name;
              $table->area_location=$location;
              $table->pincode=$pin;
              $table->address1=$add1;
              $table->cell_no=$mobile;
              $table->land_mark=$landmark;
              $table->save();
              echo 0;
 
            }
            else
            {
            
               $table->where('user_id',$this->userId)->update(array("area_location"=>"$location","pincode"=>"$pin","address1"=>"$add1","land_mark"=>"$landmark","cell_no"=>"$mobile" )); 
              echo 1;
            }
 

            

             
 
        }

 public function change_pass()
 {

return view('admin.Gym.GymChangePass');


 }
public function update_Pass(Request $request)
{
   $input=Input::all();
   $curPass=$input['curPass'];
   $newPass=$input['password'];
   $newPass = Hash::make($input['password']);
   /*  $table = new Admin();
 $ChkValue=$table->select('id')->where([
			 	 ['email','=',$this->userId],['password','=',bcrypt($curPass) ]])->get() ; 

print_r(bcrypt($curPass)); */
$guard='admin';

 if (Auth::guard($guard)->check()) {
           $admin_user_details = Auth::guard($guard)->user();
           $current_password = $admin_user_details->password;
   }
   else
   {

    echo 0;
    exit;  

    }
    if(password_verify($curPass, $current_password)) {
     
          $table = new Admin() ;
          $table->where('id',"$this->userId")->update(array('password' => $newPass));
          echo 2;
          exit;       
           
        } else {
               echo  1;
               exit;  
           }

//echo $current_password.'   '.$old_password;

}

       /* public function Save_cat(Request $request)
        {  
            $input=Input::all();
            $catName=$input['cat_name'];
            $table = new Gym_category();

            $ChkValue=$table->select('cat_id')->where([
			 	 ['cat_name','=',$catName]])->count() ; 
		if($ChkValue>0) 
		{

			echo 0;
			exit;
		}
		else
		{

			$table->cat_name=$catName;
		 	$table->save();
			echo 1;
			exit;
		}    
 
 
        }
        public function View_cat()
        {
        
          $table = new Gym_category();
          $GetCatValue=$table->select(array('cat_id','cat_name','active'))->get() ; 
          return view('admin.Gym.GymCatView',compact('GetCatValue'));
 
          
        }
        public function Act_reg_edit(Request $request)
        {
 
            $input=Input::all();
	    $Ids=$input['ids'];
            $table = new Gym_category();
            
            $GetActDeac=$table->select(array('active'))->where('cat_id',"$Ids")
                                              ->get(); 
              
                $UpVals=1;
		if($GetActDeac[0]->active==1) 
                {
                $UpVals=0;
		}
                $table->where('cat_id',"$Ids")->update(array('active' => $UpVals));
                
                echo $UpVals;
 
        } 
        public function cat_view_edit(Request $request)
        {use Auth;

		$input=Input::all();
		$Ids=$input['ids'];
		$table = new Gym_category();
		$GetActDeac=$table->select(array('cat_name'))->where('cat_id',"$Ids")->get();
		echo $GetActDeac[0]['cat_name'];
     
        } 
        public function cat_view_update(Request $request)
        {
     
                $input=Input::all();
		$Ids=$input['ids'];
                $cat_name=$input['cat_name'];  
		$table = new Gym_category();
                $ChkValue=$table->select('cat_id')->where([
			 	 ['cat_name','=',$cat_name]])->where('cat_id', '!=', "$Ids")->count();
               $returnVal=0;
               if($ChkValue==0)
               {
                $table->where('cat_id',"$Ids")->update(array('cat_name' => $cat_name));
                $returnVal=$cat_name;
               }

               echo $returnVal;
 
              


        }
 
  */
	

  
}


