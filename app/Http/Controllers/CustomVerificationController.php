<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Contractor;
use Illuminate\Http\Request;

class CustomVerificationController extends Controller
{
    public function customVerify(Request $request)
    {
        try {
            $userID = (int)$request->id;        
            $user = User::where('id', $userID)->first();
            $contractor = Contractor::where('id', $userID)->first();
            if ($user) {
                if (!$user->hasVerifiedEmail()) {
                    $user->markEmailAsVerified();
                }
                $request->session()->flash('success', 'Your email verification is successful. You can now log in.');
                return redirect('customer/login');
            }elseif($contractor) {
                if (!$contractor->hasVerifiedEmail()) {
                    $contractor->markEmailAsVerified();
                }
                $request->session()->flash('success', 'Your email verification is successful. You can now log in.');
                return redirect('contractor/login');
            }
        } catch (\Exception $ex) {
            $request->session()->flash('error', 'An unexpected error occurred.');
            return redirect('/login');
        }
    }
}
