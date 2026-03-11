<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

// Crea automáticamente las 5 rutas RESTful (index, store, show, update, destroy)
Route::apiResource('tasks', TaskController::class);