<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
 
class DropzoneController extends Controller
{
    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function index(): View
    {
        return view('dropzone');
    }
      
    /**
     * Image Upload Code
     *
     * @return void
     */
    public function store(Request $request): JsonResponse
    {
        $image = $request->file('file');
     
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
     
        return response()->json(['success'=>$imageName]);
    }
}