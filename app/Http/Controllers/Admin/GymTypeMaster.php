<?php
 namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\GymType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response; 

 

class GymTypeMaster extends Controller
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
 

	public function Add_type()
	{
         
	return view('admin.GymType.GymTypeAdd');

	}
        public function save_type(Request $request)
        {   
             $input=Input::all();
             $type_name=$input['type_name']; 
             $table = new GymType();
             $ChkValue=$table->select('type_id')->where([
			 	 ['type_name','=',$type_name]])->count();
 
		if($ChkValue>0) 
		{
			echo 0;
			exit;
                }
		else
		{
			$table->type_name=$type_name;
                        $table->user_id=$this->uId;
		 	$table->save();
			echo 1;
			exit;
		}    
          
         }
         public function type_view_show()
         { 

        	$table = new GymType();
       	 	$GetTypeValue=$table->select(array('type_id','user_id','type_name','active'))->get() ; 
     		return view('admin.GymType.GymTypeView',compact('GetTypeValue'));
         

         }
          public function Act_type_edit(Request $request)
        {
 
            $input=Input::all();
	    $Ids=$input['ids'];
            $table = new GymType();
            
            $GetActDeac=$table->select(array('active'))->where('type_id',"$Ids")
                                              ->get(); 
              
                $UpVals=1;
		if($GetActDeac[0]->active==1) 
                {
                $UpVals=0;
		}
                $table->where('type_id',"$Ids")->update(array('active' => $UpVals));
                
                echo $UpVals;
 
        }
        public function type_view_edit(Request $request)
        {

		$input=Input::all();
		$Ids=$input['ids'];
		$table = new GymType();
		$GetActDeac=$table->select(array('type_name'))->where('type_id',"$Ids")->get();
		echo $GetActDeac[0]['type_name']; 
     
        }
        public function type_view_save(Request $request)
        {
     
                $input=Input::all();
		$Ids=$input['ids'];
                $cat_name=$input['type_name'];  
		$table = new GymType();
                $ChkValue=$table->select('type_id')->where([
			 	 ['type_name','=',$cat_name]])->where('type_id', '!=', "$Ids")->count();
               $returnVal=0;
               if($ChkValue==0)
               {
                $table->where('type_id',"$Ids")->update(array('type_name' => $cat_name));
                $returnVal=$cat_name;
               }

               echo $returnVal; 
 
             


        }
  

 
      
  
}


