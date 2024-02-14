<?php
// Protected routes of product and logout
Route::middleware('auth:sanctum')->group( function () {
    
    Route::post('/logout', [LoginRegisterController::class, 'logout']);
});