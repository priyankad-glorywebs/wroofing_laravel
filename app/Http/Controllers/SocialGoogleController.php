<?php

// app/Http/Controllers/SocialGoogleController.php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Contractor;
use App\Models\SocialAccount;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class SocialGoogleController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        // Store the 'type' query parameter in the session
        $request->session()->put('google_login_type', $request->query('type'));
        // Check if a user is already authenticated
        if (Auth::check()) {
            // If so, logout the user
            Auth::logout();
        }
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $userType = $request->session()->get('google_login_type');
            if ($userType === 'customer') {
                $user = $this->findOrCreateUser($googleUser); 
                if ($user) {
                    $request->session()->put('Auth', $user);
                    // You can add additional logic here, such as logging in the user or redirecting
                    Auth::login($user);
                    return redirect()->route('project.list');
                } else {
                    return redirect()->route('login')->with('error', 'Invalid credentials.');
                }
            } elseif ($userType === 'contractor') {
                $contractor = $this->findOrCreateContractor($googleUser);
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
            \Log::error('Google Login Error: ' . $e->getMessage());
            
            // Return a response to the user indicating an error occurred
            return response()->json(['error' => 'An error occurred during Google login. Please try again later.'], 500);
        }    
    }
    
    protected function findOrCreateUser($googleUser)
    {
        try{
            $user = User::where('email', $googleUser->getEmail())->first(); 
            if (empty($user) && isset($googleUser)) {
                // Extract required information from the $googleUser object
                $provider           = 'google'; // You already know the provider is Google
                $providerUserId     = $googleUser->getId();
                $email              = $googleUser->getEmail();
                $name               = $googleUser->getName();
                $avatar             = $googleUser->getAvatar();
                $token              = $googleUser->token;
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'status' => 'Active',
                    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]); 

                $SocialAccount                   = new SocialAccount;
                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = $provider;
                $SocialAccount->provider_user_id = $providerUserId;
                $SocialAccount->email            = $email;
                $SocialAccount->name             = $name;
                $SocialAccount->avatar           = $avatar;
                $SocialAccount->token            = $token;
                $SocialAccount->social_type      = $provider;
                $SocialAccount->save();
            }else{
                $provider           = 'google'; // You already know the provider is Google
                $providerUserId     = $googleUser->getId();
                $email              = $googleUser->getEmail();
                $name               = $googleUser->getName();
                $avatar             = $googleUser->getAvatar();
                $token              = $googleUser->token;

                $user->update([
                    'id' => $user->id,
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'status' => 'Active',
                    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]); 
                
                if($user == true){
                    $user = User::where('google_id', $googleUser->getId())->first();
                }
                
                try {

                    $SocialAccount = SocialAccount::where('user_id', $user->id)->first();
                    if(empty($SocialAccount) && $SocialAccount == null){
                        $SocialAccount                   = new SocialAccount;
                    }

                    $SocialAccount->user_id          = $user->id;
                    $SocialAccount->provider         = $provider;
                    $SocialAccount->provider_user_id = $providerUserId;
                    $SocialAccount->email            = $email;
                    $SocialAccount->name             = $name;
                    $SocialAccount->avatar           = $avatar;
                    $SocialAccount->token            = $token;
                    $SocialAccount->social_type      = $provider;
                    $SocialAccount->save();
                } catch (\Exception $e) {
                    // Log the error
                    \Log::error('Error saving SocialAccount: ' . $e->getMessage());
                    
                    // Handle the error as needed
                    // For example, you can return a response indicating the error to the user
                    return response()->json(['error' => 'An error occurred while saving the social account data. Please try again later.'], 500);
                }
            }
        } catch (Exception $exception) {
            return response()->json(['success'=>'error',  'message'=>'something is wrong']); 
        }
        return $user;
    }

    protected function findOrCreateContractor($googleUser)
    {
        $user = Contractor::where('email', $googleUser->getEmail())->first();
        if (empty($user) && isset($googleUser)) {
            // Extract required information from the $googleUser object
            $provider           = 'google'; // You already know the provider is Google
            $providerUserId     = $googleUser->getId();
            $email              = $googleUser->getEmail();
            $name               = $googleUser->getName();
            $avatar             = $googleUser->getAvatar();
            $token              = $googleUser->token;
            $user = Contractor::create([
                'name' => $name,
                'email' =>  $email,
                'google_id' => $providerUserId,
                'status' => 'Active',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            try {
                $SocialAccount                   = new SocialAccount;
                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = isset($provider) ? $provider : 'google';
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
            $provider           = 'google'; // You already know the provider is Google
            $providerUserId     = $googleUser->getId();
            $email              = $googleUser->getEmail();
            $name               = $googleUser->getName();
            $avatar             = $googleUser->getAvatar();
            $token              = $googleUser->token;
            
            $user = $user->update([
                'id' => $user->id,
                'name' => $name,
                'email' =>  $email,
                'google_id' => $providerUserId,
                'status' => 'Active',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            if($user == true){
                $user = Contractor::where('google_id', $googleUser->getId())->first();
            }
 
            try {
                $SocialAccount = SocialAccount::where('user_id', $user->id)->first();
                if(empty($SocialAccount) && $SocialAccount == null){
                    $SocialAccount                   = new SocialAccount;
                }

                $SocialAccount->user_id          = $user->id;
                $SocialAccount->provider         = isset($provider) ? $provider : 'google';
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
   public function list(){
        return view('layouts.front.projects.project-list');
    }
}