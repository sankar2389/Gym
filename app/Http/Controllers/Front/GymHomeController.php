<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\Model\Gym_category;
use App\Model\Gym_features;
use App\Model\GymType;
use Response; 
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Mail;


class GymHomeController extends Controller
{

	public function index()
	{         $table = new Gym_category();
                  $getCategory=$table->select(array('cat_name','cat_id'))->where('active', '=', 1)->get();
                  $GymTypeTable=new GymType();
                  $getType=$GymTypeTable->select(array('type_id','type_name'))->where('active', '=', 1)->get(); 
                  
 
 		  return view('user.index',compact('getCategory','getfeatures','getType'));
	}
  public function gymList(Request $request)
  {
     if($request->has('pin') && $request->input('pin')!="" && $request->has('catType') && $request->input('catType')!=""  )
     {
        $pinCode=$request->input('pin');
        $catType=$request->input('catType') ; 
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
               ->where('gym_profile_master.pincode', $pinCode) 
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
                              ->where('gym_features_mapping.user_id',$keyIdVal->id)->where('gym_features.active',1)->limit(6)
                              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                              $userFeatResult="";      

                              if(count($usersFeat)>0)   
                              {
                              foreach ( $usersFeat  as $key => $valueFeat) 
                              {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                              }

                              $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
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

                       

                        $tableCat = new Gym_category();
                $getCategory=$tableCat->select(array('cat_name','cat_id'))->where('active', '=', 1)->get();
                $getTable = new gym_features(); 
                $getAllfeatures=$getTable->select(array('features_name','fe_id'))->where('active', '=', 1)->get();
     
                $GymTypeTable=new GymType();
                $getType=$GymTypeTable->select(array('type_id','type_name'))->where('active', '=', 1)->get(); 

                return view('user.gymlist',compact('getCategory','getgymFeatures','getAllfeatures','pinCode','catType','filterArrayList','getType'));    


                       

                       

 
            }
            else
            { 

                    Session::flash('message', 'No data found');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

            } 

     }
     else
     {  
       
        return Redirect::to('/home');

     }


  }


        

public function gymFilterList(Request $request)
{

       $input=Input::all();
       $catType=$input['hid_type'];
       $pinCode=$input['hid_pin'];
       $Catids=$input['catids'];
       $Feaids=$input['feaids'];



       

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
                                 
//print_r($getValidUserList);



      //if(count($getValidUserList)>0) 
  if($getValidUserListCnt>0)
	{

	}
	else
	{       $result['error']=0; 
		$result['errMsg']="No data found";
		echo json_encode($result);
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
     //print_r($ResultCat);
    // print_r($ResultFet);
//exit;
    if(count($ResultCat)>0 && count($ResultFet)>0 )
    {
       $arrF = array_intersect($ResultCat,$ResultFet);
       
       $arrF = array_values($arrF);
   
    }
    else
    {

      $result['error']=0; 
      $result['errMsg']="bot not null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="Both Null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="cat not fet null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="cat   null && fet not null";
      echo json_encode($result);
      exit;

    }
   
  }
  else{

    $result['error']=0; 
      $result['errMsg']="final else";
      echo json_encode($result);
      exit;

  }

// echo "<pre>";print_r($arrF);
   if(count($arrF)>0)
   {


       for($k=0;$k<count($arrF);$k++)
      {
          $encriId=encrypt($arrF[$k]);
 $getFinalValidUserList=Admin::leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                           ->where('admins.active', 1)
                           ->where('admins.id', $arrF[$k])
                          ->where('gym_type_mapping.type_id', $catType)
                           ->where('gym_profile_master.pincode', $pinCode) 
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


                         $ListCategory="";
                        
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
                    $ListCategory.=$valCt->cat_id;
                  }
                   //Get Minimum price calculate Hourly package: Without trainer
                  
                  
                  $getFinalValidUserList[0]->CategoryList=$getPackCategry;//$ListCategory;

                  $usersFeat = DB::table('gym_features_mapping')
                ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                ->where('gym_features_mapping.user_id',$arrF[$k])->where('gym_features.active',1)->limit(6)
              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                $userFeatResult=""; 

                 if(count($usersFeat)>0)   
                      {
                        foreach ( $usersFeat  as $key => $valueFeat) 
                          {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                          }

                          $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
                      }
                      else
                      {
                         $getFinalValidUserList[0]->featuresData=''; 
 
                      } 

                      $GetWorkHr=DB::table('gym_working_hour')
                                    ->where('user_id',$arrF[$k])
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
                     $filterArrayList[]=$getFinalValidUserList;  
 

                      






                        }
 

         }

         
     if(count($filterArrayList)>0)
              {

    $result['error']=1;
          $result['result']=$filterArrayList; 
          echo json_encode($result);
            exit;
              }
              else{

                $result['error']=0; 
          $result['errMsg']="Error on no date with filteration";
    echo json_encode($result);
    exit;


                 }


   }
   else
   {

    $result['error']=0; 
    $result['errMsg']="final emptys";
    echo json_encode($result);
    exit;


   }


 /*
   if(count($arrF)>0)
   {

     
      for($k=0;$k<count($arrF);$k++)
      {
          $encriId=encrypt($arrF[$k]);
          $getFinalValidUserList=Admin::leftJoin('gym_profile_master', 
		'admins.id', '=', 'gym_profile_master.user_id')
                           ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')

                           ->where('admins.active', 1)
                           ->where('admins.id', $arrF[$k])
			                    ->where('gym_type_mapping.type_id', $catType)
                           ->where('gym_profile_master.pincode', $pinCode) 
                           ->get(array( 
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
                                DB::raw('""  as CategoryPrice') 
                                )
 				);
   


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

				
			}
			else
			{
				$imageBann="images.jpeg";
			}

                       $getFinalValidUserList[0]->image=$imageBann;

			 $ListCategory="";

			$getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$arrF[$k])->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_name'));

			foreach($getPackCategry as $valCt)
			{
			$ListCategory.=$valCt->cat_name.'|';

			}
			$getFinalValidUserList[0]->CategoryList=$ListCategory;  


     /* $ListCategory="";
                        
                       $getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$arrF[$k])->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));
  
                  foreach($getPackCategry as $valCt)
                  {
                    

                     
                  $ListCategory.=$valCt->cat_id;
                  }
                   //Get Minimum price calculate Hourly package: Without trainer
                  $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',2)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_master.user_id',$arrF[$k])->orderBy('min_price', 'DESC')
                      ->take(1)->get(array(DB::raw("MIN(gym_package_price.price) AS min_price")));
                  if(isset($getMinPriceCat[0]))
                  { 
                     $getFinalValidUserList[0]->CategoryPrice=$getMinPriceCat[0]->min_price;
                  }
                  $getFinalValidUserList[0]->CategoryList=$getPackCategry;//$ListCategory;
            */

              /*      $usersFeat = DB::table('gym_features_mapping')
            		->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
            		->where('gym_features_mapping.user_id',$arrF[$k])->where('gym_features.active',1)
           		->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                      $userFeatResult="";      
                      
		     if(count($usersFeat)>0)   
                      {
                        foreach ( $usersFeat  as $key => $valueFeat) 
                          {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                          }

                          $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
                      }
                      else
                      {
                         $getFinalValidUserList[0]->featuresData='';//$imageBann;
 
                      }

                      $GetWorkHr=DB::table('gym_working_hour')
                                    ->where('user_id',$arrF[$k])
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
                     
 


                   
               		$filterArrayList[]=$getFinalValidUserList;  
               
              }

        }


      

     if(count($filterArrayList)>0)
              {

 		$result['error']=1;
        	$result['result']=$filterArrayList; 
       		echo json_encode($result);
          	exit;
              }
              else{

                $result['error']=0; 
         	$result['errMsg']="Error on no date with filteration";
	 	echo json_encode($result);
		exit;


                 }


   }
   else
   {

    $result['error']=0; 
    $result['errMsg']="final empty";
    echo json_encode($result);
    exit;

   }  
 */
}
public function gymFilterListYoga(Request $request)
{

       $input=Input::all();
       $catType=$input['hid_type'];
       $pinCode=$input['hid_pin'];
       $Catids=$input['catids'];
       $Feaids=$input['feaids'];



       

$getValidUserListCnt=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                   ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                   ->where('gym_type_mapping.type_id', $catType)
                   ->where('admins.active', 1)
                   ->where('gym_package_master.cat_id',1) //check economic pack must
                   //->where('gym_profile_master.pincode',$pinCode) 
                   ->where('gym_package_master.active',1)->distinct()
                   ->count(array('admins.id'));

                   

 $getValidUserList=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                   ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                   ->where('gym_type_mapping.type_id', $catType)
                   ->where('admins.active', 1)
                   ->where('gym_package_master.cat_id',1) //check economic pack must
                   //->where('gym_profile_master.pincode',$pinCode) 
                   ->where('gym_package_master.active',1)->distinct()
                   ->get(array('admins.id'));  
                                 
//print_r($getValidUserList);



      //if(count($getValidUserList)>0) 
  if($getValidUserListCnt>0)
  {

  }
  else
  {       $result['error']=0; 
    $result['errMsg']="No data found";
    echo json_encode($result);
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
     //print_r($ResultCat);
    // print_r($ResultFet);
//exit;
    if(count($ResultCat)>0 && count($ResultFet)>0 )
    {
       $arrF = array_intersect($ResultCat,$ResultFet);
       
       $arrF = array_values($arrF);
   
    }
    else
    {

      $result['error']=0; 
      $result['errMsg']="bot not null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="Both Null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="cat not fet null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="cat   null && fet not null";
      echo json_encode($result);
      exit;

    }
   
  }
  else{

    $result['error']=0; 
      $result['errMsg']="final else";
      echo json_encode($result);
      exit;

  }

// echo "<pre>";print_r($arrF);
   if(count($arrF)>0)
   {


       for($k=0;$k<count($arrF);$k++)
      {
          $encriId=encrypt($arrF[$k]);
 $getFinalValidUserList=Admin::leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                           ->where('admins.active', 1)
                           ->where('admins.id', $arrF[$k])
                          ->where('gym_type_mapping.type_id', $catType)
                           //->where('gym_profile_master.pincode', $pinCode) 
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


                         $ListCategory="";
                        
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
                    $ListCategory.=$valCt->cat_id;
                  }
                   //Get Minimum price calculate Hourly package: Without trainer
                  
                  
                  $getFinalValidUserList[0]->CategoryList=$getPackCategry;//$ListCategory;

                  $usersFeat = DB::table('gym_features_mapping')
                ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                ->where('gym_features_mapping.user_id',$arrF[$k])->where('gym_features.active',1)->limit(6)
              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                $userFeatResult=""; 

                 if(count($usersFeat)>0)   
                      {
                        foreach ( $usersFeat  as $key => $valueFeat) 
                          {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                          }

                          $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
                      }
                      else
                      {
                         $getFinalValidUserList[0]->featuresData=''; 
 
                      } 

                      $GetWorkHr=DB::table('gym_working_hour')
                                    ->where('user_id',$arrF[$k])
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
                     $filterArrayList[]=$getFinalValidUserList;  
 

                      






                        }
 

         }

         
     if(count($filterArrayList)>0)
              {

    $result['error']=1;
          $result['result']=$filterArrayList; 
          echo json_encode($result);
            exit;
              }
              else{

                $result['error']=0; 
          $result['errMsg']="Error on no date with filteration";
    echo json_encode($result);
    exit;


                 }


   }
   else
   {

    $result['error']=0; 
    $result['errMsg']="final emptys";
    echo json_encode($result);
    exit;


   }
 
}

