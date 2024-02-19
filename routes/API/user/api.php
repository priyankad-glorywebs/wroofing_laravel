<?php

use App\Http\Controllers\API\Customer\GeneralInformationController;
use App\Http\Controllers\API\Customer\Document\DocumentController;
use App\Http\Controllers\DesignStudioController;
use App\Http\Controllers\API\Customer\ProjectListController;
use App\Http\Controllers\API\Customer\UserRegisterController;
use App\Http\Controllers\API\Customer\UserLoginController;
use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Route;


// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginRegisterController;

// // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// //     return $request->user();
// // });



// // Public routes of authtication
// Route::controller(LoginRegisterController::class)->group(function() {
//     Route::post('/register', 'register');
//     Route::post('/login', 'login');
// });


// // Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('forgot.password');





// // Protected routes of product and logout
// Route::middleware('auth:sanctum')->group( function () {
    
//     Route::post('/logout', [LoginRegisterController::class, 'logout']);
// });


Route::post('/userregister', [UserRegisterController::class, 'userregister'])->name('user.register');
Route::post('/user/login', [UserLoginController::class, 'userLogin'])->name('user.login');


// userProjectList

Route::post('/projectlist', [ProjectListController::class, 'listaddnew'])->name('project.add');
Route::get('/projectlist ', [ProjectListController::class, 'list'])->name('project.list');
Route::get('/projectlist/{id}', [ProjectListController::class, 'listshowid'])->name('project.show');
Route::put('/update/{id}', [ProjectListController::class, 'listupdate'])->name('list.update');

// userGeneralInformation
Route::post('/Customergeneralinformation    ', [GeneralInformationController::class, 'Customergeneralinformation'])->name('Customer.information');
Route::get('/Customergeneralinformationlist ', [GeneralInformationController::class, 'list'])->name('Customer.list');
Route::put('/Customergeneralinformationupdat ', [GeneralInformationController::class, 'Customergeneralinformationupdat'])->name('Customergeneralinformation.updat');


// userdocuments
Route::post('/documents/{id}', [DocumentController::class, 'updateDocument'])->name('update.Document');
Route::post('removeDocument/{id}',  [DocumentController::class, 'removeDocument'])->name('remove.Document');
