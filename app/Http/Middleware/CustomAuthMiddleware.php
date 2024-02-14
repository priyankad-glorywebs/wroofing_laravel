<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuthMiddleware
{
    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check()) {
    //         return $next($request);
    //     }
    //     return redirect('/login')->with('error', 'Unauthorized. Please log in.');
    // }
    public function handle($request, Closure $next)
    {
        // dd("in");
        if (Auth::check()) {
            $user = Auth::user();
    
            // Check if the email is verified
            if ($user->hasVerifiedEmail()) {
                // Determine the type of user (user or contractor)
                if ($user instanceof \App\Models\User || $user instanceof \App\Models\Contractor) {
                    return $next($request);
                }
            } else {
                // If the email is not verified, log the user out and redirect with an error message
                Auth::logout();
                return redirect()->back()->withInput()->with(['error' => 'Your email is not verified. Please check your email for the verification link.']);
            }
        }
    
        // Redirect to the login page if the user is not authenticated
        return redirect('/login')->with('error', 'Unauthorized. Please log in.');
    }
}