public function gymFilterListAero(Request $request)
{

       $input=Input::all();
       $catType=$input['hid_type'];
       $pinCode=$input['hid_pin'];
       $Catids=$input['catids'];
       $Feaids=$input['feaids'];



       

$getValidUserListCnt=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                   ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                   ->where('gym_type_mapping.type_id', $catType)
                   ->where('admins.active', 1)
                   ->where('gym_package_master.cat_id',1) //check economic pack must
                   //->where('gym_profile_master.pincode',$pinCode) 
                   ->where('gym_package_master.active',1)->distinct()
                   ->count(array('admins.id'));

                   

 $getValidUserList=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                   ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                   ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                   ->where('gym_type_mapping.type_id', $catType)
                   ->where('admins.active', 1)
                   ->where('gym_package_master.cat_id',1) //check economic pack must
                   //->where('gym_profile_master.pincode',$pinCode) 
                   ->where('gym_package_master.active',1)->distinct()
                   ->get(array('admins.id'));  
                                 
//print_r($getValidUserList);



      //if(count($getValidUserList)>0) 
  if($getValidUserListCnt>0)
  {

  }
  else
  {       $result['error']=0; 
    $result['errMsg']="No data found";
    echo json_encode($result);
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
     //print_r($ResultCat);
    // print_r($ResultFet);
//exit;
    if(count($ResultCat)>0 && count($ResultFet)>0 )
    {
       $arrF = array_intersect($ResultCat,$ResultFet);
       
       $arrF = array_values($arrF);
   
    }
    else
    {

      $result['error']=0; 
      $result['errMsg']="bot not null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="Both Null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="cat not fet null";
      echo json_encode($result);
      exit;

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

      $result['error']=0; 
      $result['errMsg']="cat   null && fet not null";
      echo json_encode($result);
      exit;

    }
   
  }
  else{

    $result['error']=0; 
      $result['errMsg']="final else";
      echo json_encode($result);
      exit;

  }

// echo "<pre>";print_r($arrF);
   if(count($arrF)>0)
   {


       for($k=0;$k<count($arrF);$k++)
      {
          $encriId=encrypt($arrF[$k]);
 $getFinalValidUserList=Admin::leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                           ->where('admins.active', 1)
                           ->where('admins.id', $arrF[$k])
                          ->where('gym_type_mapping.type_id', $catType)
                           //->where('gym_profile_master.pincode', $pinCode) 
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


                         $ListCategory="";
                        
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
                    $ListCategory.=$valCt->cat_id;
                  }
                   //Get Minimum price calculate Hourly package: Without trainer
                  
                  
                  $getFinalValidUserList[0]->CategoryList=$getPackCategry;//$ListCategory;

                  $usersFeat = DB::table('gym_features_mapping')
                ->leftJoin('gym_features', 'gym_features.fe_id', '=', 'gym_features_mapping.fe_id')
                ->where('gym_features_mapping.user_id',$arrF[$k])->where('gym_features.active',1)->limit(6)
              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                $userFeatResult=""; 

                 if(count($usersFeat)>0)   
                      {
                        foreach ( $usersFeat  as $key => $valueFeat) 
                          {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                          }

                          $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
                      }
                      else
                      {
                         $getFinalValidUserList[0]->featuresData=''; 
 
                      } 

                      $GetWorkHr=DB::table('gym_working_hour')
                                    ->where('user_id',$arrF[$k])
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
                     $filterArrayList[]=$getFinalValidUserList;  
 

                      






                        }
 

         }

         
     if(count($filterArrayList)>0)
              {

    $result['error']=1;
          $result['result']=$filterArrayList; 
          echo json_encode($result);
            exit;
              }
              else{

                $result['error']=0; 
          $result['errMsg']="Error on no date with filteration";
    echo json_encode($result);
    exit;


                 }


   }
   else
   {

    $result['error']=0; 
    $result['errMsg']="final emptys";
    echo json_encode($result);
    exit;


   }
 
}
public function gymChangeCatAjx(Request $request)
{

$catids = $request->input('catids');
$UserId = $request->input('Rwids');
$pkId = $request->input('pkId');
$result['error']=0;
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
                                  'gym_package_master.package_name','gym_package_price.pak_price_id',
                                   'gym_package_master.abt_package'
                                  ));

      $result['error']=1;
      $result['resultSet']=$getPriceCat ;               

                      


  }
  else
  {

      $result['error']=0;


  }                    

  echo json_encode($result)  ;                  




}

