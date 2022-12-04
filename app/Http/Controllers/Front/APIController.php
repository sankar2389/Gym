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

class APIController extends BaseController
{

  public function generateotp(Request $request) //1st page to 2nd page
   {

    return response()->json(['status'=>1, 'message'=>'Success.','err'=>'']);

  }

  public function gymSearch(Request $request) //home page pageno=1
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




    public function gymChoseList(Request $request) //1st page to 2nd page
   {

    $inputs = file_get_contents("php://input");
    $data = json_decode($inputs);
    if(isset($data->operation) && isset($data->user->gymid) && isset($data->user->catid)) 
    {

        $userId=$data->user->gymid;
        $catId=$data->user->catid;
        if($userId>0 && $catId>0)
        {

             $getParticularGymListCnt=Admin::leftJoin('gym_package_master','admins.id', '=', 'gym_package_master.user_id')
                ->leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')
                ->where('admins.active', 1)
                ->where('admins.id', $userId)
                ->where('gym_package_master.active', 1)
                ->count(array('gym_package_master.pak_id'));

                if($getParticularGymListCnt>0)
               {


                $getParticularGymList=Admin::leftJoin('gym_package_master','admins.id', '=', 'gym_package_master.user_id')
                ->leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')
                ->where('admins.active', 1)
                ->where('admins.id', $userId)
                ->where('gym_package_master.active', 1)->take(1)
                ->get(array('gym_package_master.pak_id',
                                'admins.id',  
                                'admins.name',
                                'gym_profile_master.area_location',
                                'gym_profile_master.pincode',
                                'gym_profile_master.address1',
                                'gym_profile_master.cell_no',
                                'gym_package_master.cat_id',
                                'gym_package_master.package_name',
                                'gym_package_master.abt_package',
                                DB::raw('""  as image' ),
                                DB::raw('""  as featuresData'),
                                DB::raw('""  as WrkHrData'),
                                DB::raw('""  as WrkHrPeakData'),
                                DB::raw('""  as CategoryList'),
                                DB::raw('""  as PriceList'),
                                DB::raw('""  as TotPakList'),
                                DB::raw('""  as Banner'),));

                
                foreach($getParticularGymList as $value){

                     $getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$value->id)->orderBy('gym_category_master.cat_id','ASC')->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));

                     foreach($getPackCategry as $key=>$valCt)
                    {
                        if($key==0)
                        {
                                $getMinPriceCatCnt=DB::table('gym_package_master')->leftJoin
                          ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                          ->where('gym_package_master.cat_id',$catId)
                          ->where('gym_package_master.active',1)
                          ->where('gym_package_price.tra_id',2) 
                          ->where('gym_package_price.dur_id',1)
                          ->where('gym_package_price.active',1)
                          ->where('gym_package_master.user_id',$value->id)
                          ->count(array('gym_package_master.pak_id'));
 
                            if($getMinPriceCatCnt>0)
                            {

                            }
                            else
                            {

                            return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'4' ]);
                            

                            }
                            $GetGymBannerCnt=DB::table('gym_banner_master')
                            ->where("user_id",$value->id)->where("active",1)->count(array("ban_id"));
                            if($GetGymBannerCnt >0)
                            {
                        $GetGymBanner=DB::table('gym_banner_master')->where("user_id",$value->id)
                                       ->where("active",1)->get(array("img_path"));

                             $getParticularGymList[0]->Banner=$GetGymBanner;
 

                            }
                            else
                            { 
                                $getParticularGymList[0]->Banner=array(); 
                            }
                            $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$catId)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_price.active',1)
                      ->where('gym_package_master.user_id',$value->id)->orderBy('min_price',"ASC")
                      ->get(array(DB::raw("gym_package_price.price AS min_price"),'gym_package_master.pak_id','gym_package_master.cat_id'));

                    if($getMinPriceCat[0]->min_price>0 && $getMinPriceCat[0]->pak_id>0 && $getMinPriceCat[0]->min_price !="" && $getMinPriceCat[0]->pak_id !="" )
                    {

                        $getTotPackage=DB::table('gym_package_master')
                    ->where('gym_package_master.user_id',$value->id)
                    ->where('gym_package_master.cat_id',$catId)
                    ->where('gym_package_master.active',1)
                    ->get(array('gym_package_master.package_name','gym_package_master.pak_id'
                      ,DB::raw( $getMinPriceCat[0]->pak_id." AS SelePack")));

                    $getParticularGymList[0]->TotPakList=$getTotPackage;

                    $getPriceCntCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.pak_id','=',$getMinPriceCat[0]->pak_id)
                      ->where('gym_package_master.cat_id','=',$catId)
                      ->where('gym_package_master.active','=',1)
                      ->where('gym_package_price.active','=',1)
                      ->where('gym_package_price.price','>',0)
                      ->where('gym_package_master.user_id','=',$value->id)
                      ->count(array('gym_package_price.pak_price_id'));
                      if($getPriceCntCat>0) 
                     {

                        $getPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.pak_id','=',$getMinPriceCat[0]->pak_id)
                      ->where('gym_package_master.cat_id','=',$catId)
                      ->where('gym_package_master.active','=',1)
                      ->where('gym_package_price.active','=',1)
                      ->where('gym_package_price.price','>',0)
                      ->where('gym_package_master.user_id','=',$value->id)
                      ->get(array('gym_package_master.pak_id',
                                  'gym_package_master.cat_id',
                                  'gym_package_price.pack_desc',
                                  'gym_package_price.tra_id',
                                  'gym_package_price.dur_id',
                                  'gym_package_price.price',
                                  'gym_package_price.pak_price_id',
                                  'gym_package_master.package_name'));
                       
                       $getParticularGymList[0]->PriceList=$getPriceCat;


                     }
                     else
                     {

                       return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'6' ]); 
                     }


                    }
                    else
                    {
                        return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'5']); 

                    }

 



                        }
                        


                    }
 
                     $getParticularGymList[0]->CategoryList=$getPackCategry; 
                     $Getbanner=DB::table('gym_banner_master')->where('user_id',$value->id)->where('active',1)->take(1)->get(array('img_path'));

                    if(isset($Getbanner[0]) && count($Getbanner)>0) 
                    {


                    if(file_exists( public_path() .'/uploads/images/' .$Getbanner[0]->img_path)) 
                    {
                        $imageBann=$Getbanner[0]->img_path; //Check Image file exists or not
                    }  


                    }
                    else
                    {
                        $imageBann="images.jpeg";
                    }
                    $getParticularGymList[0]->image=$imageBann;

                     $usersFeat = DB::table('gym_features_mapping')
                      ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                      ->where('gym_features_mapping.user_id',$value->id)->where('gym_features.active',1)
                    ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                             
                    if(count($usersFeat)>0)   
                    {
                       

                        $getParticularGymList[0]->featuresData=$usersFeat;
                    }
                    else
                    {
                       $getParticularGymList[0]->featuresData=''; 

                    }

                    $GetWorkHr=DB::table('gym_working_hour')
                      ->where('user_id',$value->id)
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

              foreach ($GetWorkHr as $key => $valuetime) 
                              {

              $TotWrkHr=$valuetime->wrk_frm_hr.'Hrs - '.$valuetime->wrk_to_hr.' Hrs';
              $peakHr='Mor:'.$valuetime->peak_m_to_hr.'Hrs - '.$valuetime->peak_m_to_hr.' Hrs Eve: '.$valuetime->peak_e_frm_hr.' Hrs - '.$valuetime->peak_e_to_hr; 

              }

              $getParticularGymList[0]->WrkHrData=$TotWrkHr;
              $getParticularGymList[0]->WrkHrPeakData=$peakHr; 


                          }



                       

                }


               }
               else
               {
                return response()->json(['status'=>0, 'message'=>'No data found.','err'=>'3' ]);
               }

               return response()->json(['status'=>1, 'message'=>'success.','result'=>$getParticularGymList,'hidcat'=>$catId]);
                
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
   public function gymCatTypes(Request $request)
   {

           $chkPriceRwValid=DB::table('gym_type_master')
                                ->where('active',1)
                                ->get(array('type_id','user_id','type_name',
                                  'active'));
         return response()->json(['status'=>1, 'message'=>"success",'err'=>0,'result'=>$chkPriceRwValid ]);


     
   }
   public function PayChkOuts(Request $request)
   {

       $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       $ApiStatus=0;
       $ApiMsg="";
       $ApiErr=0;
       if(isset($data->operation)) {

        if($data->operation=="PayChkOut" && isset($data->user->priceid) && isset($data->user->emailid) && isset($data->user->mobile) )
        {

           $priceId=$data->user->priceid;
           $emailId=$data->user->emailid;
           $mobile=$data->user->mobile;
           $chkPriceRwValidCnt=DB::table('gym_package_price')
                                ->where('pak_price_id',$priceId)
                                ->where('active',1)->count(array('pak_price_id'));
           if($chkPriceRwValidCnt>0)
           {

            $chkPriceRwValid=DB::table('gym_package_price')
                                ->where('pak_price_id',$priceId)
                                ->get(array('pak_price_id','pak_id','pack_desc',
                                  'tra_id','dur_id','price',
                                  DB::raw('""  as GymName'),
                                  DB::raw('""  as Category'),
                                  DB::raw('""  as UserID'),
                                  DB::raw('""  as PakName')
                                  ));

             $GymPakIDChk=$chkPriceRwValid[0]->pak_id;

             $getPakageCnt=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$priceId)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->count(array('gym_package_master.pak_id'));

              if($getPakageCnt>0)
               {

                $getPakage=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$priceId)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->get(array('gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.abt_package','gym_package_master.user_id','gym_category_master.cat_name','admins.name','gym_package_master.cat_id'));


              $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
              $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
              $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
              $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;
              $trans_id=uniqid().time(); 
              $secret_key="556e33423e971f6106d5e1c68fa3ffc468ad65eb";
              $curDate=date('Y-m-d h:i:s');
              $vanityUrl="mwmb90c6c2";
              $orderAmount='1.00';
              $currency='INR';
              $data=$vanityUrl.$orderAmount.$trans_id.$currency; 
              $securitySignature = hash_hmac('sha1', $data, $secret_key);
              $postArr['formPostUrl']="https://checkout.citruspay.com/ssl/checkout/mwmb90c6c2";
              $postArr['secret_key']=$secret_key;
              $postArr['vanityUrl']=$vanityUrl;
              $postArr['merchantTxnId']=$trans_id;
              $postArr['orderAmount']=$orderAmount;
              $postArr['currency']=$currency;
              $postArr['data']=$vanityUrl.$orderAmount.$trans_id.$currency;
              $postArr['returnURL']="http://alivefitnez.com/paymentTestRes";
              $postArr['securitySignature']=$securitySignature;


              $saveTbl=DB::table('gym_payment_master')->insert(
    ["user_id" => $getPakage[0]->user_id, "pak_id" => $getPakage[0]->pak_id,"cat_id"=> $getPakage[0]->cat_id,"price_id"=> $priceId,"pak_name"=> $getPakage[0]->package_name,"cat_name"=> $getPakage[0]->cat_name,"price"=> $chkPriceRwValid[0]->price,"pack_desc"=> $chkPriceRwValid[0]->pack_desc,"req_date"=> $curDate,"user_email"=> $emailId,"user_mobile"=> $mobile,"trans_id"=>$trans_id ]
     );

              $ApiStatus=1;
              $ApiMsg="";



               }
               else
                $ApiMsg="No data found.";
               $ApiErr=4;

           }
           else
           {
              $ApiMsg="No data found.";
              $ApiErr=3;

           }                     


        }
        else
        {
          $ApiMsg="Invalid Parameters.";
         $ApiErr=2;


        }




       }
       else
       {
         $ApiMsg="Invalid Parameters.";
         $ApiErr=1;

       }

       if($ApiStatus==1)
       {
         return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'result'=>$postArr ]);
       }
       else
       {
          return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]);
       }

       



   } 

   public function ChoseChkOuts(Request $request) //page-3 paynow button
   {

       $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       $ApiStatus=0;
       $ApiMsg="";
       $ApiErr=0;

       if(isset($data->operation)) { 

        if($data->operation=="ChoseChkOut" && isset($data->user->priceid) )
        {
          $PriceRowid=$data->user->priceid;

          $chkPriceRwValidCnt=DB::table('gym_package_price')
                                ->where('pak_price_id',$PriceRowid)
                                ->where('active',1)->count(array('pak_price_id'));
          if($chkPriceRwValidCnt>0){

            $chkPriceRwValid=DB::table('gym_package_price')
                                ->where('pak_price_id',$PriceRowid)
                                ->get(array('pak_price_id','pak_id','pack_desc',
                                  'tra_id','dur_id','price',
                                  DB::raw('""  as GymName'),
                                  DB::raw('""  as Category'),
                                  DB::raw('""  as UserID'),
                                  DB::raw('""  as PakName')
                                  ));

        $GymPakIDChk=$chkPriceRwValid[0]->pak_id;

        $getPakageCnt=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$PriceRowid)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->count(array('gym_package_master.pak_id'));

              if($getPakageCnt>0)
             {

                $getPakage=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$PriceRowid)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->get(array('gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.abt_package','gym_package_master.user_id','gym_category_master.cat_name','admins.name'));

              $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
              $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
              $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
              $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;

               $ApiMsg="success.";
               $ApiErr='0';
               $ApiStatus=1;
               return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'Result'=>$chkPriceRwValid]);
               exit;
               

             }
             else
             {

               $ApiMsg="No data found.";
               $ApiErr=4;
             }


          }
          else
          {
            $ApiMsg="No data found.";
            $ApiErr=3;

          }                      



        }
        else
        {

             
            $ApiMsg="Invalid Parameters.";
            $ApiErr=2;
        }




       }
       else
       {
            
            $ApiMsg="Invalid Parameters.";
            $ApiErr=1;

       }
     return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]);
 


   }

