<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class CustomVerificationController extends Controller
{
    public function customVerify(Request $request)
    {
        $user = User::findOrFail($request->id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        $request->session()->flash('success', 'Your email verification is successful. You can now log in.');

        return redirect('/login');

    }
}
