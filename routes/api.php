<?php

use App\Http\Controllers\Api\ResidentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/residents', ResidentController::class);