public function gymChoseList(Request $request)
{ 
               
  $uesr_id = $request->input('hid_curPak');
  $hidcat=$request->input('hid_CurCat');
  
 
    if($uesr_id>0 && $uesr_id !="") 
    {
       
       if($hidcat>0)
       {
 

 $getParticularGymListCnt=Admin::leftJoin('gym_package_master','admins.id', '=', 'gym_package_master.user_id')
                ->leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')
                ->where('admins.active', 1)
                ->where('admins.id', $uesr_id)
                ->where('gym_package_master.active', 1) 
                ->count(array('gym_package_master.pak_id'));


                if($getParticularGymListCnt>0)
              {


                $getParticularGymList=Admin::leftJoin('gym_package_master','admins.id', '=', 'gym_package_master.user_id')
                ->leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')
                ->where('admins.active', 1)
                ->where('admins.id', $uesr_id)
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
                                DB::raw('""  as Banner'),

                                 ));

              foreach($getParticularGymList as $value){


                  $getPackCategry=DB::table('gym_package_master')->leftJoin('gym_category_master','gym_package_master.cat_id','=','gym_category_master.cat_id')->where('gym_package_master.user_id',$value->id)->orderBy('gym_category_master.cat_id','ASC')->where('gym_package_master.active',1)->distinct()->get(array('gym_category_master.cat_id','gym_category_master.cat_name'));
                
               
                  foreach($getPackCategry as $key=>$valCt)
                  {
                     if($key==0)
                    {
                       
                      $getMinPriceCatCnt=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$hidcat)
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
                          return redirect('/home')->send();
                          exit;

                      }

                      $GetGymBannerCnt=DB::table('gym_banner_master')
                      ->where("user_id",$value->id)
                      ->where("active",1)
                      ->count(array("ban_id"));
 
                      if($GetGymBannerCnt >0)
                      {
                        $GetGymBanner=DB::table('gym_banner_master')
                      ->where("user_id",$value->id)
                      ->where("active",1) 
                      ->get(array("img_path"));

                        $getParticularGymList[0]->Banner=$GetGymBanner;
 

                      }
                      else
                      { 
                          $getParticularGymList[0]->Banner=array(); 
                      }

                      

                      $getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$hidcat)
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
                    ->where('gym_package_master.cat_id',$hidcat)
                    ->where('gym_package_master.active',1)
                    ->get(array('gym_package_master.package_name','gym_package_master.pak_id'
                      ,DB::raw( $getMinPriceCat[0]->pak_id." AS SelePack")));

                    $getParticularGymList[0]->TotPakList=$getTotPackage;

                    $getPriceCntCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.pak_id','=',$getMinPriceCat[0]->pak_id)
                      ->where('gym_package_master.cat_id','=',$hidcat)
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
                      ->where('gym_package_master.cat_id','=',$hidcat)
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
                       

                    //    echo "<pre>" ; print_r($getPriceCat);

                       $getParticularGymList[0]->PriceList=$getPriceCat;

                     // echo "<pre>" ; print_r($getParticularGymList[0]->PriceList);

                   }
                   else
                   {

                      return redirect('/home')->send();
                         

                   }
                       

                    
                    }
                    else{
                         
                         return redirect('/home')->send();
                         

                    }


                    }            
                       
                  }  
                   //Get Minimum price calculate Hourly package: Without trainer
                  
                  
                   $getParticularGymList[0]->CategoryList=$getPackCategry; 


                  $imageBann='';

                     $Getbanner=DB::table('gym_banner_master')
                                   ->where('user_id',$value->id)->where('active',1)->take(1)->get(array('img_path'));
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

                            $userFeatResult="";      
                            
               if(count($usersFeat)>0)   
                            {
                              foreach ( $usersFeat  as $key => $valueFeat) 
                                {
                                    $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                                }

                                $getParticularGymList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
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
    else{


        return redirect('/home')->send();



    }





 
 
                          return view('user.GymPackList',compact('getParticularGymList','hidcat'));


       }
       else
       {
          return redirect('/home')->send(); 
       }

    }
    else
    {
       return redirect('/home')->send(); 
    }
 

  }
