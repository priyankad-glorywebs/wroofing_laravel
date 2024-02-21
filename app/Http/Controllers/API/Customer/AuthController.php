<?php

namespace App\Http\Controllers\API\Contractor;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\Project;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\Contractor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends BaseController
{

    public function myFunction()
    {
        return "Hello from myFunction!";
    }

    public function list()
{
    $projects = User::all([ 'id','name', 'email', 'contact_number','created_at','updated_at','profile_image','contractor_portfolio']);

    return response()->json(['Contractorlist' => $projects], 200);
}

      public function register(Request $request)
    {
       
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
                'contact_number' => 'nullable|string|max:20',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            // Handle file uploads
            $data['profile_image'] = $this->storeFile($request, 'profile_image', 'profile_image');
            $data['contractor_portfolio'] = $this->storeFiles($request, 'contractor_portfolio', 'contractor_portfolio');

            // For contractor
            if ($request->areyoua === "contractor") {
                Contractor::create($data);
                $data['user_type'] = "contractor";
            }

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

    public function listadd(Request $request)
    {
      
        try {
            $request->validate([
                'name' => 'required|string',
                'project_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $data['profile_image'] = $this->storeFile($request, 'profile_image', 'profile_image');
            $data['project_img'] = $this->storeFile($request, 'project_img', 'project_img');
            $event = Event::create($request->all());
    
            return response()->json(['projectlist' => $event], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating event', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // public function listadd1(Request $request)
    // {
      
    //     try {
    //         $request->validate([
    //             'project_name' => 'required|string',
    //             'project_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                
    //         ]);
    //         $data['project_img'] = $this->storeFile($request, 'project_img', 'project_img');
    //         $projectscustomer = Project::create($request->all());
    
    //         return response()->json(['projectscustomer' => $projectscustomer], Response::HTTP_CREATED);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Error creating event', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }


    public function update(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id . '|max:255',
            'password' => 'nullable|string|min:8', // You might want to handle password separately
            'contact_number' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle password update
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); // Remove password from the data if not provided
        }

        // Handle file uploads for profile image
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $this->storeFile($request, 'profile_image', 'profile_image');
        }

        // Update user
        $user->update($data);

        return $this->jsonResponse([
            'status' => 'success',
            'user' => new UserResource($user),
            'message' => 'User updated successfully',
        ], 200);
    } catch (ModelNotFoundException $e) {
        return $this->jsonResponse(['message' => 'User not found'], 404);
    } catch (ValidationException $e) {
        return $this->jsonResponse(['errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        return $this->jsonResponse(['error' => 'Update failed. Please try again.'], 500);
    }
}

    

















    
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|max:255',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $user = Auth::user();

    //         if ($user->status == 'Inactive') {
    //             return response([
    //                 'status' => 'error',
    //                 'message' => 'Sorry, this account is inactive.',
    //             ]);
    //         }

    //         // Create a token with a 24-hour expiration
    //         $token = $user->createToken('myapptoken', ['expires' => now()->addHours(24)])->plainTextToken;

    //         return response()->json([
    //             'success' => true,
    //             'token' => $token,
    //             'user' => new UserResource($user),
    //             'message' => 'Login Successful',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'User Not Found! Please Check Credentials.',
    //         ], 401);
    //     }
    // }
    // //check user login
    // public function loginCheck()
    // {
    //     $auth = Auth::user();
    //     if (!$auth) return $this->errorResponse('User not available');
    //     return $this->successResponse('User login successfully');
    // }
    // // user logout
    // public function logout()
    // {
    //     auth()->user()->currentAccessToken()->delete();
    //     return $this->successResponse('User is logged out successfully');
    // }












    // forgotpassworeduser

public function forgotpasswored(Request $request)

{
    try {
        
        $user = User::where('email', $request->email)->get();
     
        if(count($user) > 0){
            $token = Str::random(40);
            $domain = URL::to('/');
            // $url = $domain.'/reset-password?token='.$token;
            $resetLink = url("/reset-password/{$token}");


            $data['url'] = $resetLink;
            $data['email'] = $request->email;
            $data['title'] = "Password Reset";
            $data['body'] = "Please click on below link to reset your";


               Mail::send('forgetPassworldMail', ['data'=>$data],function($message) use ($data) { 
                  $message->to($data['email'])->subject($data['title']);
            });

            $datetime = Carbon::now()->format('Y-m-d H:i:s');
            PasswordReset::updateOrCreate(
                  ['email' => $request->email],
            [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => $datetime,
            ]
            );
            return response()->json(['success'=>true, 'msg' => 'plass cheka your passwored reset passwored!']);
            }
            else{
            return response()->json(['success'=>false, 'msg' => 'User not found!']);
            }
        } catch (\Exception $e) {
        return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
}




public function reset(Request $request)

{
    try {
        
        $contracto = Contractor::where('email', $request->email)->get();
     
        if(count($contracto) > 0){
            $token = Str::random(40);
            $domain = URL::to('/');
            // $url = $domain.'/reset-password?token='.$token;
            $resetLink = url("/reset-password/{$token}");


            $data['url'] = $resetLink;
            $data['email'] = $request->email;
            $data['title'] = "Password Reset";
            $data['body'] = "Please click on below link to reset your";


               Mail::send('forgetPassworldMail', ['data'=>$data],function($message) use ($data) { 
                  $message->to($data['email'])->subject($data['title']);
            });

            $datetime = Carbon::now()->format('Y-m-d H:i:s');
            PasswordReset::updateOrCreate(
                  ['email' => $request->email],
            [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => $datetime,
            ]
            );
            return response()->json(['success'=>true, 'msg' => 'plass cheka your passwored reset passwored!']);
            }
            else{
            return response()->json(['success'=>false, 'msg' => 'User not found!']);
            }
        } catch (\Exception $e) {
        return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
}

public function resetPassword (Request $request)
{

      $request->validate([
     'password' => 'required|string|min:6|confirmed'
]);

$user = User::find($request->token);
$user->password = Hash::make($request->password);
$user->save();

PasswordReset::where('email', $user->email)->delete();

return "<h1>Your password has been reset successfully.</h1>";
}










}


    
