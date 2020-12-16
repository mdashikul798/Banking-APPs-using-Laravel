<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('forgot', function () {

    return view('auth.passwords.email');
});
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', function () {
    return view('mainsite.index');
});
Route::get('verify','VerifyController@verify')->name('verify');;
Route::get('verify_again','VerifyController@verify_again')->name('verify_again');;
Route::post('verify','VerifyController@check_code')->name('check_code');
Route::get('send_message','Admin\adminController@send_message')->name('send_message');
Route::post('send_message','Admin\adminController@send_message_twillio')->name('send_message');
Route::get('two_factor','Admin\adminController@two_factor')->name('two_factor');
Route::get('two_factor_change/{id}','Admin\adminController@two_factor_change')->name('two_factor_change');

Route::get('legalterms', function () {
    return view('mainsite.legalTerms');
});

Route::get('contact', function () {
    return view('mainsite.contact');
});

Route::get('login', function () {
    return view('mainsite.login');
});
Route::get('LogOut', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('signup', function () {
    return view('mainsite.signup');
});

Route::get('creditapplication', function () {
    return view('mainsite.creditApplication');
});
Route::get('creditapplicationEnglish', function () {
    return view('mainsite.creditApplicationEnglish');
});
Route::get('creditapplicationspanish', function () {
    return view('mainsite.creditApplicationspanish');
});
Route::get('creditapplicationitalian', function () {
    return view('mainsite.creditApplicationItalian');
});
Route::get('creditapplicationgerman', function () {
    return view('mainsite.creditApplicationGerman');
});
Route::get('creditapplicationfinland', function () {
    return view('mainsite.creditApplicationFindland');
});


Route::get('check', function () {
    return view('mainsite.check');
});

Route::get('operations',  [
    'uses' =>'userDashboard\userController@showOperations',
    'as' =>'showoperations'
]);

Route::get('dashboardUser', [
    'uses' =>'userDashboard\editProfileController@showUserDashboard',
    'as' =>'userdashboard'
]);
//Route::get('updateprofile', function () {
//    return view('userdashboard.updateProfile');
//});
Route::get('transfer',  [
    'uses' =>'userDashboard\userController@showTransfer',
    'as' =>'showtransfer'
]);
//Route::get('check1', function () {
//    return view('userdashboard.check');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// user dashboard routes
Route::get('editProfile/{id}', [
    'uses' => 'userDashboard\editProfileController@editProfile',
    'as' => 'editProfile'
]);

Route::post('updateProfile', [
    'uses' => 'userDashboard\editProfileController@updateProfile',
    'as' => 'updateProfile'
]);

Route::post('updateProfileImage', [
    'uses' => 'userDashboard\editProfileController@updateProfileImage',
    'as' => 'updateProfileImage'
]);

Route::post('userTransfer', [
    'uses' => 'userDashboard\userController@user_transfer',
    'as' => 'usertransfer'
]);
Route::get('getfirstverification', [
    'uses' => 'userDashboard\userController@getfirstverification',
    'as' => 'getfirstverification'
]);
Route::get('getsecondverification', [
    'uses' => 'userDashboard\userController@getsecondverification',
    'as' => 'getsecondverification'
]);

Route::get('getthirdverification', [
    'uses' => 'userDashboard\userController@getthirdverification',
    'as' => 'getthirdverification'
]);
Route::post('firstverification', [
    'uses' => 'userDashboard\userController@firstverification',
    'as' => 'firstverification'
]);
Route::post('secondverification', [
    'uses' => 'userDashboard\userController@secondverification',
    'as' => 'secondverification'
]);
Route::post('thirdverification', [
    'uses' => 'userDashboard\userController@thirdverification',
    'as' => 'thirdverification'
]);


Route::get('resetUserPassword', [
    'uses' => 'userDashboard\editProfileController@getchangepassword',
    'as' => 'getchangepassword'
]);

Route::post('updateUserPassword', [
    'uses' => 'userDashboard\editProfileController@postchangepassword',
    'as' => 'postchangepassword'
]);



// admin dshboard views



Route::get('edituserprofile', function () {
    return view('adminDashboard.editUserProfile');
});
//Route::get('adminIndexUsers', [
//    'uses' => 'Admin\loginController@adminindexusers',
//    'as' => 'adminUsersIndex'
//]);
Route::get('adminLogin', [
    'uses' => 'Admin\loginController@showLoginForm',
    'as' => 'adminlogin'
]);
Route::post('adminLogin', [
    'uses' => 'Admin\loginController@authenticate',
    'as' => 'adminloginauth'
]);

Route::get('indexUsers', [
    'uses' => 'Admin\adminController@indexusers',
    'as' => 'indexusers'
]);

Route::post('blockUser', [
    'uses' => 'Admin\adminController@blockuser',
    'as' => 'blockuser'
]);

Route::get('deleteUser{id}', [
    'uses' => 'Admin\adminController@deleteuser',
    'as' => 'deleteuser'
]);

Route::get('adminEditProfile/{id}', [
    'uses' => 'Admin\adminController@editprofile',
    'as' => 'editprofileadmin'
]);
    Route::get('trackuser/{id}', 'Admin\adminController@trackuser')->name('trackuser');

Route::post('adminUpdateProfile', [
    'uses' => 'Admin\adminController@updateprofile',
    'as' => 'updateprofileadmin'
]);

Route::post('adminUpdateProfileImage', [
    'uses' => 'Admin\adminController@updateprofileimage',
    'as' => 'adminUpdateProfileImage'
]);
Route::get('adminLogout', function () {
    Auth::logout();
    return redirect('adminLogin');
});

Route::get('CreateUserForm', [
    'uses' => 'Admin\adminController@getCreateUserForm',
    'as' => 'usercreateform'
]);
Route::post('CreateUser', [
    'uses' => 'Admin\adminController@createUser',
    'as' => 'usercreate'
]);
Route::get('editAdmins/{id}', [
    'uses' => 'Admin\adminController@editadmins',
    'as' => 'editadmins'
]);
Route::post('adminUpdate', [
    'uses' => 'Admin\adminController@updateadmin',
    'as' => 'updateadmin'
]);
Route::get('indexAdmins', [
    'uses' => 'Admin\adminController@indexadmins',
    'as' => 'indexadmins'
]);
Route::get('manageOpertions/{id}', [
    'uses' => 'Admin\adminController@manageoperations',
    'as' => 'manageoperations'
]);


Route::get('addOperation/{id}', [
    'uses' => 'Admin\adminController@addoperation',
    'as' => 'addoperation'
]);


Route::get('editOperation/{id}', [
    'uses' => 'Admin\adminController@editoperation',
    'as' => 'editoperation'
]);

Route::post('updateOperation', [
    'uses' => 'Admin\adminController@updateoperation',
    'as' => 'updateoperation'
]);

Route::post('add_operation', [
    'uses' => 'Admin\adminController@postaddoperation',
    'as' => 'postaddoperation'
]);

Route::get('deleteOpertion/{id}', [
    'uses' => 'Admin\adminController@deleteoperation',
    'as' => 'deleteoperation'
]);

Route::get('deleteOpertion2/{id}', [
    'uses' => 'Admin\adminController@deleteoperation2',
    'as' => 'deleteoperation2'
]);

Route::get('addOperation2/{id}', [
    'uses' => 'Admin\adminController@addoperation2',
    'as' => 'addoperation2'
]);

Route::post('addperation2', [
    'uses' => 'Admin\adminController@postaddoperation2',
    'as' => 'postaddoperation2'
]);

Route::get('manageOpertions2/{id}', [
    'uses' => 'Admin\adminController@manageoperations2',
    'as' => 'manageoperations2'
]);

Route::get('editOperation2/{id}', [
    'uses' => 'Admin\adminController@editoperation2',
    'as' => 'editoperation2'
]);

Route::post('updateOperation2', [
    'uses' => 'Admin\adminController@updateoperation2',
    'as' => 'updateoperation2'
]);

Route::get('updateMyProfile', [
    'uses' => 'Admin\adminController@updatemyprofile',
    'as' => 'updatemyprofile'
]);
Route::get('verificationSettings/{id}', [
    'uses' => 'Admin\adminController@verificationsettings',
    'as' => 'verificationsettings'
]);
Route::post('postVerificationSettings', [
    'uses' => 'Admin\adminController@postverificationsettings',
    'as' => 'postverificationsettings'
]);

Route::post('setAmount', [
    'uses' => 'Admin\adminController@setamount',
    'as' => 'setamount'
]);

Route::get('checktimer', [
    'uses' => 'Admin\adminController@checktimer',
    'as' => 'checktimer'
]);

Route::get('changePassword', [
    'uses' => 'Admin\adminController@getadminchangepassword',
    'as' => 'getadminchangepassword'
]);

Route::get('changeAdminPassword', [
    'uses' => 'Admin\changepasswordController@getadminchangepassword',
    'as' => 'getadminchangepassword'
]);

Route::post('updateAdminPassword', [
    'uses' => 'Admin\changepasswordController@postadminchangepassword',
    'as' => 'postadminchangepassword'
]);

Route::get('email', function () {
    return view('accountdetailemail');
});

Route::get('getemailform', [
    'uses' => 'HomeController@getuseremail',
    'as' => 'getuseremail'
]);

Route::post('emailform', [
    'uses' => 'HomeController@useremail',
    'as' => 'useremail'
]);
Route::post('ContactMessage', [
    'uses' => 'Admin\adminController@contact_us',
    'as' => 'contact_us'
]);


Route::get('IndexContactMessages', [
    'uses' => 'Admin\adminController@indexContacts',
    'as' => 'indexcontacts'
]);

Route::get('viewContactMessage/{id}', [
    'uses' => 'Admin\adminController@viewContact',
    'as' => 'viewcontact'
]);
Route::get('deleteContactMessage{id}', [
    'uses' => 'Admin\adminController@deleteContact',
    'as' => 'deletecontact'
]);

Route::get('remboursment', function () {
    return view('mainsite.remboursmentmenu');
});
Route::get('tracking', function () {
    return view('mainsite.tracking');
});

Route::get('assurances', function () {
    return view('mainsite.assurances');
});


Route::post('creditApplication', [
    'uses' => 'creditApplicationController@create',
    'as' => 'creditapplication'
]);

Route::get('indexCreditApplication', [
    'uses' => 'creditApplicationController@index',
    'as' => 'indexcreditapplication'
]);
Route::get('Configure', [
    'uses' => 'creditApplicationController@Configure',
    'as' => 'Configure'
]);
Route::post('configureemail', [
    'uses' => 'creditApplicationController@configureemail',
    'as' => 'configureemail'
]);
Route::get('deleteCreditApplication/{id}', [
    'uses' => 'creditApplicationController@delete',
    'as' => 'deletecreditapplication'
]);

Route::get('editCreditApplication/{id}', [
    'uses' => 'creditApplicationController@edit',
    'as' => 'editcreditapplication'
]);

Route::post('updateCreditApplication', [
    'uses' => 'creditApplicationController@update',
    'as' => 'updatecreditapplication'
]);

Route::get('viewCreditApplication/{id}', [
    'uses' => 'creditApplicationController@view',
    'as' => 'viewcreditapplication'
]);

Route::get('viewCreditApplication/{id}', [
    'uses' => 'creditApplicationController@view',
    'as' => 'viewcreditapplication'
]);



Route::get('trackFile', [
    'uses' => 'Admin\adminController@viewtrackform',
    'as' => 'trackfile'
]);

Route::post('createTrackFile', [
    'uses' => 'Admin\adminController@createtrackfile',
    'as' => 'createtrackfile'
]);

Route::get('indexTrackFiles', [
    'uses' => 'Admin\adminController@indextrackfiles',
    'as' => 'indextrackfiles'
]);

Route::get('EditTrackFile/{id}', [
    'uses' => 'Admin\adminController@edittrackform',
    'as' => 'edittrackfile'
]);
Route::post('updateTrackFile', [
    'uses' => 'Admin\adminController@updatetrackfile',
    'as' => 'updatetrackfile'
]);

Route::get('deleteTrackFile/{id}', [
    'uses' => 'Admin\adminController@deletetrackfile',
    'as' => 'deletetrackfile'
]);

Route::get('viewTrackFile/{id}', [
    'uses' => 'Admin\adminController@viewtrackfile',
    'as' => 'viewtrackfile'
]);

Route::post('viewTrackFile', [
    'uses' => 'Admin\adminController@viewtrackfilerequest',
    'as' => 'viewtrackfilerequest'
]);

Route::post('submitAssurance', [
    'uses' => 'Admin\adminController@createassurance',
    'as' => 'createassurance'
]);

Route::get('indexAssurances', [
    'uses' => 'Admin\adminController@indexassurances',
    'as' => 'indexassurances'
]);

Route::get('deleteAssurances/{id}', [
    'uses' => 'Admin\adminController@deleteassurance',
    'as' => 'deleteassurance'
]);

Route::get('viewAssurance/{id}', [
    'uses' => 'Admin\adminController@viewassurance',
    'as' => 'viewassurance'
]);

Route::get('insertpivot', [
    'uses' => 'Admin\adminController@insertpivot',
    'as' => 'insertpivot'
]);

Route::get('updatepivot', [
    'uses' => 'Admin\adminController@updatepivot',
    'as' => 'updatepivot'
]);

Route::get('viewNotifications', [
    'uses' => 'Admin\adminController@viewnotifications',
    'as' => 'viewnotifications'
]);

Route::get('checkNotifications', [
    'uses' => 'Admin\adminController@checknotification',
    'as' => 'checknotification'
]);