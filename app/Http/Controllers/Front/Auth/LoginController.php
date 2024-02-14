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
    // public function login(LoginRequest $request)
    // {
    //     $credentials = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'email_verified' => true, // Assuming email_verified field exists in the users table
    //     ];
    
    //     if(Auth::attempt($credentials, $request->has('remember'))) {
    //         if(isset($request->remember) && !empty($request->remember)){
    //             setcookie("email",$request->email,time()+3600);
    //             setcookie("password",$request->password,time()+3600);
    //         } else {
    //             setcookie("email","");
    //             setcookie("password",""); 
    //         }
    //         return redirect()->route('home');
    //     }
    
    //     return redirect()->back()->withInput()->with(['error' => 'Invalid login credentials or unverified email.']);
    // }
    

//     public function login(LoginRequest $request)
// {
//     $credentials = [
//         'email' => $request->email,
//         'password' => $request->password,
//     ];

//     if(Auth::attempt($credentials, $request->has('remember'))) {
//         // Check if the email is verified
//         if(auth()->user()->hasVerifiedEmail()) {
//             if(isset($request->remember) && !empty($request->remember)){
//                 setcookie("email",$request->email,time()+3600);
//                 setcookie("password",$request->password,time()+3600);
//             } else {
//                 setcookie("email","");
//                 setcookie("password",""); 
//             }
//             return redirect()->route('project.list');
//         } else {
//             // If the email is not verified, log the user out and redirect with an error message
//             auth()->logout();
//             return redirect()->back()->withInput()->with(['error' => 'Your email is not verified. Please check your email for the verification link.']);
//         }
//     }

//     return redirect()->back()->withInput()->with(['error' => 'Invalid login credentials.']);
// }

// public function login(LoginRequest $request)
// {
//     $credentials = $request->only('email', 'password');

//     // Attempt authentication for users
//     // dd($credentials['email']);

//     $userdata = User::where('email',$credentials['email'])->get();
//     // dd($userdata);
//     if (Auth::attempt($credentials, $request->has('remember'))) {
//         return redirect()->route('project.list');
//     }

//     // Attempt authentication for contractors
//     $contractor = \App\Models\Contractor::where('email', $credentials['email'])->first();
//     if ($contractor && Hash::check($credentials['password'], $contractor->password)) {
//         Auth::guard('contractor')->login($contractor, $request->has('remember'));
//         return redirect()->route('contractor.dashboard');
//         //return "Csontractor Dashboard";
//     }

//     return redirect()->back()->withInput()->with(['error' => 'Invalid email or password.']);
// }

public function login(LoginRequest $request)
{
    $credentials = $request->only('email', 'password');

    // Attempt authentication for users
    if (Auth::attempt($credentials, $request->has('remember'))) {
        return redirect()->route('project.list');
    }

    // Attempt authentication for contractors
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
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }  
 

}

