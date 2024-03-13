<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ContractorRegisterRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Contractor;
use App\Models\User;  // model
use Illuminate\Support\Facades\Validator;



class RegistrationController extends Controller
{
    // public function test(){
    //     $message = "Test message";
    //     Mail::to('anil.test34@gmail.com')->send(new TestMail($message));
    
    // }

public function registerStepOne(Request $request){
    return view('layouts.front.Auth.design-studio');
}


    public function register(Request $request)
    {
        $user                  = new User;
        $user->name            = $request->name;
        $user->email           = $request->email;
        $user->password        = Hash::make($request->password);
        $user->contact_number  = $request->contact_number;
        $user->zip_code        = $request->zip_code;

        if ($request->areyoua === "customer") {
            $validator = Validator::make($request->all(), (new RegisterRequest())->rules());

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }


            $user->save();
            $storagePath = 'customer_profile/';
            if (!File::exists($storagePath)) {
                File::makeDirectory($storagePath, 0755, true);
            }
            if ($request->hasFile('customer_profile')) {
                $image = $request->file('customer_profile');
                $imageName = \Str::random(3).time() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs($storagePath, $image, $imageName);
                $user->profile_image = $storagePath . $imageName;
                $user->save();
            }
            $user->sendEmailVerificationNotification();
            //\Log::info('Email verification notification sent.');

        } 
        if ($request->areyoua === "contractor") {
            $validator = Validator::make($request->all(), (new ContractorRegisterRequest())->rules());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    

        $profileImageName = null;

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->storeAs('uploads/contractor_profile', $profileImageName);
        }
        $portfolioPaths = [];
        
        if ($request->hasFile('uploadimagerecentwork')) {
            foreach ($request->file('uploadimagerecentwork') as $portfolioImage) {
                $portfolioImageName = time() . '_' . $portfolioImage->getClientOriginalName();
                $portfolioImage->storeAs('uploads/contractor_portfolio', $portfolioImageName);
                $portfolioPaths[] = 'uploads/contractor_portfolio/' . $portfolioImageName;
            }
        }
        
        $contractor                        = new Contractor;
        $contractor->name                  = $request->name;
        $contractor->email                 = $request->email;
        $contractor->company_name          = $request->companyname ?? '';
        $contractor->password              = bcrypt($request->password);
        $contractor->contact_number        = $request->contact_number;
        $contractor->zip_code              = $request->zip_code;
        $contractor->profile_image         = $profileImageName ? 'uploads/contractor_profile/' . $profileImageName : null;
        $contractor->contractor_portfolio  = $portfolioPaths;
        $contractor->save();

        $contractor->sendEmailVerificationNotification();

        }
        
        return view("layouts.front.Auth.register-thankyou");
    }

    
}
