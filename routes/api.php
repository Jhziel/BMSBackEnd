<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BarangayEmployeeController;
use App\Http\Controllers\Api\BarangayOfficialController;
use App\Http\Controllers\Api\ResidentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/residents', ResidentController::class);
    Route::apiResource('/house-hold', ResidentController::class);
    Route::apiResource('/barangay-employees', BarangayEmployeeController::class);
    Route::apiResource('/barangay-officials', BarangayOfficialController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
