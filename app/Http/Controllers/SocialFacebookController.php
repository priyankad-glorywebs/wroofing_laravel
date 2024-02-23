<?php

// app/Http/Controllers/SocialFacebookController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contractor;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SocialFacebookController extends Controller
{
    public function redirectToFacebook(Request $request)
    {
        // Store the 'type' query parameter in the session
        $request->session()->put('facebook_login_type', $request->query('type'));
        // Check if a user is already authenticated
        if (Auth::check()) {
            // If so, logout the user
            Auth::logout();
        }
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {   
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            $userType = $request->session()->get('facebook_login_type');

            // Now you can handle the user data based on the type
            if ($userType === 'customer') {
                $user = $this->findOrCreateUser($facebookUser);
                if ($user) {
                    // Handle customer login logic
                    $request->session()->put('Auth', $user);
                    Auth::login($user);
                    return redirect()->route('project.list');
                } else {
                    return redirect()->route('login')->with('error', 'Invalid credentials.');
                }

            } elseif ($userType === 'contractor') {
                $contractor = $this->findOrCreateContractor($facebookUser);
                if ($contractor) {
                    $request->session()->put('Auth', $contractor);
                    Auth::guard('contractor')->login($contractor);
                    return redirect()->route('contractor.dashboard');
                } else {
                    return redirect()->route('login')->with('error', 'Invalid credentials.');
                }
            } else {                
                // Return a response to the user indicating an error occurred
                return response()->json(['error' => 'Invalid user type, handle accordingly'], 500);
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Facebook Login Error: ' . $e->getMessage());
            
            // Return a response to the user indicating an error occurred
            return response()->json(['error' => 'An error occurred during Facebook login. Please try again later.'], 500);
        }
    }

    protected function findOrCreateUser($facebookUser)
    {
        $user = User::where('email', $facebookUser->getEmail())->first();
        if (empty($user) && isset($facebookUser)) {
            // Extract required information from the $googleUser object
            $provider           = 'facebook'; // You already know the provider is Google
            $providerUserId     = $facebookUser->getId();
            $email              = $facebookUser->getEmail();
            $name               = $facebookUser->getName();
            $avatar             = $facebookUser->getAvatar();
            $token              = $facebookUser->token;

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'facebook_id' => $providerUserId,
                'status' => 'Active',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            try {
                $SocialAccount                   = new SocialAccount;
                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = isset($provider) ? $provider : 'facebook';
                $SocialAccount->provider_user_id = isset($providerUserId) ? $providerUserId : null;
                $SocialAccount->email            = $email;
                $SocialAccount->name             = isset($name) ? $name : null;
                $SocialAccount->avatar           = isset($avatar) ? $avatar : null;
                $SocialAccount->token            = isset($token) ? $token : null;
                $SocialAccount->social_type      = isset($provider) ? $provider : null;
                $SocialAccount->save();
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error saving SocialAccount: ' . $e->getMessage());
                
                // Handle the error as needed
                // For example, you can return a response indicating the error to the user
                return response()->json(['error' => 'An error occurred while saving the social account data. Please try again later.'], 500);
            }
        }else{
            // Extract required information from the $googleUser object
            $provider           = 'facebook'; // You already know the provider is Google
            $providerUserId     = $facebookUser->getId();
            $email              = $facebookUser->getEmail();
            $name               = $facebookUser->getName();
            $avatar             = $facebookUser->getAvatar();
            $token              = $facebookUser->token;

            $user->update([
                'name' => $name,
                'email' => $email,
                'facebook_id' => $providerUserId,
                'status' => 'Active',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            if($user == true){
                $user = User::where('facebook_id', $facebookUser->getId())->first();
            }

            try {
                $SocialAccount = SocialAccount::where('user_id', $user->id)->first();
                if(empty($SocialAccount) && $SocialAccount == null){
                    $SocialAccount                   = new SocialAccount;
                }
                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = isset($provider) ? $provider : 'facebook';
                $SocialAccount->provider_user_id = isset($providerUserId) ? $providerUserId : null;
                $SocialAccount->email            = $email;
                $SocialAccount->name             = isset($name) ? $name : null;
                $SocialAccount->avatar           = isset($avatar) ? $avatar : null;
                $SocialAccount->token            = isset($token) ? $token : null;
                $SocialAccount->social_type      = isset($provider) ? $provider : null;
                $SocialAccount->save();
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error saving SocialAccount: ' . $e->getMessage());
                
                // Handle the error as needed
                // For example, you can return a response indicating the error to the user
                return response()->json(['error' => 'An error occurred while saving the social account data. Please try again later.'], 500);
            }
        }
        return $user;
    }
    protected function findOrCreateContractor($facebookUser)
    {
        $user = Contractor::where('email', $facebookUser->getEmail())->first();
        if (empty($user) && isset($facebookUser)) {
            // Extract required information from the $googleUser object
            $provider           = 'facebook'; // You already know the provider is Google
            $providerUserId     = $facebookUser->getId();
            $email              = $facebookUser->getEmail();
            $name               = $facebookUser->getName();
            $avatar             = $facebookUser->getAvatar();
            $token              = $facebookUser->token;
            $user = Contractor::create([
                'name' => $name,
                'email' =>  $email,
                'facebook_id' => $providerUserId,
                'status' => 'Active',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            try {
                $SocialAccount                   = new SocialAccount;
                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = isset($provider) ? $provider : 'facebook';
                $SocialAccount->provider_user_id = isset($providerUserId) ? $providerUserId : null;
                $SocialAccount->email            = $email;
                $SocialAccount->name             = isset($name) ? $name : null;
                $SocialAccount->avatar           = isset($avatar) ? $avatar : null;
                $SocialAccount->token            = isset($token) ? $token : null;
                $SocialAccount->social_type      = isset($provider) ? $provider : null;
                $SocialAccount->save();
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error saving SocialAccount: ' . $e->getMessage());
                
                // Handle the error as needed
                // For example, you can return a response indicating the error to the user
                return response()->json(['error' => 'An error occurred while saving the social account data. Please try again later.'], 500);
            }
        }else{
            // Extract required information from the $googleUser object
            $provider           = 'facebook'; // You already know the provider is Google
            $providerUserId     = $facebookUser->getId();
            $email              = $facebookUser->getEmail();
            $name               = $facebookUser->getName();
            $avatar             = $facebookUser->getAvatar();
            $token              = $facebookUser->token;
            
            $user = $user->update([
                'name' => $name,
                'email' =>  $email,
                'facebook_id' => $providerUserId,
                'status' => 'Active',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            if($user == true){
                $user = Contractor::where('facebook_id', $facebookUser->getId())->first();
            }

            try {
                $SocialAccount = SocialAccount::where('user_id', $user->id)->first();
                if(empty($SocialAccount) && $SocialAccount == null){
                    $SocialAccount                   = new SocialAccount;
                }
                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = isset($provider) ? $provider : 'facebook';
                $SocialAccount->provider_user_id = isset($providerUserId) ? $providerUserId : null;
                $SocialAccount->email            = $email;
                $SocialAccount->name             = isset($name) ? $name : null;
                $SocialAccount->avatar           = isset($avatar) ? $avatar : null;
                $SocialAccount->token            = isset($token) ? $token : null;
                $SocialAccount->social_type      = isset($provider) ? $provider : null;
                $SocialAccount->save();
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error saving SocialAccount: ' . $e->getMessage());
                
                // Handle the error as needed
                // For example, you can return a response indicating the error to the user
                return response()->json(['error' => 'An error occurred while saving the social account data. Please try again later.'], 500);
            }
        }
        return $user;
    }

    public function list()
    {
        return view('layouts.front.projects.project-list');
    }
} 
