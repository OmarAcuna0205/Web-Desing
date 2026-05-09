<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    // GUARDAR UN NUEVO EJERCICIO
    public function store(Request $request)
    {
        $request->validate([
            'routine_id' => 'required|exists:routines,id',
            'nombre' => 'required',
            'series' => 'required|integer',
            'repeticiones' => 'required|integer',
        ]);

        Exercise::create($request->all());

        return back()->with('success', 'Ejercicio agregado a la rutina');
    }

    // ELIMINAR UN EJERCICIO
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return back()->with('success', 'Ejercicio eliminado');
    }
}