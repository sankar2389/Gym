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
use App\Model\Gym_category;
//use App\Subcategory;
//use App\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response;

class GymCategory extends Controller
{
       public $userId;
         public function __construct()
    	 {

            $this->userId=auth()->guard('admin')->user()->id;
  
            if($this->userId !=1)
            {  
                 return redirect('/admin/error')->send();
            }


         }
 

	public function Add_cat()
	{
         
	return view('admin.Gym.GymCatadd');

	}
        public function Save_cat(Request $request)
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
 

	

  
}


