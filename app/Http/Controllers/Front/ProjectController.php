<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Project; // model
use App\Models\ProjectDocument; //model
use App\Models\Contractor; //Model
use App\Models\User; //Model

use App\Repositories\ProjectRepository;



class ProjectController extends Controller
{

private $projectRepository;

public function __construct(ProjectRepository $projectRepository)
{
    $this->projectRepository = $projectRepository;
}

    public function list()
    {
        // $projects = Project::orderBy("id", "desc")
        // ->where('user_id',Auth::user()->id)
        // // ->where('status',1)
        // ->get();
        return view("layouts.front.projects.project-list");
    }
    public function create(Request $request, $project_id)
    {
        return view( "layouts.front.projects.project-details",compact("project_id"));
    }

    

    public function uploadDocuments(Request $request, $project_id)
    {
        try {
            $project_id = base64_decode($project_id);
            if (!$project_id) {
                return redirect()->back()->withInput()->withErrors(["error" => "Project ID not found."]);
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $request->file('file')->getClientOriginalName();
                // Now you have the file name in $fileName variable
                $directory = "project_documents_laststage";
                $publicDirectory = public_path($directory);
                if (!file_exists($publicDirectory)) {
                    mkdir($publicDirectory, 0755, true);
                }
                $originalFileName = \Str::random(3) . time() . $fileName;
                $file->move($publicDirectory, $originalFileName);
                $existingDocument = ProjectDocument::where('project_id', $project_id)
                ->where('document_name', 'documents')
                ->first();

                if ($existingDocument) {
                    $oldFilePath = public_path($existingDocument->document_file);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                    $existingDocument->update([
                        "document_file" => $directory . '/' . $originalFileName,
                        "updated_by" => auth()->id(),
                    ]);
                } else {
                    ProjectDocument::create([
                        "project_id" => $project_id,
                        "document_name" => 'documents',
                        "document_file" => $directory . '/' . $originalFileName,
                        "created_by" => auth()->id(),
                        "updated_by" => auth()->id(),
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "something went wrong",
                "error" => $e->getMessage(),
            ]);
        }
    }

    // public function addProject(Request $request)
    // {
    //   // here i need a unique projectname user specific not for whole table 
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             // "projectname" => "required|string|max:255",
    //             // "projectname" => "required|string|max:255|unique:projects,name",
    //             "projectname" => "required|string|max:255|unique:projects,name,NULL,id,user_id," . auth()->id(),


    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 "success"  => false,
    //                 "message"  => "Validation failed",
    //                 "errors"   => $validator->errors(),
    //             ]);
    //         }

    //         $project              = new Project();
    //         $project->name        = $request->projectname;
    //         $project->title       = $request->projectname;
    //         $project->user_id     = auth()->id();
    //         $project->created_by  = auth()->id();
    //         $project->updated_by  = auth()->id();
    //         $project->status      = 0;
    //         $project->save();

    //         return response()->json([
    //             "success" => true,
    //             "message" => "Project created successfully",
    //             "data" => $project->id,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "success" => false,
    //             "message" => "something went wrong",
    //             "error" => $e->getMessage(),
    //         ]);
    //     }
    // }

    public function addProject(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "projectname" => [
                    "required",
                    "string",
                    "max:255",
                    function ($attribute, $value, $fail) {
                        $isUnique = $this->projectRepository->isProjectNameUnique($value, auth()->id());

                        if (!$isUnique) {
                            $fail("The $attribute has already been taken for this user.");
                        }
                    },
                ],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => "Validation failed",
                    "errors" => $validator->errors(),
                ]);
            }

            $projectData = [
                'name' => $request->projectname,
                'title' => $request->projectname,
                'user_id' => auth()->id(),
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
                'status' => 0,
            ];

            $project = $this->projectRepository->createProject($projectData);

