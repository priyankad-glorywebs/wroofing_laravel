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
            // Check if the user exists in the users table
            $user = User::where('id', $userID)->first();
            // Check if the user exists in the contractors table
            $contractor = Contractor::where('id', $userID)->first();
            if ($user) {
                if (!$user->hasVerifiedEmail()) {
                    $user->markEmailAsVerified();
                }
                $request->session()->flash('success', 'Your email verification is successful. You can now log in.');
                return redirect('/login');
            }elseif($contractor) {
                if (!$contractor->hasVerifiedEmail()) {
                    $contractor->markEmailAsVerified();
                }
                $request->session()->flash('success', 'Your email verification is successful. You can now log in.');
                return redirect('/login');
            }
        } catch (\Exception $ex) {
            $request->session()->flash('error', 'An unexpected error occurred.');
            return redirect('/login');
        }
    }
}