public function gymListTabAjx(Request $request)
{

  $Cat  = $request->input('Cat');
  $Rwids = $request->input('Rwids');
  $result['error']=0;
  if($Cat>0 && $Rwids >0)
  {

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
                    ->get(array('gym_package_master.package_name',
                      'gym_package_master.abt_package',
                      'gym_package_master.pak_id'
                      ,DB::raw( $getMinPriceCat[0]->pak_id." AS SelePack")));
                    //chages for abt_package augest 3rd

                    //print_r($getTotPackage);
                    //print_r($getMinPriceCat);

                     $result['error']=1;
                     $result['getTotPackage']=$getTotPackage;

                      $getListMinPackage=DB::table('gym_package_price')
                    ->where('gym_package_price.pak_id',$getMinPriceCat[0]->pak_id)
                    ->where('gym_package_price.active',1)
                    ->get(array('gym_package_price.pak_price_id','gym_package_price.pak_id'
                      ,'gym_package_price.pack_desc','gym_package_price.tra_id','gym_package_price.dur_id','gym_package_price.price','gym_package_price.active'));

                     $result['getListMinPackage']=$getListMinPackage;



                       }
                       else
                       {

                       $result['error']=0; 
                       }



                      }
                      else
                      {
                        $result['error']=0;

                      }

                      echo json_encode($result);

  }


}

