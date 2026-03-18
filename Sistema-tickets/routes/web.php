<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketWebController;

// Si entran a la raíz, los mandamos al listado de tickets
Route::get('/', function () {
    return redirect()->route('tickets.index');
});

// Registra las 7 rutas web de un trancazo
Route::resource('tickets', TicketWebController::class);