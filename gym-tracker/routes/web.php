<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware('auth')->group(function () {
        Route::get('/routines/report', [RoutineController::class, 'report'])->name('routines.report');
        Route::resource('routines', RoutineController::class);
        Route::resource('exercises', \App\Http\Controllers\ExerciseController::class)->only(['store', 'destroy']);
    });
});

require __DIR__.'/auth.php';