public function gymChoseList_old(Request $request)
{ 
      
       $request->segment(2);
       $decrypted_uesr_id = decrypt($request->segment(2));
 
       if($decrypted_uesr_id>0)
       {


            /* $getFinalValidUserList=Admin::leftJoin('gym_profile_master', 
		'admins.id', '=', 'gym_profile_master.user_id')
                           ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                           ->where('admins.active', 1)
                           ->where('admins.id', $arrF[$k])
			   ->where('gym_category_mapping.cat_id', $catType)
                           ->where('gym_profile_master.pincode', $pinCode) 
                           ->get(array( 
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
                                DB::raw('""  as CategoryList')
                                )
 				);
                    */


$getParticularGymList=Admin::leftJoin('gym_package_master','admins.id', '=', 'gym_package_master.user_id')
                ->leftJoin('gym_profile_master','admins.id', '=', 'gym_profile_master.user_id')
               // ->leftJoin('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                ->where('admins.active', 1)
                ->where('admins.id', $decrypted_uesr_id)
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
                                DB::raw('""  as PriceList') ));


    if(count($getParticularGymList)>0)
    {

       foreach($getParticularGymList as $value){

               $Getbanner=DB::table('gym_banner_master')
                             ->where('user_id',$value->id)->where('active',1)->take(1)->get(array('img_path'));
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

                      $userFeatResult="";      
                      
		     if(count($usersFeat)>0)   
                      {
                        foreach ( $usersFeat  as $key => $valueFeat) 
                          {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                          }

                          $getParticularGymList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
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

     $getPakPriceList=DB::table('gym_package_master')
               ->leftJoin('gym_package_price','gym_package_master.pak_id','=','gym_package_price.pak_id')
               ->where('gym_package_master.user_id',$value->id)
               ->where('gym_package_master.pak_id',$value->pak_id)
               ->get(array('gym_package_price.pack_desc','gym_package_price.price')) ;
                     
              $getParticularGymList[0]->PriceList=$getPakPriceList;

            }

  

    }
    else{


        return redirect('/home')->send();



    }




           return view('user.GymPackList',compact('getParticularGymList'));
         


       }
       else
       {

         return redirect('/home')->send();


       } 

       
}
public function gymPaidResponse(Request $request)
{
 //$secret_key = "438df3bb8610de105c18687badb5556c220db5f5"; //for sandbox

$secret_key = "556e33423e971f6106d5e1c68fa3ffc468ad65eb";
	 
	$data = "";
	$flag = "true";
	//if(isset($request->input('TxId'))) {
		$txnid = $request->input('TxId');
		$data .= $txnid.'   ';
	//}
	// if(isset($request->input('TxStatus'))) {
		$txnstatus = $request->input('TxStatus');
		$data .= $txnstatus;
	// }

           
		$amount = $request->input('amount');
		$data .= $amount;
	 
	 
		$pgtxnno = $request->input('pgTxnNo');
		$data .= $pgtxnno;
	 
	 
		$issuerrefno = $request->input('issuerRefNo');
		$data .= $issuerrefno;
	 
	  
		$authidcode = $request->input('authIdCode');
		$data .= $authidcode;
	 
	 
		$firstName = $request->input('firstName');
		$data .= $firstName;
	 
	 
		$lastName =$request->input('lastName');
		$data .= $lastName;
	 
	 
		$pgrespcode = $request->input('pgRespCode');
		$data .= $pgrespcode;
	 
	 
		$pincode = $request->input('addressZip');
		$data .= $pincode;
	 
	 
		$signature = $request->input('signature');
	 
	 
    $respSignature = hash_hmac('sha1', $data, $secret_key);
	 if($signature != "" && strcmp($signature, $respSignature) != 0) {
		$flag = "false";
	 }


  echo $flag.'=='.$data;


}

public function gymCatAjxPrice(Request $request)
{

 $catId= $request['catids'];
 $UserId=$request['Rwids'] ;


$getMinPriceCat=DB::table('gym_package_master')->leftJoin
                      ('gym_package_price','gym_package_price.pak_id','=','gym_package_master.pak_id')
                      ->where('gym_package_master.cat_id',$catId)
                      ->where('gym_package_master.active',1)
                      ->where('gym_package_price.tra_id',2) 
                      ->where('gym_package_price.dur_id',1)
                      ->where('gym_package_master.user_id',$UserId)->orderBy('min_price', 'DESC')
                      ->take(1)->get(array(DB::raw("MIN(gym_package_price.price) AS min_price")));

 if(count($getMinPriceCat)>0)
 {
    if($getMinPriceCat[0]->min_price)
    {
       echo $getMinPriceCat[0]->min_price;
       exit;
    }
    else
    {
       echo 0;
     
    }
 }
 else
 {
  
   echo 0;
   exit;

 }

  


 

}
public function paymentChkOuts(Request $request)
{

 

if($request->has('hidRw'))
{
      $priceId=$request['hidRw'];
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
              ->get(array('gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.abt_package','gym_package_master.user_id','gym_category_master.cat_name','admins.name'));

              $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
              $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
              $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
              $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;

           

              return view('user.GymPackChkoutList',compact('chkPriceRwValid'));
                                

        } 
        else
        {
         Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');
        }                        
             

    }
    else
    {
       Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

    }

     

    

}
else
  {

    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');
  }
 
 

}

public function finalPayCheck(Request $request)
{

  if($request->has('trackIds')){

    if($request['trackIds'] !="")
    {

      $trackIds=$request['trackIds'];

      $chkValidTrack=DB::table('gym_payment_master')->where('trans_id',$trackIds)->where('status',0)->whereNull('pay_result')->count();

      if($chkValidTrack==1)
      {
            echo 1;

      }
      else
      {

         echo 0;
      }

     }
    else
    {
       echo 0;
    }


  }
  else
  {
   echo 0;
  }



}

public function paymentChkfinalsOuts(Request $request)
{
   if($request->has('emailid') && $request->has('mobile') && $request->has('hidrows') &&  $request->has('cname') )
   {
 
        if( $request['emailid'] !="" && $request['mobile']>0 &&  $request['hidrows']>0 )
        {

          $priceId=$request['hidrows'];
          $emailid=$request['emailid'];
          $mobile=$request['mobile'];
          $gender=$request['gender'];
          $customeName=$request['cname'];

      
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

              $PayKey=DB::table('gym_payment_razor_key')->get(array('assKey'));
               
              $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
              $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
              $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
              $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;
              $passGymName=$getPakage[0]->name;
              $trans_id=uniqid().time(); 
              $secret_key=$PayKey[0]->assKey;
              $curDate=date('Y-m-d h:i:s');
              $orderAmount=$chkPriceRwValid[0]->price;
              $postArr['secret_key']=$secret_key;
              $postArr['merchantTxnId']=$trans_id;
              $postArr['orderAmount']=$orderAmount;
              $postArr['email']=$emailid;
              $postArr['mobile']=$mobile;         
              $GetCountTrackId=DB::table('gym_payment_master')
                               ->where('trans_id',$trans_id)
                               ->count(array('cus_pay_id'));
                               
               if($GetCountTrackId==0)
               {
                 $saveTbl=DB::table('gym_payment_master')->insert(
    ["user_id" => $getPakage[0]->user_id, "pak_id" => $getPakage[0]->pak_id,"cat_id"=> $getPakage[0]->cat_id,"price_id"=> $priceId,"pak_name"=> $getPakage[0]->package_name,"cat_name"=> $getPakage[0]->cat_name,"price"=> $chkPriceRwValid[0]->price,"pack_desc"=> $chkPriceRwValid[0]->pack_desc,"req_date"=> $curDate,"user_email"=> $emailid,"user_mobile"=> $mobile,"trans_id"=>$trans_id,"customer_name"=>$customeName,"gender"=>$gender ]
     );

                  $sendValue=DB::table('gym_payment_master')->where('trans_id',$trans_id)->get();
                  return view('user.checkout',compact('sendValue','passGymName','secret_key'));

               }
               else
               {

                    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

               }                 
              
  
        } 
        else
        {
         Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');
        }                        
             

    }

        
        


        }
        else
        {
             Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

        } 
        
   }
   else
   {

    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

   }

 }

    public function register()
    {    //echo $user = Auth::user();
    	 // return view('user.register');
    }

    public function postregister(Request $request)
    {  /** 
    	$validation =Validator::make($request->all(),array('name'=>'required',
    		'email'=>'required','password'=>'required','mobile'=>'required',
    		'address'=>'required'
    		));

    	     User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'remember_token'=>str_random(100),
                    'phonenumber' => $request['mobile'],
                    'address' => $request['address'],
                    'status' => 1
        ]);

        return redirect::back()->with('message','Registered Successfully');
      **/
    }

    public function getsignin()
    {
    	return view('user.login');
    }

