<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineApiController extends Controller
{
    // 1. GET (Listar todas las rutinas)
    public function index()
    {
        $routines = Routine::with('exercises')->get();
        return response()->json($routines, 200);
    }

    // 2. POST (Crear una rutina nueva)
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nombre' => 'required|string|min:3',
            'dia' => 'required|string'
        ]);

        $routine = Routine::create($request->all());
        return response()->json(['message' => 'Rutina creada con éxito', 'data' => $routine], 201);
    }

    // 3. GET (Leer una sola rutina por ID)
    public function show($id)
    {
        $routine = Routine::with('exercises')->find($id);

        if (!$routine) {
            return response()->json(['message' => 'Rutina no encontrada'], 404);
        }

        return response()->json($routine, 200);
    }

    // 4. PUT/PATCH (Actualizar una rutina)
    public function update(Request $request, $id)
    {
        $routine = Routine::find($id);

        if (!$routine) {
            return response()->json(['message' => 'Rutina no encontrada'], 404);
        }

        $routine->update($request->all());
        return response()->json(['message' => 'Rutina actualizada', 'data' => $routine], 200);
    }

    // 5. DELETE (Eliminar una rutina)
    public function destroy($id)
    {
        $routine = Routine::find($id);

        if (!$routine) {
            return response()->json(['message' => 'Rutina no encontrada'], 404);
        }

        $routine->delete();
        return response()->json(['message' => 'Rutina eliminada correctamente'], 200);
    }
}