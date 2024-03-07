<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contractor;

class ProfileContaroller extends Controller
{
    // public function profileView(){
    //     return view('layouts.front.contractor-profile');
    // }




//update contractor profile
public function profileView(){
    return view('layouts.front.contractor-profile');
}

public function profileUpdate(Request $request)
{

    $validator = Validator::make($request->all(), [
        'contarctorId' => 'required|exists:contractors,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'contactnumber' => 'required|string|max:20',
        'zipcode' => 'required|string|max:10',
        'customer_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
        //'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload


    ]);

    // dd($request->banner_image);


    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }




    $contractor = Contractor::find($request->contarctorId);

    if ($contractor) {

        $contractor->name = $request->name;
        $contractor->email = $request->email;
        $contractor->contact_number = $request->contactnumber;
        $contractor->zip_code = $request->zipcode;

        // $storagePath = 'customer_profile/';
        // if (!File::exists($storagePath)) {
        //     File::makeDirectory($storagePath, 0755, true);
        // }

        // if ($request->hasFile('customer_profile')) {
        //     $image = $request->file('customer_profile');
        //     $imageName = \Str::random(3).time() . '.' . $image->getClientOriginalExtension();
        //     Storage::putFileAs($storagePath, $image, $imageName);
        //     $contractor->profile_image = $imageName;
        // }


        $bannerImageName = null;

        if ($request->hasFile('banner_image')) {
            
            $bannerImage = $request->file('banner_image');
    
            $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
            // $bannerImage->storeAs($bannerImageName);
            //dd($bannerImage);


            $directory = "contractor_banner";

                $publicDirectory = public_path($directory);
                if (!file_exists($publicDirectory)) {
                    mkdir($publicDirectory, 0755, true);
                }
                $originalFileName = \Str::random(3) . time() . $bannerImage->getClientOriginalName();
                $bannerImage->move($publicDirectory, $originalFileName);
                $contractor->banner_image = $bannerImageName;
        }
    

        $profileImageName = null; 

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->storeAs('uploads/contractor_profile', $profileImageName);
            $contractor->profile_image         = $profileImageName ? 'uploads/contractor_profile/' . $profileImageName : null;

        }

        // $bannerImaxgeName = null;

// if ($request->hasFile('banner_image')) {
//     // dd("in");
//     $bannerImage = $request->file('banner_image');
//     dd($bannerImage);
//     $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
//     $bannerImage->storeAs('uploads/contractor_banner', $bannerImageName);
//     $contractor->banner_image = $bannerImageName ? 'uploads/contractor_banner/' . $bannerImageName : null;
// }


        if ($request->has('password')) {
            $contractor->password = bcrypt($request->password);
        }


        $contractor->save();
        // dd($contractor);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } else {
        return response()->json(['error' => 'Contractor not found'], 404);
    }
}


}
