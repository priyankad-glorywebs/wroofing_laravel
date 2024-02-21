<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\BaseController;
use App\Http\Resources\CustomerResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class GeneralInformationController extends BaseController
{
    //
    public function Customergeneralinformation(Request $request)
    {

        try {
            $request->validate([
                'name' => '|string|max:255',
                'address' => '|string|max:255',
                'insurance_company' => 'required|string|max:255',
                'billing' => '|string|max:255',
                'mortgage_company' => 'nullable|string|max:20',
            

            ]);
            $data = $request->all();
            $projects = Project::create($data);
            // $token = $projects->createToken('myapptoken', ['expires' => now()->addHours(24)])->plainTextToken;

            return $this->jsonResponse([
                'status' => 'success',
                // 'token' => $token,
                'projects' => new CustomerResource($projects),
                'message' => 'Register Successfully',
            ], 201);
        } catch (ValidationException $e) {
            return $this->jsonResponse(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // return $e->getMessage();
            return $this->jsonResponse(['error' => 'Registration failed. Please try again.'], 500);
        }
    }
    public function list()
    {
        $projects = Project::get(['name', 'address', 'insurance_company', 'billing', 'mortgage_company', 'insurance_company']);

        return response()->json(['Customergeneralinformationlist' => $projects], 200);
    }


    public function Customergeneralinformationupdat(Request $request, $id)
    {
        $event = Project::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

}






















}