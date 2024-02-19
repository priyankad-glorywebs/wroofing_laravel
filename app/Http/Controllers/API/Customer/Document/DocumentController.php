<?php

namespace App\Http\Controllers\API\Customer\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Resources\DocumentResource ;
use App\Models\Project;
// use App\Models\Document;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class DocumentController extends BaseController
{
    
    public function updateDocument(Request $request, $id)
    {
        try {
            $projects = Project::find($id);
    
            if (!$projects) {
                return response()->json(['message' => 'Document not found'], 404);
            }
    
            $request->validate([
                'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:2048',
                // 'name' => 'required|string|max:255',
            ]);
    
            $data = $request->all();
            $path = '';
    
            // Handle file upload if provided
            if ($request->file) {
                $file = $request->file('file');
                $path = $file->store('documents');
                $data['path'] = $path;
            }

            // Update the document
            DB::table('projects')->where('id', $id)->update(array('name' => $request->name, 'path' => $path));
            
    
            return $this->jsonResponse([
                'status' => 'success',
                // 'token' => $token,
                'projects' => new DocumentResource ($projects),
                'message' => 'Register Successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Document update failed. Please try again.'], 500);
        }
    }
    

    public function removeDocument(Request $request, $id)
{

    try {
        $projects = Project::find($id);

        if (!$projects) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:2048',
            // 'name' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $path = '';

        // Handle file upload if provided
        if ($request->file) {
            $file = $request->file('file');
            $path = $file->store('documents');
            $data[''] = $path;
        }

        // Update the document
        DB::table('projects')->where('id', $id)->update(array('name' => $request->name, 'path' => $path));
        

        return $this->jsonResponse([
            'status' => 'success',
            // 'token' => $token,
            'projects' => new DocumentResource ($projects),
            'message' => 'Register Successfully',
        ], 201);
    } catch (ValidationException $e) {
        return response()->json(['errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Document update failed. Please try again.'], 500);
    }
}

    
}

