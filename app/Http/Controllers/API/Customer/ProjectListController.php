<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\BaseController;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectListController extends BaseController
{
    // new cret list add

    public function listaddnew(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string',
                'project_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $data['profile_image'] = $this->storeFile($request, 'profile_image', 'profile_image');
            $data['project_img'] = $this->storeFile($request, 'project_img', 'project_img');
            $event = Project::create($request->all());

            return response()->json(['projectlist' => $event], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            //  return $e->getMessage();
            return response()->json(['error' => 'Error creating event', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

//  all data listing
    public function list()
    {

        $events = Project::all();

        return response()->json(['projectlist' => $events], 200);
    }
// list show id

    public function listshowid($id)
    {
        $event = Project::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return response()->json(['projectlist' => $event], 200);
    }

    public function listupdate(Request $request, $id)
    {
        $event = Project::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $request->validate([

            'name' => 'string',
            'project_img' => 'nullable|string',
            'profile_img' => 'nullable|string',
        ]);

        $event->update($request->all());

        return response()->json(['projectlist' => $event], 200);
    }

}
