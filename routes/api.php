<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryApiController::class)->names('api.categories');
    Route::post('/logout', [AuthApiController::class, 'logout']);

    Route::post('/test-mailtrap', function () {
        Mail::to('your@email.com')->send(new TestMail());
        return response()->json(['message' => 'Test email sent']);
    });
});
