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
        $userId = Auth::id();
        $validatedData = $request->validate([
            'cpassword' => 'required',
            'mpassword' => 'required',
            'cfmpassword' => 'required',
        ]);
        try {
            if(!empty($userId) && !empty($request->cpassword) && !empty($request->mpassword) && !empty($request->cfmpassword)){
                if($request->mpassword == $request->cfmpassword){
                    $user = User::find($userId);

                    $contractor = Contractor::find($userId);
                    if ($user) {
                        $auth = User::where('id', $userId)->first();
                        if(isset($auth->password)){
                            if (Hash::check($request->cpassword, $auth->password)) {
                                $auth->password =  Hash::make($request->mpassword);
                                $auth->update();
                                Auth::login($auth);
                            }else{
                                return redirect()->back()->with('error', 'current password not matched.');
                            }
                        }else{
                            if($auth->facebook_id != null || $auth->google_id != null){
                                return redirect()->back()->with('error', 'Unable to change password; currently logged in via social account.');
                            }
                        }
                    }elseif($contractor) {
                        $auth = Contractor::where('id', $userId)->first();
                        if(isset($auth->password)){
                            if (Hash::check($request->cpassword, $auth->password)) {
                                $auth->password =  Hash::make($request->mpassword);
                                $auth->update();
                                Auth::login($auth);
                            }else{
                                return redirect()->back()->with('error', 'current password not matched.');
                            }
                        }else{
                            if($auth->facebook_id != null || $auth->google_id != null){
                                return redirect()->back()->with('error', 'Unable to change password; currently logged in via social account.');
                            }
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
 