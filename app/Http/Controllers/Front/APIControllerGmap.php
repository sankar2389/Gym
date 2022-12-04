<?php
namespace App\Http\Controllers\Front;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Hash;
//use JWTAuth;
use Auth;
use DB;
use Image;
//use App\Model\Event\EventModel;
//use App\Model\Event\EventOrganiserModel;
use App;
use App\Admin;
//use Mail;
//use App\Mail\textit;

class APIControllerGmap extends BaseController
{

  public function gymSearchGmap(Request $request)
  {

     $inputs = file_get_contents("php://input");
     $data = json_decode($inputs);
     if(isset($data->operation) && isset($data->user->lat) && isset($data->user->lan)) 
     {

            $latMap = $data->user->lat;
            $lanMap = $data->user->lan;

            $GetUsers=DB::select("SELECT user_id as id, ( 3959 * acos( cos( radians($latMap) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lanMap) ) + sin( radians($latMap) ) * sin( radians( lat ) ) ) ) AS distance FROM gym_profile_master HAVING distance < 3.5");

            if(count($GetUsers)>0)
            {

              $filterArrayList=array();
              foreach($GetUsers as $keyIdVal)
              {

              $getFinalValidUserList=Admin::leftJoin('gym_profile_master', 
                                     'admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')->where('admins.active', 1)
               ->where('admins.id',$keyIdVal->id)->take(1)  
               ->get(array('admins.id',
                            'admins.name',
                            'gym_profile_master.area_location',
                            'gym_profile_master.pincode',
                            'gym_profile_master.address1',
                            'gym_profile_master.cell_no',
                            DB::raw('""  as image'),
                            DB::raw('""  as featuresData'),
                            DB::raw('""  as WrkHrData'),
                            DB::raw('""  as WrkHrPeakData'),
                            DB::raw('""  as CategoryList'),
                            DB::raw('""  as CategoryPrice'), ));

               if(count($getFinalValidUserList)>0) 
                           {

                               $GetbannerCnt=DB::table('gym_banner_master')
                              ->where('user_id',$keyIdVal->id)->where('active',1)->count(array('img_path'));
                              
                              if($GetbannerCnt>0) 
                              {

                                $Getbanner=DB::table('gym_banner_master')
                              ->where('user_id',$keyIdVal->id)->where('active',1)->take(1)->get(array('img_path'));


                                if(file_exists( public_path() .'/uploads/images/' .$Getbanner[0]->img_path)) 
                                {
                                $imageBann=$Getbanner[0]->img_path; //Check Image file exists or not
                                }
                                else
                                {

                                  $imageBann="images.jpeg";
                                }  


                              }
                              else
                              {
                                $imageBann="images.jpeg";
                              }

                              $getFinalValidUserList[0]->image=$imageBann;
                               
                              $getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$keyIdVal->id)->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));

                               //Get Minimum price calculate Hourly package: Without trainer
                              $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                              ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                              ->where('gym_package_master.cat_id',1)
                              ->where('gym_package_master.active',1)
                              ->where('gym_package_price.tra_id',2) 
                              ->where('gym_package_price.dur_id',1)
                              ->where('gym_package_master.user_id',$keyIdVal->id)->orderBy('min_price', 'DESC')
                              ->take(1)->get(array(DB::raw("MIN(gym_package_price.price) AS min_price")));
                              if(isset($getMinPriceCat[0]))
                              { 
                              $getFinalValidUserList[0]->CategoryPrice=$getMinPriceCat[0]->min_price;
                              }
                              $getFinalValidUserList[0]->CategoryList=$getPackCategry; 





                              $usersFeat = DB::table('gym_features_mapping')
                              ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                              ->where('gym_features_mapping.user_id',$keyIdVal->id)->where('gym_features.active',1)
                              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                              $userFeatResult="";      

                              if(count($usersFeat)>0)   
                              {
                               
                              $getFinalValidUserList[0]->featuresData=$usersFeat;
                              }
                              else
                              {
                              $getFinalValidUserList[0]->featuresData="";

                              }

                              $GetWorkHr=DB::table('gym_working_hour')
                              ->where('user_id',$keyIdVal->id)
                              ->take(1)->get(array ('wrk_frm_hr',
                              'wrk_to_hr',
                              'peak_m_frm_hr',
                              'peak_m_to_hr',
                              'peak_e_frm_hr',
                              'peak_e_to_hr'));
                              if(count($GetWorkHr)>0) 
                              {
                              $TotWrkHr='--'; 
                              $peakHr='--';

                              foreach ($GetWorkHr as $key => $valuetime) {

                              $TotWrkHr=$valuetime->wrk_frm_hr.'Hrs - '.$valuetime->wrk_to_hr.' Hrs';
                              $peakHr='Mor:'.$valuetime->peak_m_to_hr.'Hrs - '.$valuetime->peak_m_to_hr.' Hrs Eve: '.$valuetime->peak_e_frm_hr.' Hrs - '.$valuetime->peak_e_to_hr; 

                              }

                              $getFinalValidUserList[0]->WrkHrData=$TotWrkHr;
                              $getFinalValidUserList[0]->WrkHrPeakData=$peakHr; 

                              }
     
                           if($getFinalValidUserList[0]->CategoryPrice >0 )
                           {
                              $filterArrayList[]=$getFinalValidUserList;  
                           } 
                           
                           }

               

             }

