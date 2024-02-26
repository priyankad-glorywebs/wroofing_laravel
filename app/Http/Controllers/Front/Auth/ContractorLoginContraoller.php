<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContractorLoginRequest;
use Hash;
use Auth;

class ContractorLoginContraoller extends Controller
{
    public function ContractorshowLoginForm(){
        return view('layouts.front.auth.contractor.contarctorlogin');
    }

    public function Contractorlogin(Request $request){
        try{
            $credentials = $request->only('email', 'password');
            $contractor = \App\Models\Contractor::where('email', $credentials['email'])->first();
            if($contractor->email_verified_at !== NULL && $contractor->email_verified_at !== ''){
                if (Hash::check($credentials['password'], $contractor->password)) {
                        Auth::guard('contractor')->login($contractor, $request->has('remember'));
                        return redirect()->route('contractor.dashboard');
                }else{
                    return redirect()->back()->withInput()->with(['error' => 'Invalid email or password.']);
                }
            }
                else{
                    return redirect()->back()->with(['error'=>'Your email is not verified. Please check your email for the verification link.']);
                }

        }catch (\Exception $exception) {
           // return redirect()->route('error.page')->with('error', 'An unexpected error occurred.');

    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }  

}