public function termscondition()
{
 
  return view('user_include.terms');

}
public function aboutus()
{
 
  return view('user_include.aboutus');

}
public function privacys()
{
 
  return view('user_include.privacys');

}
public function Refunds()
{
 
  return view('user_include.Refunds');

}
public function Cancels()
{
 
  return view('user_include.Cancels');

}
public function Contacts()
{
 
  return view('user_include.Contacts');

}
public function login()
{
 
 return view('user.login');

}
public function myaccount()
{

return view('user.myAccount');
}
public function myAccHistory(Request $request)
{
    $getMobile=$request['mobile'];

    /*$GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where('gym_payment_master.user_mobile',$getMobile)->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id')); */

    $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->where('gym_payment_master.user_mobile',$getMobile)->orderBy('gym_payment_master.req_date','desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.cancel_status','gym_payment_master.status'));

     // $GetReport = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')->orderBy('gym_payment_master.req_date','desc')->get(array('gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id'));
     
     return view('user.myAccountView',compact('GetReport'));

   

}

public function paymentOffChkOuts(Request $request)
{



   if($request->has('emailid') && $request->has('mobile') && $request->has('hidrows') &&  $request->has('cname') )
   {

        if( $request['emailid'] !="" && $request['mobile']>0 &&  $request['hidrows']>0 )
        {

          $priceId=$request['hidrows'];
          $emailid=$request['emailid'];
          $mobile=$request['mobile'];
          $gender=$request['gender'];

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
              ->get(array('admins.email','gym_package_master.pak_id','gym_package_master.package_name','gym_package_master.abt_package','gym_package_master.user_id','gym_category_master.cat_name','admins.name','gym_package_master.cat_id'));

              $PayKey=DB::table('gym_payment_key')->get(array('secret_key','vanityUrl','currency','postUrl'));
              $chkPriceRwValid[0]->GymName=$getPakage[0]->name;
              $chkPriceRwValid[0]->Category=$getPakage[0]->cat_name;
              $chkPriceRwValid[0]->UserID=$getPakage[0]->user_id;
              $chkPriceRwValid[0]->PakName=$getPakage[0]->package_name;
              $postArr['gymName']=$getPakage[0]->name;
              $postArr['cat_name']=$getPakage[0]->cat_name;
              $postArr['PakName']=$getPakage[0]->package_name;

              $trans_id=uniqid().time(); 
              $secret_key=$PayKey[0]->secret_key; 
              $curDate=date('Y-m-d h:i:s');
              $vanityUrl=$PayKey[0]->vanityUrl; 
              $orderAmount=$chkPriceRwValid[0]->price;
              $currency=$PayKey[0]->currency; 
              $data=$vanityUrl.$orderAmount.$trans_id.$currency; 
              $securitySignature = hash_hmac('sha1', $data, $secret_key);
              $postArr['merchantTxnId']=$trans_id;
              $postArr['orderAmount']=$orderAmount;
              $postArr['currency']=$currency;
              $postArr['email']=$emailid;
              $postArr['mobile']=$mobile;
              $postArr['cname']=$request['cname'];
              $postArr['gender']=$gender;
              $postArr['pack_desc']=$chkPriceRwValid[0]->pack_desc;
              $customeName=$request['cname'];
              $adminEmail=$getPakage[0]->email;

              $GetCountTrackId=DB::table('gym_payment_master')
                               ->where('trans_id',$trans_id)
                               ->count(array('cus_pay_id'));
                               
               if($GetCountTrackId==0)
               {
                 $saveTbl=DB::table('gym_payment_master')->insert(
    ["user_id" => $getPakage[0]->user_id, "pak_id" => $getPakage[0]->pak_id,"cat_id"=> $getPakage[0]->cat_id,"price_id"=> $priceId,"pak_name"=> $getPakage[0]->package_name,"cat_name"=> $getPakage[0]->cat_name,"price"=> $chkPriceRwValid[0]->price,"pack_desc"=> $chkPriceRwValid[0]->pack_desc,"req_date"=> $curDate,"user_email"=> $emailid,"user_mobile"=> $mobile,"trans_id"=>$trans_id,"customer_name"=>$customeName,"pay_offline"=>1,"gender"=>$gender ] );

                  $TillValid=date('d-m-Y', strtotime("+7 days"));

              
      $data = array('email'=>$emailid, 
                    'first_name'=>$customeName, 
                    'from'=>'fitbeanzfitness@gmail.com',
                    'res_price'=>$chkPriceRwValid[0]->price.'.00',
                    'pak_name'=>$getPakage[0]->package_name,
                    'cat_name'=>$getPakage[0]->cat_name,
                    'GymName'=>$getPakage[0]->name,
                    'transId'=>$trans_id,
                    'payDt'=>date('d-m-Y'),
                    'user_mobile'=>$mobile,
                    'Adminemail'=>$adminEmail,
                    'TillValid'=>$TillValid,
                    'gender'=>$gender,
                    'pack_desc'=>$chkPriceRwValid[0]->pack_desc,
                    ); 

                  Mail::send('admin.emails.requestMail', $data, function($message) use ($data) {
                        $message->to($data['email'])->cc($data['Adminemail']); 
                        $message->replyTo($data['Adminemail'], $name = null); 
                        $message->subject('Alivefitnez Booking Request Details');
                        }); 
 
                

                   return view('user.offcheckout',compact('postArr'));

               }
               else
               {

                    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

               }                 
              
  
            
  
           

        


                                

        } 
        else
        {
         Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');
        }                        
             

    }

        
        


        }
        else
        {
             Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

        } 
        
   }
   else
   {

    Session::flash('message', 'Please try again');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

   }


 

}

