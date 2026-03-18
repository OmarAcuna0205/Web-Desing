<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

// Le agregamos "names" para que no choque con las rutas Web
Route::apiResource('tickets', TicketController::class)->names('api.tickets');