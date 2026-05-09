<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    // LEER (Listar las rutinas)
    public function index()
    {
        // Lógica de roles: El admin ve todo, el usuario solo lo suyo
        if(Auth::user()->role === 'admin') {
            $routines = Routine::with('user')->get();
        } else {
            $routines = Routine::where('user_id', Auth::id())->get();
        }
        
        return view('routines.index', compact('routines'));
    }

    // VER EL DETALLE DE LA RUTINA Y SUS EJERCICIOS
    public function show(Routine $routine)
    {
        // Seguridad básica: si no es admin, solo puede ver sus rutinas
        if(\Illuminate\Support\Facades\Auth::user()->role !== 'admin' && $routine->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403, 'No tienes permiso para ver esta rutina.');
        }

        // Cargamos la rutina junto con sus ejercicios
        $routine->load('exercises');
        return view('routines.show', compact('routine'));
    }

    // Mostrar formulario de CREAR
    public function create()
    {
        return view('routines.create');
    }

    // Guardar en base de datos
    public function store(Request $request)
    {
        // Validaciones con señales visibles (Punto de la rúbrica)
        $request->validate([
            'nombre' => 'required|min:3',
            'dia' => 'required',
        ]);

        Routine::create([
            'user_id' => Auth::id(),
            'nombre' => $request->nombre,
            'dia' => $request->dia,
        ]);

        return redirect()->route('routines.index')->with('success', 'Rutina creada exitosamente');
    }

    // Mostrar formulario de EDITAR
    public function edit(Routine $routine)
    {
        return view('routines.edit', compact('routine'));
    }

    // ACTUALIZAR en base de datos
    public function update(Request $request, Routine $routine)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'dia' => 'required',
        ]);

        $routine->update($request->only('nombre', 'dia'));

        return redirect()->route('routines.index')->with('success', 'Rutina actualizada');
    }

    // ELIMINAR
    public function destroy(Routine $routine)
    {
        $routine->delete();
        return redirect()->route('routines.index')->with('success', 'Rutina eliminada');
    }
}