public function catMiniPrice(Request $request)
{

    $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       
       $ApiStatus=0;
       $ApiMsg="";
       $ApiErr=0;
      if(isset($data->operation)) { 

        if($data->operation=="catMnPrice" && isset($data->user->catid) && isset($data->user->gymId))
        {
            $catIds=$data->user->catid;
            $gymIds=$data->user->gymId;
            $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$catIds)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_master.user_id',$gymIds)->orderBy('min_price', 'DESC')
                      ->take(1)->get(array(DB::raw("MIN(gym_package_price.price) AS min_price")));

            if(count($getMinPriceCat)>0)
            {
                if($getMinPriceCat[0]->min_price)
                {
                     $getMinPriceCat[0]->min_price;

                     return response()->json(['status'=>1, 'message'=>"success",'err'=>"0","price"=>$getMinPriceCat[0]->min_price ]);  exit; 
        
                }
                else
                {

                   $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=4;
 
                }

            }
            else
            {
                $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=3;

            }



        }
        else
        {

            $ApiStatus=0;
            $ApiMsg="Invalid Parameters.";
            $ApiErr=2;

        }
 

       }
       else
       {

       
            $ApiStatus=0;
            $ApiMsg="Invalid Parameters.";
            $ApiErr=1;

       }

    return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]);   

 

}
public function gymFilterList(Request $request)
{

   $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       $ApiStatus=0;
       $ApiMsg="";
       $ApiErr=0;
        
      if(isset($data->operation)) {

      if($data->operation=="FilterChose" && isset($data->user->catId) && isset($data->user->facilityId) && isset($data->user->catType) && isset($data->user->pinCode))
        {
         $catType=$data->user->catType;
         $pinCode=$data->user->pinCode;
         $Catids=$data->user->catId;
         $Feaids=$data->user->facilityId;

         $getValidUserListCnt=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                   ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                   ->where('gym_type_mapping.type_id', $catType)
                   ->where('admins.active', 1)
                   ->where('gym_package_master.cat_id',1) //check economic pack must
                   ->where('gym_profile_master.pincode',$pinCode) 
                   ->where('gym_package_master.active',1)->distinct()
                   ->count(array('admins.id'));


            if($getValidUserListCnt>0)
            {

              $getValidUserList=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                   ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                   ->where('gym_type_mapping.type_id', $catType)
                   ->where('admins.active', 1)
                   ->where('gym_package_master.cat_id',1) //check economic pack must
                   ->where('gym_profile_master.pincode',$pinCode) 
                   ->where('gym_package_master.active',1)->distinct()
                   ->get(array('admins.id'));  

 

            }
            else
            {   $ApiStatus=0;
                $ApiMsg="No data found.";
                $ApiErr=3;
                return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]); 
                exit;

            }

            $checkCatidExist=array();
            $finalCatResult=array();
            $ResultCat=array(); 
            $checkFetidExist=array();
            $finalFetResult=array();
            $ResultFet=array();
            $arrF=array();
            $filterArrayList=array(); 

          if($Catids !="" || $Feaids !="" ) //Category,features Id Not empty 
          {
           $CatidArr=explode(',', $Catids);
           $FeaidArr=explode(',', $Feaids); 
            
           if(count($CatidArr)>0)
           {

             for($i=0;$i<count($CatidArr);$i++)
             {
                   

                    if($CatidArr[$i]>0)
                    {
           foreach($getValidUserList as $userList) //user id wise Category filteration 
          { 
                            
                                  
                       
           $getUserDetails=DB::table('gym_package_master')
          ->where('user_id', '=', $userList->id)
               ->where('active', '=', 1)
          ->where('cat_id', $CatidArr[$i])
          ->count();

                         
                         if($getUserDetails>0)
                         {
                              
                             if(isset($checkCatidExist[$userList->id]))
                            {

                              $checkCatidExist[$userList->id]=$checkCatidExist[$userList->id]+1;
                              if($checkCatidExist[$userList->id]==count($CatidArr))
                              {
                                 $finalCatResult[]=$userList->id;

                              }          


                            }
                            else
                            {
                              $checkCatidExist[$userList->id]=1;
                              if($checkCatidExist[$userList->id]==count($CatidArr))
                              {
                                 $finalCatResult[]=$userList->id;

                              }



                            }  


                         }  
          }  
                  }  
             }
          }

          if(count($FeaidArr)>0)
           {

             for($i=0;$i<count($FeaidArr);$i++)
             {
                   

                    if($FeaidArr[$i]>0)
                    {
           foreach($getValidUserList as $userList) //user id wise Category filteration 
          { 
                            
                                  
                       
           $getUserDetails=DB::table('gym_features_mapping')
          ->where('user_id', '=', $userList->id)
               ->where('active', '=', 1)
          ->where('fe_id', $FeaidArr[$i])
          ->count();

                         
                         if($getUserDetails>0)
                         {
                              
                             if(isset($checkFetidExist[$userList->id]))
                            {

                              $checkFetidExist[$userList->id]=$checkFetidExist[$userList->id]+1;
                              if($checkFetidExist[$userList->id]==count($FeaidArr))
                              {
                                 $finalFetResult[]=$userList->id;

                              }          


                            }
                            else
                            {
                              $checkFetidExist[$userList->id]=1;
                              if($checkFetidExist[$userList->id]==count($FeaidArr))
                              {
                                 $finalFetResult[]=$userList->id;

                              }



                            }  


                         }  
          }  
                  }  
             }
          }



          } 
 if($Catids !="" && $Feaids !="" )
  {  
     
    $ResultCat=array_unique($finalCatResult);
    $ResultFet=array_unique($finalFetResult);
   
    if(count($ResultCat)>0 && count($ResultFet)>0 )
    {
       $arrF = array_intersect($ResultCat,$ResultFet);
       
       $arrF = array_values($arrF);
   
    }
    else
    {

                $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=4;

    }



  }
  elseif($Catids =="" && $Feaids =="")
  {

      foreach($getValidUserList as $userList) //user id wise Category filteration 
      { 
         $arrF[]=$userList->id;          
      }

    if(count($arrF)>0)
    {
       
 
    }
    else
    {

                $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=5;

    }


  }
  elseif($Catids !="" && $Feaids =="")
  {

     $ResultCat=array_unique($finalCatResult);
     if(count($ResultCat)>0)
     {
       $arrF = array_unique($finalCatResult);

      

    }
    else
    {

                $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=6;

    }


  }
  elseif($Catids =="" && $Feaids !="")
  {

      $ResultFet=array_unique($finalFetResult);
    if(count($ResultFet)>0 )
    {
       $arrF = array_unique($ResultFet);

      

    }
    else
    {

                $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=7;

    }
   
  }
  else{

                $ApiStatus=0;
                $ApiMsg="No data found";
                $ApiErr=8;

  }      
 
    if(count($arrF)>0)
   {


    for($k=0;$k<count($arrF);$k++)
    {


      $encriId=encrypt($arrF[$k]);
 $getFinalValidUserList=Admin::leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                           ->where('admins.active', 1)
                           ->where('admins.id', $arrF[$k])
                          ->where('gym_type_mapping.type_id', $catType)
                           ->where('gym_profile_master.pincode', $pinCode)->take(1) 
                           ->get(array('admins.id', 
                                     'admins.name',
                                    'gym_profile_master.area_location',
                                    'gym_profile_master.pincode',
                                    'gym_profile_master.address1',
                                    'gym_profile_master.cell_no',
                                DB::raw('"'.$encriId.'" as encriId '),
                                DB::raw('""  as image'),
                                DB::raw('""  as featuresData'),
                                DB::raw('""  as WrkHrData'),
                                DB::raw('""  as WrkHrPeakData'),
                                DB::raw('""  as CategoryList'),
                                DB::raw('""  as CategoryPrice')   ) );

           if(count($getFinalValidUserList)>0) 
            {

               $Getbanner=DB::table('gym_banner_master')
                                ->where('user_id',$arrF[$k])->where('active',1)->take(1)->get(array('img_path'));
                        if(isset($Getbanner[0]) && count($Getbanner)>0) 
                        {


                        if(file_exists( public_path() . '/uploads/images/' .$Getbanner[0]->img_path)) 
                        {
                            $imageBann=$Getbanner[0]->img_path; //Check Image file exists or not
                        }
                        else{

                          $imageBann="images.jpeg";

                        }  


                        }
                        else
                        {
                             $imageBann="images.jpeg";
                        }

                       $getFinalValidUserList[0]->image=$imageBann;
                       $getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$arrF[$k])->orderBy('gym_category_master.cat_id','ASC')->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));

                  foreach($getPackCategry as $key=>$valCt)
                  {
                    if($key==0)
                    {
                       $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$valCt->cat_id)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_master.user_id',$arrF[$k])->orderBy('min_price', 'DESC')
                      ->take(1)->get(array(DB::raw("MIN(gym_package_price.price) AS min_price")));

                      if(isset($getMinPriceCat[0]))
                      { 
                          $getFinalValidUserList[0]->CategoryPrice=$getMinPriceCat[0]->min_price;
                      }


                    }            
                    //$ListCategory.=$valCt->cat_id;
                  }

                  $getFinalValidUserList[0]->CategoryList=$getPackCategry;

                  $usersFeat = DB::table('gym_features_mapping')
                ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                ->where('gym_features_mapping.user_id',$arrF[$k])->where('gym_features.active',1)
              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                $userFeatResult='';

                if(count($usersFeat)>0)   
                      {
                         

                          
                      }
                       $getFinalValidUserList[0]->featuresData=$usersFeat; 

                     $GetWorkHr=DB::table('gym_working_hour')
                                    ->where('user_id',$arrF[$k])
                                    ->take(1)->get(array ('wrk_frm_hr',
                                                          'wrk_to_hr', 'peak_m_frm_hr', 'peak_m_to_hr',
                                                           'peak_e_frm_hr','peak_e_to_hr')); 
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
                      $filterArrayList[]=$getFinalValidUserList; 


                    }                



 

    }



     if(count($filterArrayList)>0)
              {

                 $ApiStatus=1;
                $ApiMsg="success.";
                 $ApiErr=12;

    
              }
              else{

               $ApiStatus=0;
               $ApiMsg="No data found";
               $ApiErr=10;


                 }
     
   }
   else
   {
     $ApiStatus=0;
     $ApiMsg="No data found";
     $ApiErr=9;

   } 

 
        } 
        else
        {

            $ApiStatus=0;
            $ApiMsg="Invalid Parameters.";
            $ApiErr=2;
        } 
      }
      else
      {

        $ApiStatus=0;
        $ApiMsg="Invalid Parameters.";
        $ApiErr=1;

       }
    if($ApiStatus==1)
    {
        return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'result'=>$filterArrayList ]);   
    }
    else
    {
       return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]);   
    }
    

}
public function gymPackSelect(Request $request)
{

   $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       $ApiStatus=0;
       $ApiMsg="";
       $ApiErr=0;

 if(isset($data->operation)) 
 {

      if($data->operation=="gymPackSelect" && isset($data->user->catid) && isset($data->user->gymid) && isset($data->user->pkid))
        {
 
          $pkId=$data->user->pkid;
          $catids=$data->user->catid;
          $UserId=$data->user->gymid;
          $getPriceCntCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.pak_id','=',$pkId)
                      ->where('gym_package_master.cat_id','=',$catids)
                      ->where('gym_package_master.active','=',1)
                      ->where('gym_package_price.active','=',1)
                      ->where('gym_package_price.price','>',0)
                      ->where('gym_package_master.user_id','=',$UserId)
                      ->count(array('gym_package_price.pak_price_id'));

        if($getPriceCntCat>0)
        {


          $getPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.pak_id','=',$pkId)
                      ->where('gym_package_master.cat_id','=',$catids)
                      ->where('gym_package_master.active','=',1)
                      ->where('gym_package_price.active','=',1)
                      ->where('gym_package_price.price','>',0)
                      ->where('gym_package_master.user_id','=',$UserId)
                      ->get(array('gym_package_master.pak_id',
                                  'gym_package_master.cat_id',
                                  'gym_package_price.pack_desc',
                                  'gym_package_price.tra_id',
                                  'gym_package_price.dur_id',
                                  'gym_package_price.price',
                                  'gym_package_master.package_name','gym_package_price.pak_price_id'));

                      $ApiStatus=1;
                      $ApiMsg="Success";
                      $ApiErr=0; 
            
        }
        else
        {
           $ApiStatus=0;
           $ApiMsg="No data found";
           $ApiErr=3;  

        }



        }
        else
        {

             $ApiStatus=0;
             $ApiMsg="Invalid Parameters.";
             $ApiErr=2;


        }

        
        


   
}
else
{

             $ApiStatus=0;
             $ApiMsg="Invalid Parameters.";
             $ApiErr=1;
}

if($ApiStatus==1)
        {
           return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'result'=>$getPriceCat ]);   
        }
        else
        {
           return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]);   
        }
}
public function gymPackTabListPrice(Request $request)
{


  $inputs = file_get_contents("php://input");
       $data = json_decode($inputs);
       $ApiStatus=0;
       $ApiMsg="";
       $ApiErr=0;



 if(isset($data->operation)) 
 {

      if($data->operation=="gymPackTabList" && isset($data->user->catid) && isset($data->user->gymid))
        {

        $Cat  = $data->user->catid;  
           $Rwids = $data->user->gymid;
 
          $getMinPriceCatCnt=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$Cat)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_price.active',1)
                      ->where('gym_package_master.user_id',$Rwids)
                      ->count(array('gym_package_master.pak_id'));

                      if($getMinPriceCatCnt>0)
                      {


                        $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$Cat)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_price.active',1)
                      ->where('gym_package_master.user_id',$Rwids)->orderBy('min_price',"ASC")
                      ->get(array(DB::raw("gym_package_price.price AS min_price"),'gym_package_master.pak_id','gym_package_master.cat_id','gym_package_price.pak_price_id','gym_package_price.pack_desc','gym_package_price.tra_id','gym_package_price.dur_id'));

                      if($getMinPriceCat[0]->min_price>0 && $getMinPriceCat[0]->pak_id>0 && $getMinPriceCat[0]->min_price !="" && $getMinPriceCat[0]->pak_id !="" )
                        {


                           $getTotPackage=DB::table('gym_package_master')
                    ->where('gym_package_master.user_id',$Rwids)
                    ->where('gym_package_master.cat_id',$Cat)
                    ->where('gym_package_master.active',1)
                    ->get(array('gym_package_master.package_name','gym_package_master.pak_id'
                      ,DB::raw( $getMinPriceCat[0]->pak_id." AS SelePack")));

                       $getListMinPackage=DB::table('gym_package_price')
                    ->where('gym_package_price.pak_id',$getMinPriceCat[0]->pak_id)
                    ->where('gym_package_price.active',1)
                    ->get(array('gym_package_price.pak_price_id','gym_package_price.pak_id'
                      ,'gym_package_price.pack_desc','gym_package_price.tra_id','gym_package_price.dur_id','gym_package_price.price','gym_package_price.active'));

                            $ApiStatus=1;
                            $ApiMsg="success";
                        
                        
                        }
                        else
                        {
                        $ApiStatus=0;
                        $ApiMsg="No data found.";
                        $ApiErr=4;


                        }


 



                      }
                      else
                      {

                        $ApiStatus=0;
                        $ApiMsg="No data found.";
                        $ApiErr=3;
                      }



                      

                      

        }
        else
        {

             $ApiStatus=0;
      $ApiMsg="Invalid Parameters.";
      $ApiErr=2;

        }

  }
  else
  {
      $ApiStatus=0;
      $ApiMsg="Invalid Parameters.";
      $ApiErr=1;

  }

  if($ApiStatus==1)
        {
           return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'result'=>$getTotPackage,'result1'=>$getListMinPackage ]);   
        }
        else
        {
           return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr ]);   
        }


 
}
public function paymentChkfinals(Request $request)
{

   $inputs = file_get_contents("php://input");
   $data = json_decode($inputs);
   $ApiStatus=0;
   $ApiMsg="";
   $ApiErr=0;
   if(isset($data->operation) && isset($data->user->mobile) && isset($data->user->emailid) && isset($data->user->cname) && isset($data->user->hidrows) && ($data->user->paymode)) 
   {

      if($data->operation=="paymentGateway" && $data->user->mobile !=""  && $data->user->emailid !="" &&  $data->user->hidrows >0 && $data->user->paymode !="" && $data->user->cname !="")
      {

          $priceId=$data->user->hidrows;
          $emailid=$data->user->emailid;
          $mobile=$data->user->mobile;
          $cName=$data->user->cname;

          $chkPriceRwValidCnt=DB::table('gym_package_price')
                                ->where('pak_price_id',$priceId)
                                ->where('active',1)->count(array('pak_price_id'));

          if($chkPriceRwValidCnt>0)
          {

             $chkPriceRwValid=DB::table('gym_package_price')
                                ->where('pak_price_id',$priceId)
                                ->get(array('pak_price_id','pak_id','pack_desc',
                                  'tra_id','dur_id','price',
                                  DB::raw('""  as GymName'),
                                  DB::raw('""  as Category'),
                                  DB::raw('""  as UserID'),
                                  DB::raw('""  as PakName')
                                  ));
             $GymPakIDChk=$chkPriceRwValid[0]->pak_id;
             $getPakageCnt=DB::table('gym_package_master')
              ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
              ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
              ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
              ->where('gym_package_price.pak_price_id',$priceId)
              ->where('gym_package_master.pak_id',$GymPakIDChk)
              ->where('gym_package_master.active',1)
              ->where('gym_package_price.active',1)
              ->where('admins.active',1)
              ->count(array('gym_package_master.pak_id'));
              if($getPakageCnt>0 )
              {

                $getPakage=DB::table('gym_package_master')
                        ->leftjoin('admins','admins.id','=','gym_package_master.user_id')
                        ->leftjoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                        ->leftJoin('gym_category_master','gym_category_master.cat_id','=','gym_package_master.cat_id')
                        ->where('gym_package_price.pak_price_id',$priceId)
                        ->where('gym_package_master.pak_id',$GymPakIDChk)
                        ->where('gym_package_master.active',1)
                        ->where('gym_package_price.active',1)
                        ->where('admins.active',1)
                        ->get(array('gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.abt_package','gym_package_master.user_id','gym_category_master.cat_name','admins.name','gym_package_master.cat_id'));

                        $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));
                        $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
                        $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
                        $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
                        $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;
                        $trans_id=uniqid().time(); 
                        $secret_key=$PayKey[0]->secret_key; 
                        $curDate=date('Y-m-d h:i:s');
                        $vanityUrl=$PayKey[0]->vanityUrl; 
                        $orderAmount=$chkPriceRwValid[0]->price;
                        $currency=$PayKey[0]->currency; 
                        $data=$vanityUrl.$orderAmount.$trans_id.$currency; 
                        $securitySignature = hash_hmac('sha1', $data, $secret_key);
                        $postArr['formPostUrl']=$PayKey[0]->postUrl;
                        $postArr['secret_key']=$secret_key;
                        $postArr['vanityUrl']=$vanityUrl;
                        $postArr['merchantTxnId']=$trans_id;
                        $postArr['orderAmount']=$orderAmount;
                        $postArr['currency']=$currency;
                        $postArr['data']=$vanityUrl.$orderAmount.$trans_id.$currency;
                        $postArr['returnURL']="http://alivefitnez.com/public/paymentPgResp";
                        //$postArr['returnURL']="http://localhost/gym/public/paymentPgResp";
                        
                        $postArr['securitySignature']=$securitySignature;
                        $postArr['email']=$emailid;
                        $postArr['mobile']=$mobile;
                       
                        $GetCountTrackId=DB::table('gym_payment_master')
                               ->where('trans_id',$trans_id)
                               ->count(array('cus_pay_id'));
                        if($GetCountTrackId==0)
                        {
                        $saveTbl=DB::table('gym_payment_master')->insert(
                        ["user_id" => $getPakage[0]->user_id, "pak_id" => $getPakage[0]->pak_id,"cat_id"=> $getPakage[0]->cat_id,"price_id"=> $priceId,"pak_name"=> $getPakage[0]->package_name,"cat_name"=> $getPakage[0]->cat_name,"price"=> $chkPriceRwValid[0]->price,"pack_desc"=> $chkPriceRwValid[0]->pack_desc,"req_date"=> $curDate,"user_email"=> $emailid,"user_mobile"=> $mobile,"trans_id"=>$trans_id,"customer_name"=>$cName,"web_app_pay"=>"1" ]
                        );

                        $ApiStatus=1;
                        $ApiMsg="success.";
                        
                        
                        return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'result'=>$postArr ]); 
                        exit;
                       
                        }      


                      




              }
              else
              {

                 $ApiStatus=0;
                 $ApiMsg="No data found";
                 $ApiErr=4;


              }




          } 
          else
          {

             $ApiStatus=0;
             $ApiMsg="No data found";
             $ApiErr=3;


          }                    


      }
      else
      {

         $ApiStatus=0;
         $ApiMsg="Invalid Parameters.";
         $ApiErr=2;

      }




   }
   else
   {

      $ApiStatus=0;
      $ApiMsg="Invalid Parameters.";
      $ApiErr=1;
   }

   return response()->json(['status'=>$ApiStatus, 'message'=>$ApiMsg,'err'=>$ApiErr,'result'=>'ok' ]);   
       
   



}