public function paymentRazorResp(Request $request){

  $resultJson['error']=0;
  $resultJson['result']="";

  if($request->has('razorpay_payment_id') && $request->has('trackIds') &&   $request->has('mode') )
  {

    $pgtxnno=$request['razorpay_payment_id'];
    $txnid=$request['trackIds'];
    $txnstatus="";

    if($pgtxnno=="")
    {
        $txnstatus='FAILED';
    }
    else
    {

       $txnstatus='SUCCESS';

    }

    $GetCountTrackId=DB::table('gym_payment_master')
                                ->where('trans_id',$txnid)
                                 ->where('status',0)
                                ->count(array('cus_pay_id'));
    if($GetCountTrackId==1)
    {




        $GetUpdateTrackId=DB::table('gym_payment_master')
            ->where('trans_id', $txnid)
            ->update(['status' =>1,'pay_result'=>$txnstatus,'res_trans_id'=>$pgtxnno ]);
        /*Mail function start*/

         $GetReportResult = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.trans_id',$txnid)
               ->where('gym_payment_master.status',1)
               ->get(array('admins.email','gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id','gym_payment_master.gender','gym_payment_master.pack_desc'));
  
                $mailid=$GetReportResult[0]->user_email;
                $adminEmail=$GetReportResult[0]->email;
                $UName=$GetReportResult[0]->customer_name;
                $res_price=$GetReportResult[0]->price;
                $pay_result=$GetReportResult[0]->pay_result;
                $res_trans_id=$GetReportResult[0]->res_trans_id;
                $pak_name=$GetReportResult[0]->pak_name;
                $cat_name=$GetReportResult[0]->cat_name;
                $GymName=$GetReportResult[0]->name;
                $payDt=date('d-m-Y', strtotime($GetReportResult[0]->req_date)); 
                $user_mobile=$GetReportResult[0]->user_mobile;
                $gender=$GetReportResult[0]->gender;
                $pack_desc=$GetReportResult[0]->pack_desc;
     
                $data = array( 'email'=>$mailid, 
                       'first_name'=>$UName, 
                       'from'=>'fitbeanzfitness@gmail.com',
                       'res_price'=>$res_price,
                       'pay_result'=>$pay_result,
                       'res_trans_id'=>$res_trans_id,
                       'pak_name'=>$pak_name,
                       'cat_name'=>$cat_name,
                       'GymName'=>$GymName,
                       'transId'=>$txnid,
                       'ModeofPay'=>'Online',
                       'payDt'=>$payDt,
                       'user_mobile'=>$user_mobile,
                       'adminEmail'=>$adminEmail,
                       'gender'=>$gender,
                       'pack_desc'=>$pack_desc
                       );
 
              Mail::send('admin.emails.paymentMail', $data, function($message) use ($data) {
               $message->to($data['email'])->cc($data['adminEmail']);
               $message->replyTo($data['adminEmail'], $name = null); 
               $message->subject('Alivefitnez Payment Details');
              }); 
            /*Mail function end*/   

           $resultJson['error']=1;
           $resultJson['result']="success";
           $resultJson['key']=$txnid;
    }
    else
    {
  
      $resultJson['error']=0;
      $resultJson['result']="Payment invalid";

    }



  }
  else
  {

   $resultJson['error']=0;
   $resultJson['result']="Invalid Response";
  
  }

 echo json_encode($resultJson);
}

public function payRazorShowResults(Request $request)
{
     if($request->has('hidsuccId'))
     {

       $txnid=$request['hidsuccId'];

       $getCnt=DB::table('gym_payment_master')
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.trans_id',$txnid)
               ->where('gym_payment_master.status',1)->count();
       if($getCnt==1)   {     

      $ResultArr = DB::table('gym_payment_master')->leftJoin('admins','gym_payment_master.user_id','=','admins.id')
               ->where('gym_payment_master.cancel_status',0)
               ->where('gym_payment_master.trans_id',$txnid)
               ->where('gym_payment_master.status',1)
               ->get(array('admins.email','gym_payment_master.pak_name','admins.name','gym_payment_master.pay_result','gym_payment_master.cat_name','gym_payment_master.customer_name','gym_payment_master.user_email','gym_payment_master.price','gym_payment_master.req_date','gym_payment_master.pay_result','gym_payment_master.res_ref_no','gym_payment_master.res_trans_id','gym_payment_master.user_mobile','gym_payment_master.trans_id','gym_payment_master.pay_offline','gym_payment_master.payed_offline_dt','gym_payment_master.cus_pay_id','gym_payment_master.res_auth_id','gym_payment_master.gender','gym_payment_master.pack_desc'));
 



               return view('user.result',compact('ResultArr','data'));
             }
             else
             {

               Session::flash('message', 'Invalid result');
               Session::flash('alert-class', 'alert-danger');
               return Redirect::to('/home');

             }

      

     }
     else
     {

       Session::flash('message', 'Invalid payment');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

     }

}

