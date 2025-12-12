<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ResidentController;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/residents', ResidentController::class);
    Route::apiResource('/house-hold', ResidentController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
