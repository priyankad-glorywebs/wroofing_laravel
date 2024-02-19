<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserLoginController extends BaseController
{
    //

    public function userLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('myapptoken', ['expires' => now()->addHours(24)])->plainTextToken;

                return $this->jsonResponse([
                    'status' => 'success',
                    'token' => $token,
                    'user' => new UserResource($user),
                    'message' => 'Login Successful',
                ], 200);
            } else {
                return $this->jsonResponse(['error' => 'Invalid credentials'], 401);
            }
        } catch (ValidationException $e) {
            return $this->jsonResponse(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Login failed. Please try again.'], 500);
        }
    }
}
