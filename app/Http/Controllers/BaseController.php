<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Send a JSON response.
     */
    protected function jsonResponse($data, $statusCode = 200)
    {
        return response()->json($data, $statusCode);
    }

    /**
     * Send a success JSON response.
     */
    protected function successResponse($message = 'Operation successful', $statusCode = 200)
    {
        return $this->jsonResponse(['message' => $message], $statusCode);
    }

    /**
     * Send an error JSON response.
     */
    protected function errorResponse($message = 'An error occurred', $statusCode = 500)
    {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }
    /**
     * Store a file and return the file path.
     */
    protected function storeFile(Request $request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $filePath = $request->file($fieldName)->store($folderName, 'public');
            return $filePath;
        }

        return null;
    }
    /**
     * Store multiple file and return the file array.
     */
    protected function storeFiles(Request $request, $fieldName, $folderName)
    {
        $filePaths = [];

        if ($request->hasFile($fieldName)) {
            $files = $request->file($fieldName);

            foreach ($files as $file) {
                $filePath = $file->store($folderName, 'public');
                $filePaths[] = $filePath;
            }
            return $filePaths;
        }
        return null;
    }
}
