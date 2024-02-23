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

    public function Contractorlogin(ContractorLoginRequest $request){
        $credentials = $request->only('email', 'password');
        $contractor = \App\Models\Contractor::where('email', $credentials['email'])->first();
    if ($contractor && Hash::check($credentials['password'], $contractor->password)) {
        Auth::guard('contractor')->login($contractor, $request->has('remember'));
         return redirect()->route('contractor.dashboard');
  }else{
    return redirect()->back()->withInput()->with(['error' => 'Invalid email or password.']);

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
