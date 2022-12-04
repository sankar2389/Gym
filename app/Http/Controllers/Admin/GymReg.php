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
 use App\Model\GymTypeMapping;
use App\Model\Gym_features;
//use App\Subcategory;
use App\Admin;
use App\Model\GymType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response;
 use Mail;
use Hash;

class GymReg extends Controller
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
 
  
	public function Add_reg()
	{
         	$tableType = new GymType();
       
        	$GetType=$tableType->select(array('type_id','type_name'))->where('active',['1'])->get();
 
                $CategoryType = DB::table('gym_category_master')
                     ->select(DB::raw('cat_id, cat_name,active'))->where('active', '=', 1)->get(); 

                $Getfeatures=DB::table('gym_features')
                     ->select(DB::raw('fe_id, features_name,active'))->where('active', '=', 1)->get(); 
 
                    
                    
            
                                        
       
	return view('admin.Gym.Gymadd',compact('GetType','CategoryType','Getfeatures'));

	}

	public function Save_reg(Request $request) //Ajax request
	{


           $password=str_random(8); 
	   $input=Input::all();
	   $mailid=$input['mailid'];
           $table = new Admin();
	   $ChkValue=$table->select('id')->where([
				 ['email','=',$mailid],                              
		         ])->count();    
	  if($ChkValue>0) 
	  {
	       	       
	    echo 0;
	    exit;
	  }
	  else
	  {
	     
	    $table->name=$input['Gym_name'];
	    $table->email=$mailid;
            $randomPass=str_random(8);
	    //$table->remember_token="asdasdsad";//md5(microtime().Config::get('app.key'));
	    $table->password=bcrypt($password); 
	    $table->created_at=Carbon::now();
	    $table->updated_at=Carbon::now();
	   
            if($table->save()) //Save type master 
            {
              $ChkId=$table->select(array('id','name'))->where([['email','=',$mailid],])->get(); 
              $lastUserId=$ChkId[0]['id']; 
              $UName=$ChkId[0]['name']; 
              if(count($input['typeOpt'])>0) 
              {
                $GetValArr=array();
               foreach($input['typeOpt'] as $key=>$typVal)
                {
                  $GetValArr[]=array('type_id'=>"$typVal", 'user_id'=>$lastUserId) ; 
                  $data=$GetValArr;

                }
 
              DB::table('gym_type_mapping')->insert($data);
 
              } 
              if(count($input['catOpt'])>0) 
              {
                $GetCatValArr=array();
               foreach($input['catOpt'] as $key=>$catVal)
                {
                  $GetCatValArr[]=array('cat_id'=>"$catVal", 'user_id'=>$lastUserId) ; 
                  $dataCat=$GetCatValArr;

                }
 
              DB::table('gym_category_mapping')->insert($dataCat);
 
              }
       
             if(count($input['fetOpt'])>0) 
              {
                $GetfetOptValArr=array();
               foreach($input['fetOpt'] as $key=>$catVal)
                {
                  $GetfetOptValArr[]=array('fe_id'=>"$catVal", 'user_id'=>$lastUserId) ; 
                  $datafet=$GetfetOptValArr;

                }
 
              DB::table('gym_features_mapping')->insert($datafet);
 
              } 

             
              $data = array( 'email' => "$mailid", 'first_name' => "$UName", 'from' => 'fitbeanzfitness@gmail.com','password'=>"$password");
 
             Mail::send('admin.emails.passwordsend', $data, function($message) use ($data) {
        $message->to($data['email']);
        $message->subject('Fitbeanz Registration E-Mail');
    });   
 
    


              
 
   
            }
	     echo 1;
	     exit;
	  }    

 	  


	}

        public function View_reg()
        {

           //$users = User::paginate(15);
           $table = new Admin();
	   $GetAllusers=$table->select(array('id',
                                          'name',
                                          'email',
                                          'password',
                                          'remember_token',
                                          'created_at','active'))
                                          ->whereNotIn('id',['1'])
                                          ->orderBy('id', 'Asc')
                                          ->get();  
            return view('admin.Gym.GymView',compact('GetAllusers'));
 

        }
   
        public function Act_reg_edit(Request $request)
        {

            $input=Input::all();
	    $Ids=$input['ids'];
            $table = new Admin();
            if($Ids!=1)
            {
            $GetActDeac=$table->select(array('active'))->where('id',"$Ids")
                                              ->get(); 
              

                $UpVals=1;
		if($GetActDeac[0]->active==1) 
                {
                $UpVals=0;
		}
                $table->where('id',"$Ids")->update(array('active' => $UpVals));
                
                echo $UpVals;
 
       
           }



        } 
  public function reg_edit_view(Request $request)
  {

		$id=$request->segment(3);
		$tableType = new GymType();
                 
                $getUserDetails=DB::table('admins')
                     ->select(DB::raw('name,email'))->where('id', '=', $id)->get(); 
 
                $Getgym_type_mapping=DB::table('gym_type_mapping')
                     ->select(DB::raw('type_id'))->where('user_id', '=', $id)->get(); 

  
		  
		$GetType=DB::table('gym_type_master')
		->leftJoin('gym_type_mapping', function ($join) use ($id) {
		$join->on( 'gym_type_mapping.type_id', '=', 'gym_type_master.type_id');
		$join->on('gym_type_mapping.user_id','=',DB::raw("'".$id."'"));   
		})->where('gym_type_master.active','=',1)->orderBy('gym_type_master.type_id', 'ASC')
                 ->get(array('gym_type_master.type_id as Mtype_id','gym_type_master.type_name','gym_type_mapping.type_id as childtype_id')); 
		       
                /*$CategoryType = DB::table('gym_category_master')
                     ->select(DB::raw('cat_id, cat_name,active'))->where('active', '=', 1)->get(); */

               $CategoryType=DB::table('gym_category_master')
		->leftJoin('gym_category_mapping', function ($join) use ($id) {
		$join->on( 'gym_category_mapping.cat_id', '=', 'gym_category_master.cat_id');
		$join->on('gym_category_mapping.user_id','=',DB::raw("'".$id."'"));   
		})->where('gym_category_master.active','=',1)->orderBy('gym_category_master.cat_id', 'ASC')
                 ->get(array('gym_category_master.cat_id as Mcat_id','gym_category_master.cat_name','gym_category_mapping.cat_id as childcat_id')); 


             $Getfeatures=DB::table('gym_features')
		->leftJoin('gym_features_mapping', function ($join) use ($id) {
		$join->on( 'gym_features_mapping.fe_id', '=', 'gym_features.fe_id');
		$join->on('gym_features_mapping.user_id','=',DB::raw("'".$id."'"));   
		})->where('gym_features.active','=',1)->orderBy('gym_features.fe_id', 'ASC')
                 ->get(array('gym_features.fe_id as Mfe_id','gym_features.features_name','gym_features_mapping.fe_id as childfe_id')); 
//echo "<pre>";print_r($Getfeatures);
                /*$Getfeatures=DB::table('gym_features')
                     ->select(DB::raw('fe_id, features_name,active'))->where('active', '=', 1)->get(); 
                */
                    
                    
            
                                        
       
	return view('admin.Gym.GymEdit',compact('GetType','CategoryType','Getfeatures','getUserDetails','id'));
  } 
 
   public function Update_reg(Request $request)
   {

    
	   
	   $input=Input::all();
	   $mailid=$input['mailid'];
	   $hid_ids=$input['hid_id']; 
           $Gym_name=$input['Gym_name'];
           $table = new Admin();
	   $table->where('id',"$hid_ids")->update(array('name'=>"$Gym_name"));
          
           
           
                        

           if($input['typV'] !="") 
           {  DB::table('gym_type_mapping')->where('user_id', '=', $hid_ids)->delete();
                $TypVArr=explode(',', $input['typV']);
                $GetValArr=array();
               foreach($TypVArr as $typVal)
                {
                  $GetValArr[]=array('type_id'=>"$typVal", 'user_id'=>$hid_ids) ; 
                  $data=$GetValArr;

                }
 
              DB::table('gym_type_mapping')->insert($data);
 
            }
 
            if($input['catV'] !="") 
              {
               DB::table('gym_category_mapping')->where('user_id', '=', $hid_ids)->delete();
                $CatVArr=explode(',', $input['catV']);
                $GetCatValArr=array();
               foreach($CatVArr as $catVal)
                {
                  $GetCatValArr[]=array('cat_id'=>"$catVal", 'user_id'=>$hid_ids) ; 
                  $dataCat=$GetCatValArr;

                }
 
              DB::table('gym_category_mapping')->insert($dataCat);
 
              }

              if($input['fetV'] != "") 
              {
                DB::table('gym_features_mapping')->where('user_id', '=', $hid_ids)->delete();
                $fetVArr=explode(',', $input['fetV']);
                $GetfetOptValArr=array();
               foreach($fetVArr as $catVal)
                {
                  $GetfetOptValArr[]=array('fe_id'=>"$catVal", 'user_id'=>$hid_ids) ; 
                  $datafet=$GetfetOptValArr;

                }
 
              DB::table('gym_features_mapping')->insert($datafet);
 
              } 
              
 
   
          echo 1;

              

           
 	  



   }
}


