<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Auth\RegistrationController;
use App\Http\Controllers\Front\Auth\ForgotPasswordController;
use App\Http\Controllers\Front\Auth\ResetPasswordController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
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

// change password
Route::get('change-password',[ChangePasswordController::class,'index'])->name('front.password.index');
Route::post('front-update-password',[ChangePasswordController::class,'changePassword'])->name('front.password.update');

/*********************************************************/
//   -------------Authentication Routes ----------------
/*********************************************************/
Route::group(['namespace' => 'Front\Auth'], function () {
    // custom authentication routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/register', [RegistrationController::class, 'registerStepOne'])->name('register.one');
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');

    Route::get('/test', [RegistrationController::class, 'test']);

    Route::post('remove/image',[ProjectController::class,'removeImage'])->name('remove.image');
   // Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
   Route::get('/email/custom-verify/{id}', [CustomVerificationController::class, 'customVerify'])->name('verification.customVerify')->middleware('signed');

   Route::any('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/forgot/password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('send.reset.link');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('/reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

});
/************************************************************/
//   ------------- END Authentication Routes ----------------
/************************************************************/

// Route::controller(DropzoneController::class)->group(function(){
//     Route::get('dropzone', 'index');
//     Route::post('dropzone/store', 'store')->name('dropzone.store');
// });

/*********************************************************/
//   -------------All Contractor Routes ----------------
/*********************************************************/
Route::group(['middleware' => 'contractor.middleware:contractor','namespace' => 'Front\Auth'], function () {
     //contractor dashboard
    Route::get('contractor/dashboard',[ProjectController::class,'contractorProjectList'])->name('contractor.dashboard');
    Route::get('contractor/project/details/{project_id}',[ProjectController::class,'projectDetailsContractor']);
    //download a file 
    Route::get('/{filename}', [ProjectController::class, 'download'])->name('download.file');
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


Route::post('test',[ProjectController::class,'test'])->name('test');
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