              if(count($filterArrayList)>0)
                      {

                $getCategory=DB::table('gym_category_master')->where('active',1)->get(array('cat_name','cat_id'));
         
                $getAllfeatures=DB::table('gym_features')->where('active',1)->get(array('features_name','fe_id'));
               
                $getType=DB::table('gym_type_master')->where('active', '=', 1)->get(array('type_id','type_name'));

                return response()->json(['status'=>1, 'message'=>'success.','Gym_category'=>$getCategory,'gym_features'=>$getAllfeatures,'gym_type'=>$getType,'gym_list'=>$filterArrayList]); 

                      }
                      else
                      {
                        return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'3']);  
                      }

             



            }
            else
            {

               return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'2']);

            }



       
     }
     else
     {
        return response()->json(['status'=>0, 'message'=>'Invalid Parameters.','err'=>'1']);
     }


  } 

  public function gymSearchGmap2(Request $request) //home page pageno=1
  {
       $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       if(isset($data->operation) && isset($data->user->catType) && isset($data->user->pin)) 
       {
         $operation = $data->operation;
         if($operation == "gymSearch") 
         {
           
            $catType = $data->user->catType;
            $pinCode = $data->user->pin;
            $filterArrayList=array();

            $getNewValidUserListCnt=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                      ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                      ->where('gym_type_mapping.type_id', $catType)
                      ->where('admins.active', 1)
                      ->where('gym_package_master.cat_id',1) //check economic pack must
                      ->where('gym_profile_master.pincode',$pinCode) 
                      ->where('gym_package_master.active',1) ->distinct()
                      ->count(array('admins.id'));

            if($getNewValidUserListCnt>0)
            {

                $getNewValidUserList=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                      ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                      ->where('gym_type_mapping.type_id', $catType)
                      ->where('admins.active', 1)
                      ->where('gym_package_master.cat_id',1) //check economic pack must
                      ->where('gym_profile_master.pincode',$pinCode) 
                      ->where('gym_package_master.active',1)->distinct()
                      ->get(array('admins.id'));
                 foreach($getNewValidUserList as $keyIdVal)
                       {

                        $getFinalValidUserList=Admin::leftJoin('gym_profile_master', 
    'admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')->where('admins.active', 1)
               ->where('admins.id',$keyIdVal->id)->where('gym_type_mapping.type_id', $catType)
               ->where('gym_profile_master.pincode', $pinCode)->take(1) 
               ->get(array('admins.id',
                            'admins.name',
                            'gym_profile_master.area_location',
                            'gym_profile_master.pincode',
                            'gym_profile_master.address1',
                            'gym_profile_master.cell_no',
                            DB::raw('""  as image'),
                            DB::raw('""  as featuresData'),
                            DB::raw('""  as WrkHrData'),
                            DB::raw('""  as WrkHrPeakData'),
                            DB::raw('""  as CategoryList'),
                            DB::raw('""  as CategoryPrice'), ));

                           if(count($getFinalValidUserList)>0) 
                           {

                               $GetbannerCnt=DB::table('gym_banner_master')
                              ->where('user_id',$keyIdVal->id)->where('active',1)->count(array('img_path'));
                              
                              if($GetbannerCnt>0) 
                              {

                                $Getbanner=DB::table('gym_banner_master')
                              ->where('user_id',$keyIdVal->id)->where('active',1)->take(1)->get(array('img_path'));


                                if(file_exists( public_path() .'/uploads/images/' .$Getbanner[0]->img_path)) 
                                {
                                $imageBann=$Getbanner[0]->img_path; //Check Image file exists or not
                                }
                                else
                                {

                                  $imageBann="images.jpeg";
                                }  


                              }
                              else
                              {
                                $imageBann="images.jpeg";
                              }

                              $getFinalValidUserList[0]->image=$imageBann;
                               
                              $getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$keyIdVal->id)->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));

                               //Get Minimum price calculate Hourly package: Without trainer
                              $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                              ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                              ->where('gym_package_master.cat_id',1)
                              ->where('gym_package_master.active',1)
                              ->where('gym_package_price.tra_id',2) 
                              ->where('gym_package_price.dur_id',1)
                              ->where('gym_package_master.user_id',$keyIdVal->id)->orderBy('min_price', 'DESC')
                              ->take(1)->get(array(DB::raw("MIN(gym_package_price.price) AS min_price")));
                              if(isset($getMinPriceCat[0]))
                              { 
                              $getFinalValidUserList[0]->CategoryPrice=$getMinPriceCat[0]->min_price;
                              }
                              $getFinalValidUserList[0]->CategoryList=$getPackCategry; 





                              $usersFeat = DB::table('gym_features_mapping')
                              ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                              ->where('gym_features_mapping.user_id',$keyIdVal->id)->where('gym_features.active',1)
                              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                              $userFeatResult="";      

                              if(count($usersFeat)>0)   
                              {
                               
                              $getFinalValidUserList[0]->featuresData=$usersFeat;
                              }
                              else
                              {
                              $getFinalValidUserList[0]->featuresData="";

                              }

                              $GetWorkHr=DB::table('gym_working_hour')
                              ->where('user_id',$keyIdVal->id)
                              ->take(1)->get(array ('wrk_frm_hr',
                              'wrk_to_hr',
                              'peak_m_frm_hr',
                              'peak_m_to_hr',
                              'peak_e_frm_hr',
                              'peak_e_to_hr'));
                              if(count($GetWorkHr)>0) 
                              {
                              $TotWrkHr='--'; 
                              $peakHr='--';

                              foreach ($GetWorkHr as $key => $valuetime) {

                              $TotWrkHr=$valuetime->wrk_frm_hr.'Hrs - '.$valuetime->wrk_to_hr.' Hrs';
                              $peakHr='Mor:'.$valuetime->peak_m_to_hr.'Hrs - '.$valuetime->peak_m_to_hr.' Hrs Eve: '.$valuetime->peak_e_frm_hr.' Hrs - '.$valuetime->peak_e_to_hr; 

                              }

                              $getFinalValidUserList[0]->WrkHrData=$TotWrkHr;
                              $getFinalValidUserList[0]->WrkHrPeakData=$peakHr; 

                              }
     
                           if($getFinalValidUserList[0]->CategoryPrice >0 )
                           {
                              $filterArrayList[]=$getFinalValidUserList;  
                           } 
                           
                           }



                       }

                      if(count($filterArrayList)>0)
                      {

                $getCategory=DB::table('gym_category_master')->where('active',1)->get(array('cat_name','cat_id'));
         
                $getAllfeatures=DB::table('gym_features')->where('active',1)->get(array('features_name','fe_id'));
               
                $getType=DB::table('gym_type_master')->where('active', '=', 1)->get(array('type_id','type_name'));

                return response()->json(['status'=>1, 'message'=>'success.','Gym_category'=>$getCategory,'gym_features'=>$getAllfeatures,'gym_type'=>$getType,'gym_list'=>$filterArrayList]); 

                      }
                      else
                      {
                        return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'']);  
                      } 
      

            } 
            else
            {
              return response()->json(['status'=>0, 'message'=>'No data found','err'=>'']);  
            }
                      

         }
         else
         {

          return response()->json(['status'=>0, 'message'=>'Operation not a valid.','err'=>'']);

         }


       }
       else
       {

        return response()->json(['status'=>0, 'message'=>'Invalid Parameters.','err'=>'']);

       }


         
          


    }


    

}
