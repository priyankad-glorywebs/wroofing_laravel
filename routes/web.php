<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Auth\RegistrationController;
use App\Http\Controllers\Front\Auth\ForgotPasswordController;
use App\Http\Controllers\Front\Auth\ResetPasswordController;
use App\Http\Controllers\Front\ChangePasswordController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\ContactusController;
use App\Http\Controllers\Front\ContractorController;
//use App\Http\Controllers\VerificationController;
use App\Http\Controllers\CustomVerificationController;
use App\Http\Controllers\DropzoneController;
/* start google / facebook */
use App\Http\Controllers\SocialFacebookController;
use App\Http\Controllers\SocialGoogleController;
/* end google / facebook */
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Front\Auth\ContractorLoginContraoller;
use App\Http\Controllers\Front\Auth\ContractorForgotPasswordController;
use App\Http\Controllers\Front\Auth\ContractorResetPasswordController;


Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    echo '<pre>';
    echo Artisan::output();
    echo '</pre>';
});



Route::post('remove/image',[ProjectController::class,'removeImage'])->name('remove.image');

Route::post('/test', [ProjectController::class, 'test'])->name('test');

Route::post('design/studio/{project_id}',[ProjectController::class,'designStudioStore'])->name('design.studio.post');




/*********************************************************/
//   -------------Authentication Google Sign In -----------
/*********************************************************/
Route::get('/login/google', [SocialGoogleController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [SocialGoogleController::class, 'handleGoogleCallback']);

/*********************************************************/
//   -------------Authentication Facebook Sign In -----------
/*********************************************************/
Route::get('/login/facebook', [SocialFacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [SocialFacebookController::class, 'handleFacebookCallback']);

//contact us page && term and condition page  guest routes
Route::get('/contact-us',[ContactusController::class,'contactus'])->name('contact-us');
Route::post('contact/store',[ContactusController::class,'store'])->name('contact.submit');
Route::get('terms-and-conditions',[ContactusController::class,'term'])->name('term.and.condition');

Route::get('/register', [RegistrationController::class, 'registerStepOne'])->name('register.one');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');



Route::any('/logout', [LoginController::class, 'logout'])->name('logout');


//update profile page customer
Route::get('/update/customer/profile',[ProjectController::class,'customerprofileView'])->name('customer.profile');
Route::post('/update/customer/profile/post',[ProjectController::class,'customerprofileUpdate'])->name('customer.profile.update');




// change password
Route::get('change-password',[ChangePasswordController::class,'index'])->name('front.password.index');
Route::post('front-update-password',[ChangePasswordController::class,'changePassword'])->name('front.password.update');

/*********************************************************/
//   -------------Authentication customer  Routes ----------------
/*********************************************************/
Route::group(['namespace' => 'Front\Auth','prefix'=>'customer'], function () {
    // custom authentication routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('remove/image',[ProjectController::class,'removeImage'])->name('remove.image');

    Route::get('/email/custom-verify/{id}', [CustomVerificationController::class, 'customVerify'])->name('verification.customVerify')->middleware('signed');


    Route::get('/forgot/password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('send.reset.link');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('/reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



});

/************************************************************/
//   ------------- END Authentication Routes ----------------
/************************************************************/



/*********************************************************/
//   -------------Authentication contarctor  Routes ----------------
/*********************************************************/
Route::group(['namespace' => 'Front\Auth','prefix'=>'contractor'], function () {
    // custom authentication routes
    Route::get('/login', [ContractorLoginContraoller::class, 'ContractorshowLoginForm'])->name('contractor.login');
    Route::post('/login', [ContractorLoginContraoller::class, 'Contractorlogin']);
   Route::get('/email/custom-verify/{id}', [CustomVerificationController::class, 'customVerify'])->name('verification.customVerify')->middleware('signed');


    Route::post('remove/image',[ProjectController::class,'removeImage'])->name('remove.image');


    Route::get('/forgot/password', [ContractorForgotPasswordController::class, 'contractorforgotPassword'])->name('contractor.forgot.password');
    Route::post('/forgot-password', [ContractorForgotPasswordController::class, 'contractor sendResetLinkEmail'])->name('contractor.send.reset.link');

    Route::get('/reset-password/{token}', [ContractorResetPasswordController::class, 'contractorshowResetPasswordForm'])->name('contractor.reset.password.get');
    Route::post('/reset-password', [ContractorResetPasswordController::class, 'contractorsubmitResetPasswordForm'])->name('contractor.reset.password.post');

    //update profile page customer
    Route::get('/update/customer/profile',[ProjectController::class,'customerprofileView'])->name('customer.profile');
    Route::post('/update/customer/profile/post',[ProjectController::class,'customerprofileUpdate'])->name('customer.profile.update');

});

/************************************************************/
//   ------------- END Authentication Routes ----------------
/************************************************************/


/*********************************************************/
//   -------------All Contractor Routes ----------------
/*********************************************************/
Route::group(['middleware' => 'contractor.middleware:contractor','namespace' => 'Front\Auth'], function () {
     //contractor dashboard and Filter
    Route::get('contractor/dashboard',[ContractorController::class,'contractorProjectList'])->name('contractor.dashboard');

    Route::get('contractor/project/details/{project_id}',[ContractorController::class,'projectDetailsContractor']);
    //download a file 
    Route::get('/{filename}', [ProjectController::class, 'download'])->name('download.file');
    //update profile page contractor
    Route::get('/update/profile',[ProjectController::class,'profileView'])->name('contractor.profile');
    Route::post('/update/profile/post',[ProjectController::class,'profileUpdate'])->name('contractor.profile.update');

    Route::post('/remove/image/contractor',[ContractorController::class,'removeImageContractor'])->name('remove.image.contractor');

    Route::POST('/delete-image/contractor/{project_id}/{file}',[ContractorController::class,'deleteImagesContractor'])->name('delete.image.designstudio.contractor');


     Route::post('design/studio/contractor/{project_id}',[ContractorController::class,'designStudioStoreContractor'])->name('design.studio.post.contractor');
//Filter design studio contractor 
Route::post('design/studio/filterdata/{project_id}',[ContractorController::class,'DesignstuidoContractorFilter'])->name('design.studio.filter.contractor');
    
});
/*********************************************************/
//   -------------End Contractor Routes ----------------
/*********************************************************/

/*********************************************************/
//   -------------All customer Routes ----------------
/*********************************************************/
Route::group(['middleware' => 'customAuth'], function () {

// project Routes
Route::get('add/project/{project_id}',[ProjectController::class,'create'])->name('add.project');
Route::post('add/project',[ProjectController::class,'addProject'])->name('add.project');

Route::get('/project/list',[ProjectController::class,'list'])->name('project.list');


// step form 
// step 1
Route::get('design/studio/{project_id}',[ProjectController::class,'designStudio'])->name('design.studio');
Route::post('design/studio/{project_id}',[ProjectController::class,'designStudioStore'])->name('design.studio.post');


//step 2
Route::get('/general/info/{project_id}',[ProjectController::class,'generalInformation'])->name('general.info');
Route::post('/general/info/{project_id}',[ProjectController::class,'generalInformationPost'])->name('general.info.store');

//step 3 
Route::get('/documentation/{project_id}',[ProjectController::class,'documentation'])->name('documentation');
Route::post('/documentation/{project_id}',[ProjectController::class,'documentationStore'])->name('documentation.store');
//remove document

Route::post('remove/documents',[ProjectController::class,'removeDocuments'])->name('remove.document');

// contarctor list 
Route::get('contractor/list',[ContractorController::class,'index'])->name('contractor.list');

//project details page for contractor projects  details page 


Route::POST('/delete-image/{project_id}/{file}',[ProjectController::class,'deleteImages'])->name('delete.image.designstudio');

Route::post('remove/image',[ProjectController::class,'removeImage'])->name('remove.image');

//design studio


Route::get('/home', function () {
    return view('home');
})->name('home');

});


/*********************************************************/
//   ------------- END customer Routes ----------------
/*********************************************************/


/*********************************************************/
//   ------------- Guest Routes ----------------
/*********************************************************/