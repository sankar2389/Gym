<?php
 namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Gym_features;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response; 

 

class GymFeatures extends Controller
{
      // public $userId;
         public function __construct()
    	 {

             $this->uId=auth()->guard('admin')->user()->id;

            if($this->uId != 1)
            {  
                 return redirect('/admin/error')->send();
            }


         }
 

	public function Add_features()
	{
         
	return view('admin.GymFeatures.GymFeatadd');

	}
        public function save_features(Request $request)
        {   
            $input=Input::all();
            $feat_name=$input['feat_name']; 
            $table = new Gym_features();
            $ChkValue=$table->select('fe_id')->where([
			 	 ['features_name','=',$feat_name]])->count();
  
		if($ChkValue>0) 
		{
			echo 0;
			exit;
		}
		else
		{
			$table->features_name=$feat_name;
                        $table->user_id=$this->uId;
		 	$table->save();
			echo 1;
			exit;
		}    
     
         }
         public function fat_view_show()
         { 

        	$table = new Gym_features();
       	 	$GetFutValue=$table->select(array('fe_id','user_id','features_name','active'))->get() ; 
     		return view('admin.GymFeatures.GymFeatView',compact('GetFutValue'));
         

         }
          public function Act_reg_edit(Request $request)
        {
 
            $input=Input::all();
	    $Ids=$input['ids'];
            $table = new Gym_features();
            
            $GetActDeac=$table->select(array('active'))->where('fe_id',"$Ids")
                                              ->get(); 
              
                $UpVals=1;
		if($GetActDeac[0]->active==1) 
                {
                $UpVals=0;
		}
                $table->where('fe_id',"$Ids")->update(array('active' => $UpVals));
                
                echo $UpVals;
 
        }
        public function fat_view_edit(Request $request)
        {

		$input=Input::all();
		$Ids=$input['ids'];
		$table = new Gym_features();
		$GetActDeac=$table->select(array('features_name'))->where('fe_id',"$Ids")->get();
		echo $GetActDeac[0]['features_name']; 
     
        }
        public function fat_view_save(Request $request)
        {
     
                $input=Input::all();
		$Ids=$input['ids'];
                $cat_name=$input['Feat_name'];  
		$table = new Gym_features();
                $ChkValue=$table->select('fe_id')->where([
			 	 ['features_name','=',$cat_name]])->where('fe_id', '!=', "$Ids")->count();
               $returnVal=0;
               if($ChkValue==0)
               {
                $table->where('fe_id',"$Ids")->update(array('features_name' => $cat_name));
                $returnVal=$cat_name;
               }

               echo $returnVal; 
 
             


        }
  

 
      
  
}


