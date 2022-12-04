<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\GymBannerAdd;
use App\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use DB;
use Response;
use Session;  
class GymBanner extends Controller
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
      public function Add_Banner()
      {


    return view('admin.GymBanner.GymBanner'); 

      }
      public function Upload_Banner(Request $request)
      { 

         $rules = array('image' => 'required',);  
          $file = array('image' => Input::file('image'));
  $validator = Validator::make($file, $rules);
  if ($validator->fails()) { 
      Session::flash('error', 'Select image file');
      return Redirect::to('admin/gymBannerAdd');
  
}
else
{


$table_banner = new GymBannerAdd();
             $ChkValue=$table_banner->select('ban_id')->where([
         ['user_id','=',$this->userId] ])->count()  ;

      


          if($ChkValue<6)
          {

            $image = $request->file('image');
            $input['imagename'] = mt_rand(999,999999)."_".time()."_".$image->getClientOriginalExtension();
 
            $destinationPath = public_path('uploads/thumbnail');
 
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
 
 
            $destinationPath = public_path('uploads/images');
            $image->move($destinationPath, $input['imagename']);

            $table_banner->user_id=$this->userId;
	    $table_banner->img_path=$input['imagename'];
	    if($table_banner->save())
             {
		Session::flash('error', 'Uploaded file Successfully');
     		return Redirect::to('admin/gymBannerAdd');

             }
             else
             {

		Session::flash('error', 'Try again');
     		return Redirect::to('admin/gymBannerAdd');
             } 

   

          }
          else{
 		Session::flash('error', 'Maximum uploaded file reached');
     		return Redirect::to('admin/gymBannerAdd');

           }
 

}


  

      }
public function View_Banner()
{
 $table_banner = new GymBannerAdd();
 $getListBanner=$table_banner->select(array("ban_id","img_path","active"))->where([["user_id","=","$this->userId"]])->get();
 
return view('admin.GymBanner.GymBannerView',compact('getListBanner')); 

}
public function Act_banner_edit(Request $request)
        {
 
            $input=Input::all();
	    $Ids=$input['ids'];
            $table = new GymBannerAdd();
            
            $GetActDeac=$table->select(array('active'))->where('ban_id',"$Ids")
                                              ->get(); 
              
                $UpVals=1;
		if($GetActDeac[0]->active==1) 
                {
                $UpVals=0;
		}
                $table->where('ban_id',"$Ids")->update(array('active' => $UpVals));
                
                echo $UpVals;
 
        } 
public function delete_banner(Request $request )
{

	    $input=Input::all();
	    $Ids=$input['ids'];
            $table_banner = new GymBannerAdd(); 
           $ChkValue=$table_banner->select('ban_id')->where([
         ['user_id','=',$this->userId],['ban_id','=',$Ids] ])->count()  ;
  
         if($ChkValue>0)
          {

		DB::table('gym_banner_master')->where('ban_id', '=', $Ids)->delete();
                echo 1;
          }
          else
          {

 		echo 0;

          }

          //  DB::table('gym_banner_master')->delete([
          //   ['user_id','=',$this->userId],['ban_id','=',$Ids ] ]);
} 

        /* public function Add_package()
         {
         
           
 	         $table_train = new Gym_trainer();
           $table_durat = new Gym_duration();
           $table_categ = new Gym_category(); 

           $getTrain=$table_train->select(array("tra_id","train_mode"))->where([["active","=","1"]])->get();
           $getDuration=$table_durat->select(array("dur_id","dur_name"))->where([["active","=","1"]])->get();
	        $getcategory=$table_categ->select(array("cat_id","cat_name"))->where([["active","=","1"]])->get();
           return view('admin.GymPackage.GymPackadd',compact('getTrain','getDuration','getcategory'));

         }
         public function Save_package(Request $request)
         {
           $table_package=new Gym_package();

           $input=Input::all();
           $Selcat=$input['Selcat'];
           $pak_name=$input['packname'];
           $abtTxt=$input['abtTxt'];

           $ChkValue=$table_package->select('pak_id')->where([
         ['user_id','=',$this->userId],['package_name','=',$pak_name ] ])->count()  ;

          if($ChkValue==0)
          {

           $wrk_frm_hr=$input['Selwhft'];
           $wrk_to_hr=$input['Selwhtt'];
           
           $peak_m_frm_hr=$input['SelphMft'];
           $peak_m_to_hr=$input['SelphMtt'];
           
           $peak_e_frm_hr=$input['SelphEft'];
           $peak_e_to_hr=$input['SelphEtt'];



              $wt1=$input['wt1'];
              $Duration1=$input['wh1'];
              $whprice1=$input['whprice1'];
 
              $wt2=$input['wt2'];
              $Duration2=$input['wh2'];
              $whprice2=$input['whprice2'];


              $wt3=$input['wt3'];
              $Duration3=$input['wh3'];
              $whprice3=$input['whprice3'];


              $wt4=$input['wt4'];
              $Duration4=$input['wh4'];
              $whprice4=$input['whprice4'];

           $table_package->cat_id=$Selcat;
           $table_package->package_name=$pak_name;
           
           $table_package->wrk_frm_hr=$wrk_frm_hr;
           $table_package->wrk_to_hr=$wrk_to_hr;

           $table_package->user_id=$this->userId;

           $table_package->peak_m_frm_hr=$peak_m_frm_hr;
           $table_package->peak_m_to_hr=$peak_m_to_hr;

           
           $table_package->peak_e_frm_hr=$peak_e_frm_hr;
           $table_package->peak_e_to_hr=$peak_e_to_hr;
           $table_package->abt_package=$abtTxt;


            if($table_package->save() )
            {

            

              $ChkValue=$table_package->select('pak_id')->where([
             ['user_id','=',$this->userId],['package_name','=',$pak_name ] ])->get()  ;
             $LastId=$ChkValue[0]['pak_id'] ;
             
              

 
        $pricePack1 = Gym_package_price::create([
           "pak_id" =>$LastId,
           "tra_id"=>$wt1,
           "dur_id"=>"$Duration1",
           "price"=>$whprice1,
           "pack_desc"=>"Hourly package: With trainer",        
           ] );

         
        $pricePack2 = Gym_package_price::create([
           "pak_id" =>$LastId,
           "tra_id"=>$wt2,
           "dur_id"=>$Duration2,
           "price"=>$whprice2,
           "pack_desc"=>"Monthly package: With trainer",        
           ] );

        $pricePack3 = Gym_package_price::create([
           "pak_id" =>$LastId,
           "tra_id"=>$wt3,
           "dur_id"=>$Duration3,
           "price"=>$whprice3,
           "pack_desc"=>"Hourly package: Without trainer",        
           ] );
              
      $pricePack4 = Gym_package_price::create([
               "pak_id" =>$LastId,
               "tra_id"=>$wt4,
               "dur_id"=>$Duration4,
               "price"=>$whprice4,
               "pack_desc"=>"Monthly package: Without trainer",        
               ] );

                 echo 2;

            }
            else
            {
               echo 1;

            }
          
          }
          else
          {

            echo 0;
          }

            
           
       
           
         
     


 

         }

	*/
	

  
}


