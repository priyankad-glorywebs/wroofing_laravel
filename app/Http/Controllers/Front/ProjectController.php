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
use Carbon\Carbon;


use App\Models\Project; // model
use App\Models\ProjectDocument; //model
use App\Models\Contractor; //Model
use App\Models\User; //Model 
use App\Models\ProjectImagesData;

use App\Repositories\ProjectRepository;



class ProjectController extends Controller
{

private $projectRepository;

public function __construct(ProjectRepository $projectRepository)
{
    $this->projectRepository = $projectRepository;
}

    
    //******************************************/
    // Display project list from customer side //
    //******************************************/
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


    //***************************************/
    // cretea a  project from customer side //
    //***************************************/
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

    //************************************************************************/
    // Design studio Design- customer side //
    //************************************************************************/
        public function designStudio($project_id, Request $request)
        {
            if ($request->designfilter_todate != null && $request->designfilter_fromdate != null) {
                $filterData = ProjectImagesData::where('project_id', base64_decode($project_id));

                if ($request->designfilter_todate) {
                    $filterData->whereDate('date', '>=', $request->designfilter_todate);
                }

                if ($request->designfilter_fromdate) {
                    $filterData->whereDate('date', '<=', $request->designfilter_fromdate);
                }

                $groupedData = $filterData->orderBy('date', 'desc')
                ->get()->groupBy('date');
                $dsview = view('layouts.front.projects.steps.filterdata-design-studio', compact('groupedData'))->render();

                return response()->json(['filterdata' => $dsview]);
            } else {
                return view("layouts.front.projects.steps.design-studio", compact("project_id"));
            }
        }


    public function test(){}

    
    //************************************************************************/
    // Remove  image and videos inside the project  customer side //
    //************************************************************************/    
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
        // dd($request->all());
        $project_id = base64_decode($project_id);
        $project    = Project::findOrFail($project_id);

        $projectImages = [];

        if($request->hasFile("file")){
            foreach ($request->file("file") as $file) {
             if(Auth::user()){

             $user_id =  \Auth::user();
             }else{
               $user_id =  auth()->guard('contractor')->user();


             }
            
               $filename = time() . "_" .\Str::random(3).'_'.$file->getClientOriginalName();
               $mediaType = explode('/', $file->getMimeType())[0]; 
               $file->storeAs("project_images", $filename, "public");
               $projectImageData = new  ProjectImagesData;
               $projectImageData->project_id = $project_id;
               $projectImageData->project_image =  $filename;
               $projectImageData->date = Carbon::now()->toDateString();
               $timeFormatted = Carbon::now('Asia/Kolkata')->format('h:i A');
               $projectImageData->time = $timeFormatted;
               $projectImageData->media_type = $mediaType; 
               $projectImageData->created_by = $user_id->id;
               $projectImageData->save();
                
            }


        $projectImageData = ProjectImagesData::where('project_id', $project_id)
        ->orderBy('date', 'desc')
        ->get();


        $project_id = base64_encode($project_id);
        $groupedData = $projectImageData->groupBy('date');
    
        $view = view('layouts.front.projects.steps.work-gallery', compact('project','groupedData'))->render();
           

        return response()->json([
            "success" => "Files uploaded successfully",
            "project_id" => $project_id,
            //"projectImage" => $projectImageData,
            'designstudio'=> $view
        ]);

                    
        }


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
                $file = $request->file($documentType);
                $directory = "project_documents_laststage";

                $publicDirectory = public_path($directory);
                if (!file_exists($publicDirectory)) {
                    mkdir($publicDirectory, 0755, true);
                }

                $originalFileName = \Str::random(3) . time() . $file->getClientOriginalName();

                $file->move($publicDirectory, $originalFileName);

                $existingDocument = ProjectDocument::where('project_id', $project->id)
                    ->where('document_name', $documentType)
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
                        "project_id" => $project->id,
                        "document_name" => $documentType,
                        "document_file" => $directory . '/' . $originalFileName,
                        "created_by" => auth()->id(),
                        "updated_by" => auth()->id(),
                    ]);
                }
            }
        }
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        return redirect()->back()->withInput()->withErrors(["error" => "An error occurred while processing the request."]);
    }

    return redirect()->route("project.list");
}



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
        'customer_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

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

        $bannerImageName = null;

        if ($request->hasFile('banner_image')) {
            
            $bannerImage = $request->file('banner_image');
    
            $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
            
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
        'customer_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

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

        // $storagePath = 'customer_profile/';
        // if (!File::exists($storagePath)) {
        //     File::makeDirectory($storagePath, 0755, true);
        // }
        // if ($request->hasFile('customer_profile')) {
        //     $image = $request->file('customer_profile');
        //     $imageName = \Str::random(3).time() . '.' . $image->getClientOriginalExtension();
        //     Storage::putFileAs($storagePath, $image, $imageName);
        //     $user->profile_image = $storagePath . $imageName;
        
        // }

        $oldImagePath = $user->profile_image;


        if ($request->hasFile('customer_profile')) {
            $image = $request->file('customer_profile');
            $imageName = \Str::random(3).time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('customer_image'), $imageName);
            $user->profile_image = 'customer_image/' . $imageName;

             // Delete the old image file if it exists
        if ($oldImagePath && file_exists(public_path($oldImagePath))) {
            unlink(public_path($oldImagePath));
        }

            $user->save();
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


public function deleteImages($project_id, $media_item_id)
    {
        $mediaItem = ProjectImagesData::find($media_item_id);
        if (!$mediaItem) {
            return response()->json(['message' => 'Media item not found.'], 404);
        }
        Storage::delete('project_images/' . $mediaItem->project_image);

        $mediaItem->delete();

        return response()->json(['message' => 'File deleted successfully.']);
    }



}