            return response()->json([
                "success" => true,
                "message" => "Project created successfully",
                "data" => $project->id,

            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Something went wrong",
                "error" => $e->getMessage(),
            ]);
        }
    }


    public function designStudio($project_id)
    {
        return view("layouts.front.projects.steps.design-studio",compact("project_id"));
    }

    public function test(){}

    public function removeImage(Request $request)
    {
        $fileName  = $request->input("file_name");
        $projectId = $request->input("project_id");

        Storage::disk("public")->delete("project_images/" . $fileName);

        $project = \App\Models\Project::findOrFail(base64_decode($projectId));
        $imageArray = json_decode($project->project_image, true);

        if (is_array($imageArray) && in_array($fileName, $imageArray)) {
            $updatedImages = array_values(array_diff($imageArray, [$fileName]));
            $project->update(["project_image" => json_encode($updatedImages)]);
        }
        return response()->json(["message" => "Image removed successfully"]);
    }

    public function designStudioStore(Request $request, $project_id)
    {
        $project_id = base64_decode($project_id);
        $project    = Project::findOrFail($project_id);
        if ($request->hasFile("file")) {
            $existingImages = json_decode($project->project_image, true) ?? [];
            foreach ($request->file("file") as $file) {
                $filename = time() . "_" .\Str::random(3).'_'.$file->getClientOriginalName();
                $file->storeAs("project_images", $filename, "public");
                $existingImages[] = $filename;
            }
            $project->update(["project_image" => json_encode($existingImages)]);
        }
        $project_id = base64_encode($project_id);
        return response()->json([
            "success" => "Files uploaded successfully",
            "project_id" => $project_id,
        ]);
    }

    public function generalInformation($project_id)
    {
        $project_id = base64_decode($project_id);
        return view("layouts.front.projects.steps.general-information",compact("project_id"));
    }


    public function generalInformationPost(Request $request, $project_id)
    {
        try {
            $validatedData           = $request->validate([
                "title"              => "required|string|max:255",
                "address"            => "required|string|max:255",
                "insurancecompany"   => "required|string|max:255",
                "insuranceagency"    => "required|string|max:255",
                "billing"            => "required|string|max:255",
                "mortgagecompany"    => "required|string|max:255",
            ]);

            if (isset($project_id)) {
                $project_id              = base64_decode($project_id);
                $project                 = Project::find($project_id);
            } else {
                $project                 = new Project();
            }
            $project->title              = $request->title ?? "";
            $project->address            = $request->address ?? "";
            $project->insurance_company  = $request->insurancecompany ?? "";
            $project->insurance_agency   = $request->insuranceagency ?? "";
            $project->billing            = $request->billing ?? "";
            $project->mortgage_company   = $request->mortgagecompany ?? "";
            $project->project_status     = "Request";
            $project->user_id            = Auth::id() ?? "";
            $project->created_by         = Auth::id() ?? "";
            $project->updated_by         = Auth::id() ?? "";
            $project->save();

            $project_id = base64_encode($project_id);
            return redirect()->route("design.studio", [
                "project_id" => $project_id,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(["error" => "An error occurred while saving the data.",]);
        }
    }

   
    public function documentation($project_id)
    {
        $project_id    = base64_decode($project_id);
        $documents     = $insurancedocuments = $mortgagedocuments = $contractordocuments = null;

        $documentsData = ProjectDocument::where("project_id", $project_id)->get();

        foreach ($documentsData as $val) {
            if ($val->document_name == "documents") {
                $documents = pathinfo($val->document_file);
            } elseif ($val->document_name == "insurancedocuments") {
                $insurancedocuments = pathinfo($val->document_file);
            } elseif ($val->document_name == "mortgagedocuments") {
                $mortgagedocuments = pathinfo($val->document_file);
            } elseif ($val->document_name == "contractordocuments") {
                $contractordocuments = pathinfo($val->document_file);
            }
        }

        $data = compact(
            "project_id",
            "documents",
            "insurancedocuments",
            "mortgagedocuments",
            "contractordocuments"
        );

        $data = array_filter($data, function ($value) {
            return isset($value);
        });

       return view("layouts.front.projects.steps.documentation", $data);
    }


public function documentationStore(Request $request, $project_id)
{
    try {
        $project_id = base64_decode($project_id);
        if (!$project_id) {
            return redirect()->back()->withInput()->withErrors(["error" => "Project ID not found."]);
        }

        $project = Project::find($project_id);
        $documentTypes = ["documents", "insurancedocuments", "mortgagedocuments", "contractordocuments"];

        foreach ($documentTypes as $documentType) {
            if ($request->hasFile($documentType)) {
                $files = $request->file($documentType);
                $directory = "project_documents_laststage";
                $publicDirectory = public_path($directory);
                if (!file_exists($publicDirectory)) {
                    mkdir($publicDirectory, 0755, true);
                }

                $filePaths = []; // Array to store file paths
                foreach ($files as $file) {
                    if(!empty($file)){
                        $originalFileName = \Str::random(3) . time() . $file->getClientOriginalName();
                        $file->move($publicDirectory, $originalFileName);
                        $filePaths[] = $directory . '/' . $originalFileName; // Add file path to array
                    }
                }

                if (!empty($filePaths)) {
                    // Encode file paths array to JSON
                    $filePathsJson = json_encode($filePaths);

                    // Create a new document entry with JSON encoded file paths
                    ProjectDocument::create([
                        "project_id" => $project->id,
                        "document_name" => $documentType,
                        "document_file" => $filePathsJson,
                        "created_by" => auth()->id(),
                        "updated_by" => auth()->id(),
                    ]);
                }
            }
        }
        return redirect()->back()->with("success", "Documents uploaded successfully.");
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        return redirect()->back()->withInput()->withErrors(["error" => "An error occurred while processing the request."]);
    }
    return redirect()->route("project.list");
}


    // private function getFileTypepdf($file)
    // {
    //     $allowedExtensions = [
    //         "pdf",
    //         "doc",
    //         "docx",
    //         "jpg",
    //         "jpeg",
    //         "png",
    //         "gif",
    //     ];

    //     $fileExtension = strtolower($file->getClientOriginalExtension());

    //     if (in_array($fileExtension, $allowedExtensions)) {
    //         return "document";
    //     } else {
    //         return "unknown";
    //     }
    // }



public function removeDocuments(Request $request)
{
    $file       = $request->input('file');
    $removefile = 'project_documents_laststage/'.$file;
    $projectId  = $request->input('project_id');
    $filePath   = public_path('project_documents_laststage/' . $file);
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    ProjectDocument::where('project_id', $projectId)
                   ->where('document_file',$removefile)
                   ->delete();

    return response()->json(['message' => 'Document removed successfully']);
}


public function contractorProjectList(){
    $projects = Project::get();
    return view('layouts.front.projects.contractor.contractor-project-list',compact('projects'));
}

public function projectDetailsContractor(Request $request, $project_id)
{
    $projectData       = base64_decode($project_id);
    $projectinfo       = Project::where('id', $projectData)->first();
    $project_documents = ProjectDocument::where('project_id', $projectinfo->id)->get();

    $documentdata = '';
    $contractordocuments = '';
    $insurancedocuments = '';
    $mortgagedocuments = '';

    foreach ($project_documents as $document) {
        if ($document->document_name == "documents") {
            $documentdata = $document->document_file ?? '';
        }
        if ($document->document_name == "contractordocuments") {
            $contractordocuments = $document->document_file ?? '';
        }
        if ($document->document_name == "insurancedocuments") {
            $insurancedocuments = $document->document_file ?? '';
        }
        if ($document->document_name == "mortgagedocuments") {
            $mortgagedocuments = $document->document_file ?? '';
        }
    }

    return view('layouts.front.projects.contractor.details', compact('projectinfo', 'documentdata', 'contractordocuments', 'insurancedocuments', 'mortgagedocuments'));
}

// public function download($filename)
// {
//     dd($filename);
//     $filePath = storage_path('app/public/' . $filename);

//     if (file_exists($filePath)) {
//         return response()->download($filePath, $filename);
//     } else {
//         abort(404, 'File not found');
//     }
// }

public function download($filename)
{
    $filePath = storage_path('app/public/' . $filename);

    if (file_exists($filePath)) {
        $headers = [
            'Content-Type' => 'image/*',
        ];
        return response()->download($filePath, $filename, $headers);
    } else {
        abort(404, 'File not found');
}
}

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

    ]);

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

        $profileImageName = null; 

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->storeAs('uploads/contractor_profile', $profileImageName);
            $contractor->profile_image         = $profileImageName ? 'uploads/contractor_profile/' . $profileImageName : null;

        }
        if ($request->has('password')) {
            $contractor->password = bcrypt($request->password);
        }

        $contractor->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } else {
        return response()->json(['error' => 'Contractor not found'], 404);
    }
}


public function customerprofileView(){

    return view('layouts.front.customer-profile');

}


public function customerprofileUpdate(Request $request){

    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'contactnumber' => 'required|string|max:20',
        'zipcode' => 'required|string|max:10',
        'customer_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload

    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user = User::find($request->user_id);

    if ($user) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_number = $request->contactnumber;
        $user->zip_code = $request->zipcode;

        $storagePath = 'customer_profile/';
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }
        if ($request->hasFile('customer_profile')) {
            $image = $request->file('customer_profile');
            $imageName = \Str::random(3).time() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs($storagePath, $image, $imageName);
            $user->profile_image = $storagePath . $imageName;
        
        }


        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } else {
        return response()->json(['error' => 'The Customer not found'], 404);
    }
}


}



