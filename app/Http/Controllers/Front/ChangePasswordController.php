<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contractor;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
       return view('layouts.front.changepassword');
    }

    public function changePassword(Request $request)
    {   
           // Get the ID of the logged-in user
        $userId = Auth::id();
        $validatedData = $request->validate([
            'cpassword' => 'required',
            'mpassword' => 'required',
            'cfmpassword' => 'required',
        ]);

        try {
            if(!empty($userId) && !empty($request->cpassword) && !empty($request->mpassword) && !empty($request->cfmpassword)){
                if($request->mpassword == $request->cfmpassword){
                    // Check if the user exists in the users table
                    $user = User::find($userId);

                    // Check if the user exists in the contractors table
                    $contractor = Contractor::find($userId);
                    if ($user) {
                        $auth = User::where('id', $userId)->first();
                        if (Hash::check($request->cpassword, $auth->password)) {
                            $auth->password =  Hash::make($request->mpassword);
                            $auth->update();
                            // make sure to re-login the user
                            Auth::login($auth);
                        }else{
                            return redirect()->back()->with('error', 'current password not matched.');
                        }
                    }elseif($contractor) {
                        $auth = Contractor::where('id', $userId)->first();
                        if (Hash::check($request->cpassword, $auth->password)) {
                            $auth->password =  Hash::make($request->mpassword);
                            $auth->update();
                            // make sure to re-login the user
                            Auth::login($auth);
                        }else{
                            return redirect()->back()->with('error', 'current password not matched.');
                        }
                    }else{
                        return redirect()->back()->with('error', 'current password not matched.');
                    }
                }
            }else{
                return redirect()->back()->with('error', 'login required.');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('success', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'password updated successfully.');
    }
}
 