public function paymentResponse(Request $request)
{


  $data = "";
   $flag = "true";
   $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));

   $secret_key =$PayKey[0]->secret_key;  
   $ResultArr=array();
   $txnid='';
   $txnstatus='';
   $amount='';
   $pgtxnno='';
   $issuerrefno='';
   $firstName='';
   $lastName='';
   $pgrespcode='';
   $signature='';
   $authidcode='';

   if($request->has('TxId')) {
    $txnid = $request->input('TxId');
    $data .= $txnid;
    $ResultArr['TxId']=$txnid;
  }
  else
  {
   $ResultArr['TxId']=$txnid;
  }
   if($request->has('TxStatus')) {
    $txnstatus = $request->input('TxStatus');
    $data .= $txnstatus;
     $ResultArr['TxStatus']=$txnstatus;
   }
   else
  {
    $ResultArr['TxStatus']=$txnstatus; 
  }

   if($request->has('amount')) {
    $amount = $request->input('amount');
    $data .= $amount;
     $ResultArr['amount']=$amount;
   }
   else
  {
   $ResultArr['amount']=$amount; 
  }
   if($request->has('pgTxnNo')) {
    $pgtxnno = $request->input('pgTxnNo');
    $data .= $pgtxnno;
     $ResultArr['pgTxnNo']=$pgtxnno;
   }
   else
  {
    $ResultArr['pgTxnNo']=$pgtxnno;
  }
   if($request->has('issuerRefNo')) {
    $issuerrefno = $request->input('issuerRefNo');
    $data .= $issuerrefno;
     $ResultArr['issuerRefNo']=$issuerrefno;
   }
   else
  {
    $ResultArr['issuerRefNo']=$issuerrefno;
  }
   if($request->has('authIdCode')) {
    $authidcode = $request->input('authIdCode');
    $data .= $authidcode;
     $ResultArr['authIdCode']=$authidcode;
   }
   else
  {
    $ResultArr['authIdCode']=$authidcode;
  }
   if($request->has('firstName')) {
    $firstName = $request->input('firstName');
    $data .= $firstName;
     $ResultArr['firstName']=$firstName;
   }
   else
  {
    $ResultArr['firstName']=$firstName;
  }
   if($request->has('lastName')) {
    $lastName = $request->input('lastName');
    $data .= $lastName;
     $ResultArr['lastName']=$lastName;
   }
   else
  {
    $ResultArr['lastName']=$lastName;
  }
   if($request->has('pgRespCode')) {
    $pgrespcode = $request->input('pgRespCode');
    $data .= $pgrespcode;
     $ResultArr['pgRespCode']=$pgrespcode;
   }
   else
  {
    $ResultArr['pgRespCode']=$pgrespcode;
  }
   if($request->has('addressZip')) {
    // $pincode = $request->input('addressZip');
    // $data .= $pincode;
    //  $ResultArr['addressZip']=$pincode;
   }
   else
  {
    //$ResultArr['addressZip']=$pincode;
  }
   if($request->has('signature')) {
    $signature = $request->input('signature');
   }


   $respSignature = hash_hmac('sha1', $data, $secret_key);
 
   if($signature != "" && strcmp($signature, $respSignature) != 0) {
    $flag = "false";

   }
   else
   {
 
         return response()->json(['status'=>1, 'message'=>'succc','err'=>0,'result'=>$ResultArr ]); 

   }



}

