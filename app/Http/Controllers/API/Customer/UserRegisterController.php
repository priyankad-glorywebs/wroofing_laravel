<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserRegisterController extends BaseController
{
    //

    public function userregister(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
                'contact_number' => 'nullable|string|max:20',
                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            // Handle file uploads
            $data['profile_image'] = $this->storeFile($request, 'profile_image', 'profile_image');

            // For contracto
            $user = User::create($data);
            $token = $user->createToken('myapptoken', ['expires' => now()->addHours(24)])->plainTextToken;

            return $this->jsonResponse([
                'status' => 'success',
                'token' => $token,
                'user' => new UserResource($user),
                'message' => 'Register Successfully',
            ], 201);
        } catch (ValidationException $e) {
            return $this->jsonResponse(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // return $e->getMessage();
            return $this->jsonResponse(['error' => 'Registration failed. Please try again.'], 500);
        }
    }


    


  

public function logout(Request $request)
{
    try {
        // Revoke the current user's token
        $request->user()->tokens()->where('id', $request->user()->currentAccessToken()->id)->delete();

        return $this->jsonResponse([
            'status' => 'success',
            'message' => 'Logout Successful',
        ], 200);
    } catch (\Exception $e) {
        return $this->jsonResponse(['error' => 'Logout failed. Please try again.'], 500);
    }
}

}
