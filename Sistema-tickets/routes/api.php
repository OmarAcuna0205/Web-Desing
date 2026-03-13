<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

// Esta UNICA linea registra las 5 rutas del CRUD automaticamente:
Route::apiResource('tickets', TicketController::class);