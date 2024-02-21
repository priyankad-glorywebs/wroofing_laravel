<?php

// namespace App\Http\Controllers\API\Customer\Document;
// use Illuminate\Http\Request;
// use App\Http\Controllers\BaseController;
// use App\Http\Resources\DocumentResource ;
// use App\Models\Project;
// // use App\Models\Document;
// use Illuminate\Http\Response;
// use Illuminate\Validation\ValidationException;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
// class DocumentController extends BaseController
// {
    
//     public function updateDocument(Request $request, $id)
//     {
//         try {
//             $projects = Project::find($id);
    
//             if (!$projects) {
//                 return response()->json(['message' => 'Document not found'], 404);
//             }
    
//             $request->validate([
//                 'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:2048',
//                 // 'name' => 'required|string|max:255',
//             ]);
    
//             $data = $request->all();
//             $path = '';
    
//             // Handle file upload if provided
//             if ($request->file) {
//                 $file = $request->file('file');
//                 $path = $file->store('documents');
//                 $data['path'] = $path;
//             }

//             // Update the document
//             DB::table('projects')->where('id', $id)->update(array('name' => $request->name, 'path' => $path));
            
    
//             return $this->jsonResponse([
//                 'status' => 'success',
//                 // 'token' => $token,
//                 'projects' => new DocumentResource ($projects),
//                 'message' => 'Register Successfully',
//             ], 201);
//         } catch (ValidationException $e) {
//             return response()->json(['errors' => $e->errors()], 422);
//         } catch (\Exception $e) {
//             return response()->json(['error' => 'Document update failed. Please try again.'], 500);
//         }
//     }
    

//     public function removeDocument(Request $request, $id)
// {

//     try {
//         $projects = Project::find($id);

//         if (!$projects) {
//             return response()->json(['message' => 'Document not found'], 404);
//         }

//         $request->validate([
//             'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:2048',
//             // 'name' => 'required|string|max:255',
//         ]);

//         $data = $request->all();
//         $path = '';

//         // Handle file upload if provided
//         if ($request->file) {
//             $file = $request->file('file');
//             $path = $file->store('documents');
//             $data[''] = $path;
//         }

//         // Update the document
//         DB::table('projects')->where('id', $id)->update(array('name' => $request->name, 'path' => $path));
        

//         return $this->jsonResponse([
//             'status' => 'success',
//             // 'token' => $token,
//             'projects' => new DocumentResource ($projects),
//             'message' => 'Register Successfully',
//         ], 201);
//     } catch (ValidationException $e) {
//         return response()->json(['errors' => $e->errors()], 422);
//     } catch (\Exception $e) {
//         return response()->json(['error' => 'Document update failed. Please try again.'], 500);
//     }
// }

    
// }


namespace App\Http\Controllers\API\Customer\Document;

use App\Http\Controllers\BaseController;
use App\Models\Document;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DocumentController extends BaseController
{

    public function upload(Request $request)
    {
        try {

            $request->validate([
                'document_name' => 'required|string|max:255',
                'document_file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
                'project_id' => 'required|string|max:255',
            ]);

            $file = $request->file('document_file');
            $document_file = $file->store('project_documents');

            $project_documents = ProjectDocument::create([

                'document_name' => $request->input('document_name'),
                'project_id' => $request->input('project_id'),
                'document_file' => $document_file,

            ]);

            return response()->json(['message' => 'Document uploaded successfully', 'document' => $document_file]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['error' => 'Document upload failed. Please try again.'], 500);
        }
    }

    public function documentupdat(Request $request, $id)
    {

        $documentupdat = Document::find($id);

        if (!$documentupdat) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $documentupdat->update($request->all());

        return response()->json(['projectlist' => $documentupdat], 200);
    }
    public function removeDocument(Request $request, $documentId)
    {
        try {
            $document = Document::findOrFail($documentId);
            $document->delete();

            // You may also want to delete the actual file from storage
            Storage::delete($document->document_file);

            return response()->json(['message' => 'Document removed successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Document not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to remove document'], 500);
        }
    }

}
