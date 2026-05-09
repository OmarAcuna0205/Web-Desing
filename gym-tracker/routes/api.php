<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoutineApiController;

Route::apiResource('routines', RoutineApiController::class)
	->names('api.routines');