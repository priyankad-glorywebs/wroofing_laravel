<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\ContractorResetPasswordRequest;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon; 
use App\Models\User;
use App\Models\Contractor;




class ContractorResetPasswordController extends Controller
{
     // showResetPasswordForm  method 
     public function contractorshowResetPasswordForm($token) { 
        try{
         $data =  PasswordReset::where('token',$token)->first();
         
         return view('layouts.front.Auth.resetpassword', ['data' => $data]);
         }catch (\Exception $exception) {
             return redirect()->route('error.page')->with('error', 'An unexpected error occurred.');
         }
       }
  
 //  public function submitResetPasswordForm(ResetPasswordRequest $request)
 public function contractorsubmitResetPasswordForm(ContractorResetPasswordRequest $request)
  {
     $user = User::where('email',$request->email)->first();
     
     $contractor = Contractor::where('email',$request->email)->first();
 
     if(isset($contractor) || isset($user) || $contractor !== ''  || $user !== '' || $contractor !== NULL || $user !== NULL ){
     $passwordReset = DB::table('password_resets')
          ->where('email', $request->email)
          ->where('token', $request->token)
          ->first();
  
      if (!$passwordReset || !$this->tokenValid($passwordReset)) {
          return back()->withInput()->with('error', 'Invalid or expired token!');
      }
  
      if($user){
      User::where('email', $user->email)
          ->update(['password' => Hash::make($request->password)]);
      }
 
      if($contractor){
      Contractor::where('email',$contractor->email)
                  ->update(['password' => Hash::make($request->password)]);
 
      }
      //dd($this->getRouter()->getCurrentRoute()->getPrefix());
 
      DB::table('password_resets')->where('email', $request->email)->delete();
  
      return redirect('contractor/login')->with('message', 'Your password has been changed!');
     }else {
         return back()->with('error','something went wrong');
     }
  }
  
  
  protected function tokenValid($passwordReset)
  {
      $expirationTime = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');
  
      return Carbon::parse($passwordReset->created_at)->addMinutes($expirationTime)->isFuture();
  }
  
}