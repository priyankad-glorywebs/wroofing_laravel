<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use App\Models\User; 
use Hash;


class LoginController extends Controller
{
    // Display a Login form 
    public function showLoginForm() {
        return view('layouts.front.auth.login');
    }
    // post request for login form
    public function login(LoginRequest $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->has('remember'))) {
        return redirect()->route('project.list');
    }

    $contractor = \App\Models\Contractor::where('email', $credentials['email'])->first();

    if ($contractor && Hash::check($credentials['password'], $contractor->password)) {
        Auth::guard('contractor')->login($contractor, $request->has('remember'));
        //return view('layouts.front.projects.contractor.contractor-project-list');
         return redirect()->route('contractor.dashboard');
  }
    return redirect()->back()->withInput()->with(['error' => 'Invalid email or password.']);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $srequest->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }  
 

}

