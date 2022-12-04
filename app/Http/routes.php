<?php
 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::controller('collection','CollectionController');

Route::get('/admin','Adminauth\AuthController@showLoginForm');
Route::get('/admin/login','Adminauth\AuthController@showLoginForm');
Route::post('/admin/login','Adminauth\AuthController@login');
//Route::get('/admin/password/reset','Adminauth\PasswordController@resetPassword');

Route::any('/admin/resetpass','Adminauth\AuthController@resetpass');
Route::post('/admin/resetpassAjx','Adminauth\AuthController@resetpassAjx');
Route::post('/admin/chgpassAjx','Adminauth\AuthController@chgpassAjx');
Route::get('/admin/recpass/{id}','Adminauth\AuthController@recpass');
 


Route::group(['middleware' => ['admin']], function () {
    
    //Login Routes...
Route::get('/admin/logout','Adminauth\AuthController@logout');
Route::get('admin/gymreg', 'Admin\GymReg@Add_reg');
Route::post('admin/gymreg', 'Admin\GymReg@Save_reg');
Route::get('admin/viewreg', 'Admin\GymReg@View_reg');
Route::post('admin/actviewreg', 'Admin\GymReg@Act_reg_edit');
Route::get('admin/editUser/{id}', 'Admin\GymReg@reg_edit_view');
Route::post('admin/gymUpdatereg', 'Admin\GymReg@Update_reg');

Route::get('admin/gymcat', 'Admin\GymCategory@Add_cat');
Route::post('admin/gymcat', 'Admin\GymCategory@Save_cat');
Route::any('admin/gymcatView', 'Admin\GymCategory@View_cat');
Route::post('admin/actviewCatreg', 'Admin\GymCategory@Act_reg_edit');
Route::post('admin/editviewCatreg', 'Admin\GymCategory@cat_view_edit');
Route::post('admin/updateCat', 'Admin\GymCategory@cat_view_update');
//Route::post('admin/updateCat', 'Admin\GymCategory@cat_view_update');
//GymFeatures add
Route::get('admin/gymFeaturesAdd', 'Admin\GymFeatures@Add_features'); 
Route::post('admin/gymFeaturesAdd', 'Admin\GymFeatures@save_features');
Route::get('admin/updateFatu', 'Admin\GymFeatures@fat_view_show');
Route::post('admin/actviewFetreg', 'Admin\GymFeatures@Act_reg_edit');
Route::post('admin/editviewFetreg', 'Admin\GymFeatures@fat_view_edit');
Route::post('admin/updateFet', 'Admin\GymFeatures@fat_view_save');
 //Gym Type Master
Route::get('admin/gymTypeAdd', 'Admin\GymTypeMaster@Add_type'); 
Route::post('admin/gymTypeAdd', 'Admin\GymTypeMaster@save_type');
Route::get('admin/updateType', 'Admin\GymTypeMaster@type_view_show');
Route::post('admin/actviewType', 'Admin\GymTypeMaster@Act_type_edit');
Route::post('admin/editviewType', 'Admin\GymTypeMaster@type_view_edit');
Route::post('admin/updateType', 'Admin\GymTypeMaster@type_view_save');


//Gym user Routes...
Route::any('admin/gymProfAdd', 'Admin\GymProfile@Add_profile');
Route::any('admin/gymProfSave', 'Admin\GymProfile@Save_profile');
Route::any('admin/gymChangePass', 'Admin\GymProfile@change_pass');
Route::any('admin/gymUpdatePass', 'Admin\GymProfile@update_Pass');

//Gyu user Package
Route::any('admin/gymPackageAdd', 'Admin\GymPackage@Add_package');
Route::post('admin/gymPackageAdd', 'Admin\GymPackage@save_package');
Route::any('admin/gymPackageView', 'Admin\GymPackage@view_package');
Route::post('admin/actviewPackage', 'Admin\GymPackage@Act_pak_edit');
Route::get('admin/editPackage/{id}', 'Admin\GymPackage@edit_package');
Route::any('admin/gymPackageUpdate', 'Admin\GymPackage@update_package');
Route::any('admin/GetPakList','Admin\GymPackage@GetPakListe_package');
Route::any('admin/packageDelete','Admin\GymPackage@delete_package');


//Gyu banner add
Route::get('admin/gymBannerAdd', 'Admin\GymBanner@Add_banner');
Route::post('admin/gymBannerAdd', 'Admin\GymBanner@Upload_Banner');
Route::any('admin/gymBannerView', 'Admin\GymBanner@View_Banner');
Route::post('admin/actviewBanner', 'Admin\GymBanner@Act_banner_edit');
Route::post('admin/deleteBanner', 'Admin\GymBanner@delete_banner');



//GymWorking hour add
Route::get('admin/gymWrkHrAdd', 'Admin\GymWrkhour@Add_wrhadd'); 
Route::post('admin/gymWrkHrAdd', 'Admin\GymWrkhour@save_wrkhout');
Route::any('admin/gymWrkHrView', 'Admin\GymWrkhour@view_wrkhour');  

 //report
Route::get('admin/report', 'Admin\GymReport@view_pay_report');
Route::any('admin/reportList', 'Admin\GymReport@view_pay_report_list');

//admin report
Route::get('admin/Adminreport', 'Admin\GymReportAdmin@view_pay_report');
Route::any('admin/AdminreportList', 'Admin\GymReportAdmin@view_pay_report_list');



	
    // Registration Routes...
Route::get('admin/register', 'Adminauth\AuthController@showRegistrationForm');
Route::post('admin/register', 'Adminauth\AuthController@register');

//Route::get('/admin/home', function () { return view('admin.home'); });

Route::any('admin/home', 'Adminauth\AuthController@home');

Route::get('/admin/error', function () { return view('admin.error'); });

// refund Routes...
Route::any('/admin/gymPayat', 'Admin\GymPayAt@gymPayats'); 
Route::any('/admin/OfflineEntryList', 'Admin\GymPayAt@OfflineEntryLists'); 
Route::any('/admin/OfflineEntryListSave', 'Admin\GymPayAt@OfflineEntryListsSave');
Route::any('/admin/gymRefund', 'Admin\GymPayRefund@gymRefundCrl'); 
Route::any('/admin/RefundList', 'Admin\GymPayRefund@RefundLists');
Route::any('/admin/RefundListEntryList', 'Admin\GymPayRefund@RefundListEntryLists');
Route::any('/admin/RefundResult', 'Admin\GymPayRefund@RefundResults'); 
Route::any('/admin/gymPhyPayat', 'Admin\GymPayAt@gymPhyViewPayats'); 
Route::any('/admin/PhyEntryList', 'Admin\GymPayAt@PhyEntryLists'); 
Route::any('/admin/PhyEntrySaveList', 'Admin\GymPayAt@PhyEntrySaveLists'); 




/*Route::get('/admin/Product_add','Admin\Products@Product_add');
Route::get('/admin/search/autocomplete', array('as'=>'autocomplete','uses'=>'Admin\Products@autocomplete'));
Route::get('/admin/search/auto_complete', array('as'=>'auto_complete','uses'=>'Admin\Products@auto_complete'));

Route::post('/admin/Product_add','Admin\Products@Product_store');
Route::get('/admin/Product_add/productprice',array('as'=>'productprice','uses'=>'Admin\Products@productprice'));

Route::post('/admin/Productadd_display','Admin\Products@Productadd_display');

Route::post('/admin/Product_display',array('as'=>'admin.Product_display','uses'=>'Admin\Products@Product_display'));

Route::get('/admin/Product_itemadd','Admin\Product_items@Product_itemadd');

Route::post('/admin/Product_itemadd','Admin\Product_items@Product_itemstore');

Route::get('/admin/Product_itemedit/{id}','Admin\Product_items@Product_itemedit');

Route::post('/admin/Product_itemedit/{id}','Admin\Product_items@Product_editstore');

Route::get('/admin/neworders','Admin\Neworders@neworders');

Route::get('/admin/neworders/displayproduct',array('as'=>'displayproduct','uses'=>'Admin\Neworders@displayproduct'));

Route::get('/admin/neworders/unitprice',array('as'=>'unitprice','uses'=>'Admin\Neworders@unitprice'));

Route::get('/admin/neworderss','Admin\Neworders@neworderss');

Route::post('/admin/neworders','Admin\Neworders@newordersadd'); */

	
});



