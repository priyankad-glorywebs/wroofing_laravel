<?php

Route::prefix('v1')->name('api.')->group(function () {
    Route::middleware('guest')->group(function () {
        require __DIR__ . '/API/user/api.php';
    });
    require __DIR__ . '/API/contractor/api.php';
});


