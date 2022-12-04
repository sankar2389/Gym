<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Product_item;
//use App\Product;
//use App\Product_image;
//use App\Model\Category;
//use App\Model\Diet_Master;
 //use App\Model\BasketUnitMaster;
// use App\Model\BasketTypeMaster;
//use App\Model\Gym_category;
//use App\Subcategory;
//use App\Admin;
use App\Model\GymWrkhourModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response;

class GymWrkhour extends Controller
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
 

	public function Add_wrhadd()
	{
        
         
	return view('admin.GymWrkHour.GymWrhadd');

	}
        public function save_wrkhout(Request $request)
        {     
             $input=Input::all();
             $table = new GymWrkhourModel();
       
             	$Selwhft=$input['Selwhft']; 
 		$Selwhtt=$input['Selwhtt']; 
 		$SelphMft=$input['SelphMft']; 
 		$SelphMtt=$input['SelphMtt']; 
 		$SelphEft=$input['SelphEft']; 
 		$SelphEtt=$input['SelphEtt']; 
             
             $ChkValue=$table->select('wrk_hr_id')->where('user_id', '=', $this->userId)->count();
             if($ChkValue==0)
             {
                 $table->user_id=$this->userId;
		 $table->wrk_frm_hr=$Selwhft;
		 $table->wrk_to_hr=$Selwhtt;
		 $table->peak_m_frm_hr=$SelphMft;
		 $table->peak_m_to_hr=$SelphMtt;
		 $table->peak_e_frm_hr=$SelphEft;
		 $table->peak_e_to_hr=$SelphEtt;
                 $table->save();
		 echo 0;
		 exit; 
		   

             }
             else
             {
                 $table->where('user_id',$this->userId)->update(array(
		                                                'wrk_frm_hr' => $Selwhft,
		                                                'wrk_to_hr'=> $Selwhtt,
		                                                'peak_m_frm_hr'=> $SelphMft,
								'peak_m_to_hr'=> $SelphMtt,
								'peak_e_frm_hr'=>$SelphEft, 
								'peak_e_to_hr'=>$SelphEtt 
								 
                                                             ));
                 echo 1;
		 exit;  

             }      
             
        }
        public function view_wrkhour()
        {

$table = new GymWrkhourModel();
        $getTimeValue=$table->select(array('wrk_hr_id','wrk_frm_hr','wrk_to_hr','peak_m_frm_hr','peak_m_to_hr','peak_e_frm_hr','peak_e_to_hr'))->where('user_id', '=', $this->userId)->get();
 
 
         
	return view('admin.GymWrkHour.GymWrhView',compact('getTimeValue'));

       }
     
        /*public function save_features(Request $request)
        {   
            $input=Input::all();
            $feat_name=$input['feat_name']; 
            $table = new Gym_features();
            $ChkValue=$table->select('fe_id')->where([
			 	 ['features_name','=',$feat_name]])->where('user_id', '=', $this->userId)->count();
  
		if($ChkValue>0) 
		{
			echo 0;
			exit;
		}
		else
		{
			$table->features_name=$feat_name;
                        $table->user_id=$this->userId;
		 	$table->save();
			echo 1;
			exit;
		}    
     
         } */
       /* public function View_cat()
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
        {

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
 
               //print_r($ChkValue); 


        }
 
      */
	

  
}