Route::group(['middleware' => 'web'] ,function(){

//gym front 
Route::get('/home',array('as'=>'index','uses'=>'Front\GymHomeController@index'));
Route::get('/',array('as'=>'index','uses'=>'Front\GymHomeController@index'));

Route::any('/gymList',array('as'=>'index','uses'=>'Front\GymHomeController@gymList'));
Route::any('/gymListAerobics',array('as'=>'index',
	'uses'=>'Front\GymHomeController@gymListAerobics'));
Route::any('/gymListFliterAero',array('as'=>'index','uses'=>'Front\GymHomeController@gymFilterListAero'));

Route::any('/gymListYoga',array('as'=>'index','uses'=>'Front\GymHomeController@gymListYoga'));
Route::any('/gymListFliterYoga',array('as'=>'index','uses'=>'Front\GymHomeController@gymFilterListYoga'));
//Route::any('/gymChoseList/{id}',array('as'=>'index','uses'=>'Front\GymHomeController@gymChoseList'));

Route::any('/gymChoseList',array('as'=>'index','uses'=>'Front\GymHomeController@gymChoseList'));


Route::any('/gymListFliter',array('as'=>'index','uses'=>'Front\GymHomeController@gymFilterList'));

Route::any('/gymPayResponse',array('as'=>'index','uses'=>'Front\GymHomeController@gymPaidResponse'));
Route::any('/gymCatPrice',array('as'=>'index','uses'=>'Front\GymHomeController@gymCatAjxPrice'));

Route::any('/gymChangeCat',array('as'=>'index','uses'=>'Front\GymHomeController@gymChangeCatAjx'));

Route::any('/gymListTabPrice',array('as'=>'index','uses'=>'Front\GymHomeController@gymListTabAjx'));

Route::any('/paymentTest',array('as'=>'index','uses'=>'Front\GymHomePaymentController@index'));
Route::any('/paymentChkOutfinal',array('as'=>'index','uses'=>'Front\GymHomeController@paymentChkfinalsOuts'));
Route::any('/paymentChkOut',array('as'=>'index','uses'=>'Front\GymHomeController@paymentChkOuts'));

Route::any('/finalPayCheck',array('as'=>'index','uses'=>'Front\GymHomeController@finalPayCheck'));
Route::any('/paymentRazorRes',array('as'=>'index','uses'=>'Front\GymHomeController@paymentRazorResp'));
Route::any('/payRazorShowResult',array('as'=>'index','uses'=>'Front\GymHomeController@payRazorShowResults'));

 Route::any('/paymentChkOutfinalcitrus',array('as'=>'index','uses'=>'Front\GymHomePaymentController@paymentChkOutfinalcitrus'));


Route::any('/paymentOffChkOut',array('as'=>'index','uses'=>'Front\GymHomeController@paymentOffChkOuts'));

 Route::any('/paymentTestRes',array('as'=>'index','uses'=>'Front\GymHomePaymentController@paymentResp'));
Route::any('/termcondition',array('as'=>'index','uses'=>'Front\GymHomeController@termscondition'));
Route::any('/aboutus',array('as'=>'index','uses'=>'Front\GymHomeController@aboutus'));
Route::any('/privacy',array('as'=>'index','uses'=>'Front\GymHomeController@privacys'));
Route::any('/Refund',array('as'=>'index','uses'=>'Front\GymHomeController@Refunds'));
Route::any('/Cancel',array('as'=>'index','uses'=>'Front\GymHomeController@Cancels'));
Route::any('/Contact',array('as'=>'index','uses'=>'Front\GymHomeController@Contacts'));
Route::any('/Product',array('as'=>'index','uses'=>'Front\GymHomeController@aboutus'));
Route::any('/myacc',array('as'=>'index','uses'=>'Front\GymHomeController@myaccount'));
Route::any('/MyAccHistory',array('as'=>'index','uses'=>'Front\GymHomeController@myAccHistory'));


/**Gym API Services **/
Route::any('/gymCatType',array('as'=>'index','uses'=>'Front\APIController_new@gymCatTypes'));
Route::post('/gymsearch',array('as'=>'index','uses'=>'Front\APIController_new@gymSearch'));
Route::post('/gymChose',array('as'=>'index','uses'=>'Front\APIController_new@gymChoseList'));
Route::post('/ChoseChkout',array('as'=>'index','uses'=>'Front\APIController_new@ChoseChkOuts'));
Route::post('/catMinPrice',array('as'=>'index','uses'=>'Front\APIController_new@catMiniPrice'));
Route::post('/gymFilterChose',array('as'=>'index','uses'=>'Front\APIController_new@gymFilterList'));
Route::post('/gymPackSelectList',array('as'=>'index','uses'=>'Front\APIController_new@gymPackSelect'));
Route::post('/gymPackTabPrice',array('as'=>'index','uses'=>'Front\APIController_new@gymPackTabListPrice'));
Route::post('/PayChkOut',array('as'=>'index','uses'=>'Front\APIController_new@PayChkOuts'));
Route::post('/paymentChkPg',array('as'=>'index','uses'=>'Front\APIController_new@paymentChkfinals'));
Route::post('/paymentPgResp',array('as'=>'index','uses'=>'Front\APIController_new@paymentResponse'));
Route::post('/catFeatList','Front\APIController_new@GetCategoryFeatList');
Route::post('/sampleTest','Front\APIController_new@samp');
Route::post('/payatGym','Front\APIController_new@payatGym');
Route::post('/myAccHis','Front\APIController_new@myAccHis');

Route::post('/genOtpApi','Front\APIController_new@GetGenOtp');
Route::post('/verifyOtp','Front\APIController_new@GetVerifyOtp');
Route::post('/reSendOtp','Front\APIController_new@GetreSendOtp');


Route::post('/PayReqSave',array('as'=>'index','uses'=>'Front\APIController_new@PayReqSaves'));
Route::post('/PayReqSend',array('as'=>'index','uses'=>'Front\APIController_new@PayReqSends'));
Route::post('/PayResResult',array('as'=>'index','uses'=>'Front\APIController_new@PayResResults'));
Route::any('/gymsearchgmap',array('as'=>'index','uses'=>'Front\APIControllerGmap@gymSearchGmap'));


/*Route::post('/generateotp',array('as'=>'index','uses'=>'Front\APIController@generateotp')); */







Route::any('/login',array('as'=>'index','uses'=>'Front\GymHomeController@login'));
 

/*Route::get('/home',array('as'=>'index','uses'=>'Front\OrganicController@index'));
Route::get('/',array('as'=>'index','uses'=>'Front\OrganicController@index'));
Route::get('/register','Front\OrganicController@register');
Route::post('/postregister',['uses' => 'Front\OrganicController@postregister' , 'as' => 'postregister']);
Route::get('/login',['uses' => 'Front\OrganicController@getsignin' , 'as' => 'signin']);
Route::post('/login',['uses' => 'Front\OrganicController@postsignin' , 'as' => 'user.signin']);
Route::get('/password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
Route::get('/logout',['uses'=>'Front\OrganicController@getlogout','as'=>'logout']);

Route::get('/basket',array('as'=>'index','uses'=>'Front\BasketController@index')); */


});

