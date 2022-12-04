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
  
class GymPackage extends Controller
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
         public function Add_package()
         {
         
           
 	   

        
       $GetWrkHrCnt= DB::table('gym_working_hour')->where('user_id', '=', $this->userId)->count(); 
       $GetBannerCnt= DB::table('gym_banner_master')->where('user_id', '=', $this->userId)->count();
       $GetProfileCnt= DB::table('gym_profile_master')->where('user_id', '=', $this->userId)->count(); 

       if($GetWrkHrCnt==1 &&  $GetBannerCnt>0 &&  $GetProfileCnt==1) //must be fill above master form first
       {
           $table_train = new Gym_trainer();
           $table_durat = new Gym_duration();
           $table_categ = new Gym_category(); 

           $getTrain=$table_train->select(array("tra_id","train_mode"))->where([["active","=","1"]])->get();
           $getDuration=$table_durat->select(array("dur_id","dur_name"))->where([["active","=","1"]])->get();
          
	   $getcategory=Gym_category::leftJoin('gym_category_mapping','gym_category_master.cat_id','=','gym_category_mapping.cat_id')->where('gym_category_master.active',1)->where('gym_category_mapping.user_id',$this->userId)->get(array('gym_category_master.cat_id','gym_category_master.cat_name')) ;


            return view('admin.GymPackage.GymPackadd',compact('getTrain','getDuration','getcategory'));
       }
       else
       {

          return view('admin.home',compact('GetWrkHrCnt','GetBannerCnt','GetProfileCnt'));

       }
  
 
           
         //  return view('admin.GymPackage.GymPackadd',compact('getTrain','getDuration','getcategory'));

         }
         public function Save_package(Request $request)
         {
            $input=Input::all();  
           $table_package=new Gym_package();
           $Selcat=$input['Selcat'];
          if($Selcat==1)
          {


          }
          else{

                $getEconoCnt=DB::table('gym_package_master')->where([['user_id', '=', $this->userId],['cat_id','=','1'],['active','=','1']])->count(); 

           if($getEconoCnt==0)
            {

                echo 3;
                exit;

            } 

        
           } 
          


          
          
           $pak_name=$input['packname'];
           $abtTxt=$input['abtTxt'];

           $ChkValue=$table_package->select('pak_id')->where([
         ['user_id','=',$this->userId],['cat_id','=',$Selcat ],['package_name','=',"$pak_name"] ])->count()  ;

          if($ChkValue==0)
          {

          


              $wt1=1; //with trainer
              $Duration1=1; //Hour
              $whprice1=$input['whprice1'];
 
              $wt2=1;//with trainer
              $Duration2=2; //Month
              $whprice2=$input['whprice2'];


              $wt3=1;//with trainer
              $Duration3=3; //Year
              $whprice3=$input['whprice3'];


              $wt4=2;//with-out trainer
              $Duration4=1; //Hour
              $whprice4=$input['whprice4'];


              $wt5=2;//with-out trainer
              $Duration5=2; //Month
              $whprice5=$input['whprice5'];



              $wt6=2;//with-out trainer
              $Duration6=3; //Year
              $whprice6=$input['whprice6'];


           $table_package->cat_id=$Selcat;
           $table_package->package_name=$pak_name;
           $table_package->user_id=$this->userId;
           $table_package->abt_package=$abtTxt;

           if($whprice4>0 && $whprice5>0 && $whprice6>0)
           {


           }
           else
           {

            echo 5;
            exit;

           }


            if($table_package->save() )
            {

            

              $ChkValue=$table_package->select('pak_id')->where([
             ['user_id','=',$this->userId],['package_name','=',$pak_name ],['cat_id','=',$Selcat ] ])->get()  ;
             $LastId=$ChkValue[0]['pak_id'] ;
             
              

 
        $pricePack1 = Gym_package_price::create([
           "pak_id" =>$LastId,
           "tra_id"=>$wt1,
           "dur_id"=>"$Duration1",
           "price"=>$whprice1,
           "pack_desc"=>"Session : With trainer",        
           ] );

         
        $pricePack2 = Gym_package_price::create([
           "pak_id" =>$LastId,
           "tra_id"=>$wt2,
           "dur_id"=>$Duration2,
           "price"=>$whprice2,
           "pack_desc"=>"Monthly : With trainer",        
           ] );

         $pricePack5 = Gym_package_price::create([
               "pak_id" =>$LastId,
               "tra_id"=>$wt3,
               "dur_id"=>$Duration3,
               "price"=>$whprice3,
               "pack_desc"=>"Yearly : With trainer",        
               ] );

        $pricePack3 = Gym_package_price::create([
           "pak_id"=>$LastId,
           "tra_id"=>$wt4,
           "dur_id"=>$Duration4,
           "price"=>$whprice4,
           "pack_desc"=>"Session : Without trainer",        
           ] );
              
      $pricePack4 = Gym_package_price::create([
               "pak_id"=>$LastId,
               "tra_id"=>$wt5,
               "dur_id"=>$Duration5,
               "price"=>$whprice5,
               "pack_desc"=>"Monthly : Without trainer",        
               ] );

	

       $pricePack6 = Gym_package_price::create([
               "pak_id"=>$LastId,
               "tra_id"=>$wt6,
               "dur_id"=>$Duration6,
               "price"=>$whprice6,
               "pack_desc"=>"Yearly : Without trainer",        
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
public function view_package()
{

	$GetPackage=Gym_package::leftJoin	('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')->where('gym_package_master.user_id',$this->userId)->groupBy('gym_category_master.cat_id')->get(array('gym_category_master.cat_name','gym_category_master.cat_id','gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.active'));

 
	return view('admin.GymPackage.GymPackageView',compact('GetPackage'));


}
public function Act_pak_edit(Request $request)
{


            $input=Input::all();
	    $Ids=$input['ids'];
            $table = new Gym_package();
            
            $GetActDeac=$table->select(array('active'))->where('pak_id',"$Ids")
                                              ->get(); 
              
                $UpVals=1;
		if($GetActDeac[0]->active==1) 
                {
                $UpVals=0;
		}
                $table->where('pak_id',"$Ids")->update(array('active' => $UpVals));
                
                echo $UpVals;


}
public function edit_package(Request $request)
{
$id=$request->segment(3);
$table = new Gym_package();
            
            

 $ChkValue=$table->select('pak_id')->where([
         ['user_id','=',$this->userId],['pak_id','=',$id ] ])->count()  ;

if($ChkValue==1)
{

$GetPackage=Gym_package::leftJoin	('gym_package_price','gym_package_master.pak_id','=','gym_package_price.pak_id')
 ->where('gym_package_master.pak_id',$id)->get(array('gym_package_master.pak_id','gym_package_master.cat_id',
					'gym_package_master.package_name',
					'gym_package_master.abt_package',
					'gym_package_price.pak_price_id',
					'gym_package_price.pack_desc',
					'gym_package_price.tra_id',
					'gym_package_price.dur_id',
					'gym_package_price.price'));

$getcategory=Gym_category::leftJoin('gym_category_mapping','gym_category_master.cat_id','=','gym_category_mapping.cat_id')->where('gym_category_master.active',1)->where('gym_category_mapping.user_id',$this->userId)->get(array('gym_category_master.cat_id','gym_category_master.cat_name')) ;
           

return view('admin.GymPackage.GymPackEditView',compact('GetPackage','getcategory'));

 
}
else
{

   return redirect('/admin/error')->send();


}

  


}
public function update_package(Request $request)
{

	$input=Input::all();
	$Ids=$input['hid_id'];
        $packname=$input['packname'];
        $Selcat=$input['Selcat'];
        $abt_package=$input['abtTxt'];
	$table = new Gym_package();
        $ChkValue=$table->select('pak_id')->where([
         ['user_id','=',$this->userId],['pak_id','=',$Ids ] ])->count()  ;

  if($ChkValue==1) //check Id belongs to this user
  {
  
    $ChkPakExits=$table->select('pak_id')->where([
         ['user_id','=',$this->userId],['package_name','=',"$packname"],['cat_id','=',$Selcat ],['pak_id','!=',$Ids ] ])->count();

 
  
  if($ChkPakExits==0)
   {
    

 

              $wt1=1; //with trainer
              $Duration1=1; //Hour
              $whprice1=$input['whprice1'];
 
              $wt2=1;//with trainer
              $Duration2=2; //Month
              $whprice2=$input['whprice2'];


              $wt3=1;//with trainer
              $Duration3=3; //Year
              $whprice3=$input['whprice3'];


              $wt4=2;//with-out trainer
              $Duration4=1; //Hour
              $whprice4=$input['whprice4'];


              $wt5=2;//with-out trainer
              $Duration5=2; //Month
              $whprice5=$input['whprice5'];



              $wt6=2;//with-out trainer
              $Duration6=3; //Year
              $whprice6=$input['whprice6'];

              if($whprice4>0 && $whprice5>0 && $whprice6>0)
              {

                $table->where([
                ['user_id','=',$this->userId],['pak_id','=',$Ids ]] )->update(array('cat_id' => $Selcat,"package_name"=>"$packname","abt_package"=>"$abt_package"));

                DB::table('gym_package_price')->where('pak_id', '=', $Ids)->delete();
              }
              else
              {
          
                  echo 5;
                  exit;
 
              }





	$pricePack1 = Gym_package_price::create([
           "pak_id" =>$Ids,
           "tra_id"=>$wt1,
           "dur_id"=>"$Duration1",
           "price"=>$whprice1,
           "pack_desc"=>"Session : With trainer",        
           ] );

         
        $pricePack2 = Gym_package_price::create([
           "pak_id" =>$Ids,
           "tra_id"=>$wt2,
           "dur_id"=>$Duration2,
           "price"=>$whprice2,
           "pack_desc"=>"Monthly : With trainer",        
           ] );

         $pricePack5 = Gym_package_price::create([
               "pak_id" =>$Ids,
               "tra_id"=>$wt3,
               "dur_id"=>$Duration3,
               "price"=>$whprice3,
               "pack_desc"=>"Yearly : With trainer",        
               ] );

        $pricePack3 = Gym_package_price::create([
           "pak_id" =>$Ids,
           "tra_id"=>$wt4,
           "dur_id"=>$Duration4,
           "price"=>$whprice4,
           "pack_desc"=>"Session : Without trainer",        
           ] );
              
      $pricePack4 = Gym_package_price::create([
               "pak_id" =>$Ids,
               "tra_id"=>$wt5,
               "dur_id"=>$Duration5,
               "price"=>$whprice5,
               "pack_desc"=>"Monthly : Without trainer",        
               ] );

	

       $pricePack6 = Gym_package_price::create([
               "pak_id" =>$Ids,
               "tra_id"=>$wt6,
               "dur_id"=>$Duration6,
               "price"=>$whprice6,
               "pack_desc"=>"Yearly : Without trainer",        
               ] );


	      
      echo 2;


                      
 
   }
   else
   {

    echo 1; //Already exists

   }  
     
 
  }
  else
  {
    echo 0 ; //Invalid Ids

  }



}
public function GetPakListe_package(Request $request)
{

  $input=Input::all();
	 $Ids=$input['ids'];
         $CatIds=$input['catId'];

$GetPackage=Gym_package::leftJoin	('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')->where('gym_package_master.user_id',$this->userId)->where('gym_package_master.cat_id','=',"$CatIds")->get(array('gym_category_master.cat_name','gym_category_master.cat_id','gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.active'));

echo json_encode($GetPackage);


}
public function delete_package(Request $request)
{


  $input=Input::all();
  $Ids=$input['ids'];

 $table = new Gym_package();
 $ChkValue=$table->select('pak_id')->where([
    ['user_id','=',$this->userId],['pak_id','=',$Ids ] ])->count()  ;

  if($ChkValue==1) //check Id belongs to this user
  {
     DB::table('gym_package_master')->where('pak_id', '=', $Ids)->delete();
     echo 1;
  }
  else
  {

   echo 0;

   } 


         
}


	
	

  
}