public function gymListAerobics(Request $request)
  {
     if(1)
     {
        $pinCode='';
        $catType=2 ; 
        $filterArrayList=array();
$getNewValidUserListCnt=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                      ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                      ->where('gym_type_mapping.type_id', $catType)
                      ->where('admins.active', 1)
                      ->where('gym_package_master.cat_id',1) //check economic pack must
                      //->where('gym_profile_master.pincode',$pinCode) 
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
                     // ->where('gym_profile_master.pincode',$pinCode) 
                      ->where('gym_package_master.active',1)->distinct()
                      ->get(array('admins.id')); 

                       foreach($getNewValidUserList as $keyIdVal)
                       {

                        $getFinalValidUserList=Admin::leftJoin('gym_profile_master', 
    'admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')->where('admins.active', 1)
               ->where('admins.id',$keyIdVal->id)->where('gym_type_mapping.type_id', $catType)
               //->where('gym_profile_master.pincode', $pinCode) 
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
                              ->where('gym_features_mapping.user_id',$keyIdVal->id)->where('gym_features.active',1)->limit(6)
                              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                              $userFeatResult="";      

                              if(count($usersFeat)>0)   
                              {
                              foreach ( $usersFeat  as $key => $valueFeat) 
                              {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                              }

                              $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
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

                       

                        $tableCat = new Gym_category();
                $getCategory=$tableCat->select(array('cat_name','cat_id'))->where('active', '=', 1)->get();
                $getTable = new gym_features(); 
                $getAllfeatures=$getTable->select(array('features_name','fe_id'))->where('active', '=', 1)->get();
     
                $GymTypeTable=new GymType();
                $getType=$GymTypeTable->select(array('type_id','type_name'))->where('active', '=', 1)->get(); 

                return view('user.gymlistAero',compact('getCategory','getgymFeatures','getAllfeatures','pinCode','catType','filterArrayList','getType'));    


                       

                       

 
            }
            else
            { 

                    Session::flash('message', 'No data found');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

            } 

     }
     else
     {  
       
        return Redirect::to('/home');

     }


  }

  public function gymListYoga(Request $request)
  {
     if(1)
     {
        $pinCode='';
        $catType=3 ; 
        $filterArrayList=array();
$getNewValidUserListCnt=Admin::leftJoin('gym_profile_master', 'admins.id', '=', 'gym_profile_master.user_id')
                      ->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')
                      ->leftJoin('gym_package_master','gym_package_master.user_id','=','admins.id')
                      ->where('gym_type_mapping.type_id', $catType)
                      ->where('admins.active', 1)
                      ->where('gym_package_master.cat_id',1) //check economic pack must
                      //->where('gym_profile_master.pincode',$pinCode) 
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
                     // ->where('gym_profile_master.pincode',$pinCode) 
                      ->where('gym_package_master.active',1)->distinct()
                      ->get(array('admins.id')); 

                       foreach($getNewValidUserList as $keyIdVal)
                       {

                        $getFinalValidUserList=Admin::leftJoin('gym_profile_master', 
    'admins.id', '=', 'gym_profile_master.user_id')->leftJoin('gym_category_mapping','gym_category_mapping.user_id','=','admins.id')->leftJoin('gym_type_mapping','gym_type_mapping.user_id','=','admins.id')->where('admins.active', 1)
               ->where('admins.id',$keyIdVal->id)->where('gym_type_mapping.type_id', $catType)
               //->where('gym_profile_master.pincode', $pinCode) 
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
                              ->where('gym_features_mapping.user_id',$keyIdVal->id)->where('gym_features.active',1)->limit(6)
                              ->get(array('gym_features_mapping.fe_id','gym_features.features_name'));

                              $userFeatResult="";      

                              if(count($usersFeat)>0)   
                              {
                              foreach ( $usersFeat  as $key => $valueFeat) 
                              {
                              $userFeatResult.="<li>".$valueFeat->features_name."</li>";
                              }

                              $getFinalValidUserList[0]->featuresData="<ul class='fetures_list'>".$userFeatResult."</ul>";
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

                       

                        $tableCat = new Gym_category();
                $getCategory=$tableCat->select(array('cat_name','cat_id'))->where('active', '=', 1)->get();
                $getTable = new gym_features(); 
                $getAllfeatures=$getTable->select(array('features_name','fe_id'))->where('active', '=', 1)->get();
     
                $GymTypeTable=new GymType();
                $getType=$GymTypeTable->select(array('type_id','type_name'))->where('active', '=', 1)->get(); 

                return view('user.gymlistYoga',compact('getCategory','getgymFeatures','getAllfeatures','pinCode','catType','filterArrayList','getType'));    


                       

                       

 
            }
            else
            { 

                    Session::flash('message', 'No data found');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to('/home');

            } 

     }
     else
     {  
       
        return Redirect::to('/home');

     }


  }



    public function postsignin(Request $request)
  {
      
    /*$validation =Validator::make($request->all(),[ 
         'email' =>'required',
         'pwd' =>'required'
        ]);

print_r( $request->input('email')); */

     /* if(Auth::attempt([
        'email' =>$request->input('email'),
        'password' =>$request->input('password')])){
        
          return redirect::to('/basket');
      }
      return redirect()->back(); */

/*$validation =Validator::make($request->all(),[ 
         'email' =>'required',
         'password' =>'required'
        ]);

     if(Auth::attempt([
        'email' =>$request->input('email'),
        'password' =>$request->input('password')])){
        
          return redirect::to('/basket');
      }
      return redirect()->back(); */
  }

 /* public function getlogout()
    {
      Auth::logout();
      return redirect::to('/');
    } */
}
