<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\DashboardController;

// 1. Ruta de Bienvenida (La que te faltaba)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rutas de Autenticación (Login, Registro, etc.)
require __DIR__.'/auth.php';

// 3. Tus Rutas Protegidas por Roles
Route::middleware(['auth'])->group(function () {
    
    // Dashboard general
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Solo Admin
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin');

    // Solo Gerente
    Route::get('/reportes', [ReportesController::class, 'index'])
        ->middleware('role:gerente')
        ->name('reportes');
});