<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Project;
use App\Models\User;

class ContractorController extends Controller
{
    public function index(){
        return view('layouts.front.contractor');
    }

    //filter
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
                $projects = $query->orderBy('projects.id','DESC')->get();
                $view = view('layouts.front.projects.contractor.contractordashboard', compact('projects'))->render();
                return response()->json(['html' => $view]);
            }
        } else {
            $currentMonth = Carbon::now()->month;
            $projects = Project::whereMonth('projects.created_at', $currentMonth)->orderBy('projects.id', 'DESC')->get();
        }
    
        return view('layouts.front.projects.contractor.contractor-project-list', compact('projects'));
    }
    

}