public function GetCategoryFeatList(Request $request) //get category and feature list for filter
{

  $inputs = file_get_contents("php://input");
  $data = json_decode($inputs);
  if(isset($data->operation))
  {
  	 if($data->operation=='catFutuList')
  	 {

        $getCatCnt=DB::table('gym_category_master')
                      ->where('gym_category_master.active',1)
                      ->count(array('gym_category_master.cat_id'));

        $getFeatCnt=DB::table('gym_features')
                      ->where('gym_features.active',1)
                      ->count(array('gym_features.fe_id'));             

        if($getCatCnt>0 &&  $getFeatCnt>0 )
        {

        	$getCat=DB::table('gym_category_master')
                      ->where('gym_category_master.active',1)
                      ->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));

          $getFet=DB::table('gym_features')
                      ->where('gym_features.active',1)
                      ->get(array('gym_features.fe_id','gym_features.features_name'));

         return response()->json(['status'=>1, 'message'=>'successssss.','err'=>44,'getCatResult'=>$getCat,'getFetResult'=>$getFet]);

        }   
        else{
        	return response()->json(['status'=>0, 'message'=>'No data found.','err'=>3]);
        }           

  	 }
  	 else
  	 {
        return response()->json(['status'=>0, 'message'=>'Invalid Parameters.','err'=>2]);
  	 }
      
  }
  else
  {

  	return response()->json(['status'=>0, 'message'=>'Invalid Parameters.','err'=>1]);
  }
 
}
public function samp(Request $request)
{

  $inputs = file_get_contents("php://input");
  $data = json_decode($inputs);
return response()->json(['status'=>1, 'message'=>'success.','otp'=>'dfdfdfdf','mobile'=>"9889898897"]);

} 
 
    

}
