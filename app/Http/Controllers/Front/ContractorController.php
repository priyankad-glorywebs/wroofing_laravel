<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Project;
use App\Models\User;
use App\Models\ProjectImagesData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectDocument;


class ContractorController extends Controller
{
    public function index(){
        return view('layouts.front.contractor');
    }

    // contractor list & filter data 
    public function contractorProjectList(Request $request){
        if($request->from_date != NULL  && $request->to_date != NULL){
            $query = User::query()->Join('projects', 'users.id', '=', 'projects.user_id');
            if ($request->to_date) {
                $query->whereDate('projects.created_at', '<=', $request->to_date);
            }
            if ($request->from_date) {
                $query->whereDate('projects.created_at', '>=', $request->from_date);
            }
    
            if($request->title){
                $query->where(function($subQuery) use ($request) {
                    $subQuery->where('projects.title', 'LIKE', '%'.$request->title.'%')
                        ->orWhere('projects.project_status', 'LIKE', '%'.$request->title.'%')
                        ->orWhere('users.name', 'LIKE', '%'.$request->title.'%')
                        ->orwhere('projects.id','LIKE','%'.$request->title.'%')
                        ->orWhere('users.email', 'LIKE', '%'.$request->title.'%')
                        ->orWhere('users.contact_number', 'LIKE', '%'.$request->title.'%');
                });
    
            }
    
            if ($request->ajax() && ($request->to_date || $request->from_date)){
                $projects = $query->orderBy('projects.id','DESC')->paginate(3);
                $view = view('layouts.front.projects.contractor.contractordashboard', compact('projects'))->render();
                return response()->json(['html' => $view]);
            }
        } else {
            $currentMonth = Carbon::now()->month;
            $projects = Project::whereMonth('projects.created_at', $currentMonth)->orderBy('projects.id', 'DESC')->paginate(3);
        }
    
        return view('layouts.front.projects.contractor.contractor-project-list', compact('projects'));
    }



    
    public function designStudioStoreContractor(Request $request, $project_id)
    {
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
    
        $view = view('layouts.front.projects.contractor.design-studio-contractor', compact('project','groupedData'))->render();
           

        return response()->json([
            "success" => "Files uploaded successfully",
            "project_id" => $project_id,
            //"projectImage" => $projectImageData,
            'designstudio'=> $view
        ]);

                    
        }
    }


    public function removeImageContractor(Request $request)
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


    public function deleteImagesContractor($project_id, $media_item_id)
    {
        $mediaItem = ProjectImagesData::find($media_item_id);
        if (!$mediaItem) {
            return response()->json(['message' => 'Media item not found.'], 404);
        }

        Storage::delete('project_images/' . $mediaItem->project_image);

        $mediaItem->delete();
        return response()->json(['message' => 'File deleted successfully.']);
    }



    
    ///details page 

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


///Filter route for design studio contractor side 

public function DesignstuidoContractorFilter(Request $request, $project_id)
{
    $projectData       = base64_decode($project_id);
    $project       = Project::where('id', $projectData)->first();


    if ($request->designfilter_todate != null && $request->designfilter_fromdate != null) {
        $filterData = ProjectImagesData::where('project_id', base64_decode($project_id));

        if ($request->designfilter_todate) {
            $filterData->whereDate('date', '>=', $request->designfilter_todate);
        }

        if ($request->designfilter_fromdate) {
            $filterData->whereDate('date', '<=', $request->designfilter_fromdate);
        }
        // if($request->designfilter_todate  || $request->designfilter_fromdate){
        //      $filterData->whereBetween('date', [$request->designfilter_todate, $request->designfilter_fromdate]);
        // }

        $groupedData = $filterData->orderBy('date', 'desc')
        ->get()->groupBy('date');
        $dsview = view('layouts.front.projects.contractor.design-studio-contractor', compact('groupedData','project'))->render();

        return response()->json(['filterdata' => $dsview]);


        }

    // return view('layouts.front.projects.contractor.details', compact('projectinfo'));
}


}
